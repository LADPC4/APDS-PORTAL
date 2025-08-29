<?php

namespace App\Services;

use App\Models\Pli;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use setasign\Fpdi\Fpdi;
use Exception;

class TcaaService
{
    /**
     * Generate and save complete TCAA PDF (Part 1 + Part 2), return download URL
     */
    public function generateTcaaUrl(Pli $pli, string $type): string
    {
        Log::info("TCAA Generation Started", [
            'pli_id' => $pli->id,
            'pli_name' => $pli->name,
            'type' => $type
        ]);

        // Generate filename
        $filename = $this->generateFilename($pli, $type);
        Log::info("Generated filename", ['filename' => $filename]);

        try {
            // Generate Part 1 PDF content
            Log::info("Starting Part 1 PDF generation");
            $part1Content = $this->generatePart1Pdf($pli, $type);
            Log::info("Part 1 PDF generated successfully", ['size_bytes' => strlen($part1Content)]);
            
            // Try to merge with Part 2
            Log::info("Attempting to merge with Part 2");
            $finalPdfContent = $this->mergeWithPart2($part1Content, $type);
            Log::info("PDF merge completed successfully", ['final_size_bytes' => strlen($finalPdfContent)]);
            
        } catch (Exception $e) {
            // Fallback: serve Part 1 only
            Log::warning("PDF merge failed, falling back to Part 1 only", [
                'error_message' => $e->getMessage(),
                'error_file' => $e->getFile(),
                'error_line' => $e->getLine()
            ]);
            
            $part1Content = $this->generatePart1Pdf($pli, $type);
            $finalPdfContent = $part1Content;
            
            // Update filename to indicate incomplete document
            $filename = str_replace('.pdf', '-Part1Only.pdf', $filename);
            Log::info("Updated filename for Part 1 only", ['filename' => $filename]);
        }
        
        // Save final PDF temporarily
        Storage::disk('local')->put("temp/tcaa/{$filename}", $finalPdfContent);
        Log::info("Final PDF saved to temporary storage", [
            'path' => "temp/tcaa/{$filename}",
            'size_bytes' => strlen($finalPdfContent)
        ]);
        
        // Return download URL
        $downloadUrl = route('tcaa.download', ['pli' => $pli->id, 'type' => $type]);
        Log::info("TCAA Generation Completed", ['download_url' => $downloadUrl]);
        
        return $downloadUrl;
    }

    /**
     * Generate Part 1 PDF from blade template
     */
    private function generatePart1Pdf(Pli $pli, string $type): string
    {
        Log::info("Generating Part 1 PDF", ['type' => $type]);
        
        $data = $this->prepareTcaaData($pli);
        $template = $type === 'loans' ? 'pdf.tcaa-loans' : 'pdf.tcaa-insurance';
        
        Log::info("Using template", ['template' => $template]);
        
        $pdf = Pdf::loadView($template, $data)
            ->setPaper('a4', 'portrait')
            ->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'defaultFont' => 'Arial',
            ]);
        
        $content = $pdf->output();
        Log::info("Part 1 PDF generated", ['size_bytes' => strlen($content)]);
        
        return $content;
    }

    /**
     * Merge Part 1 with Part 2 static PDF using FPDI
     */
    private function mergeWithPart2(string $part1Content, string $type): string
    {
        Log::info("Starting PDF merge process", ['type' => $type]);
        
        // Check if Part 2 file exists
        $part2Path = "tcaa/templates/{$type}-part2.pdf";
        Log::info("Checking for Part 2 file", ['path' => $part2Path]);
        
        // Debug: List files in templates directory
        $this->debugTemplatesDirectory();
        
        if (!Storage::disk('local')->exists($part2Path)) {
            Log::error("Part 2 template not found", ['expected_path' => $part2Path]);
            throw new Exception("Part 2 template not found: {$part2Path}");
        }
        
        Log::info("Part 2 file found, getting content");
        
        // Get Part 2 content
        $part2Content = Storage::disk('local')->get($part2Path);
        Log::info("Part 2 content retrieved", ['size_bytes' => strlen($part2Content)]);
        
        // Create temporary files for merging
        $tempPart1 = tempnam(sys_get_temp_dir(), 'tcaa_part1_');
        $tempPart2 = tempnam(sys_get_temp_dir(), 'tcaa_part2_');
        
        Log::info("Created temporary files", [
            'temp_part1' => $tempPart1,
            'temp_part2' => $tempPart2
        ]);
        
        file_put_contents($tempPart1, $part1Content);
        file_put_contents($tempPart2, $part2Content);
        
        Log::info("Written content to temporary files", [
            'part1_written' => file_exists($tempPart1),
            'part2_written' => file_exists($tempPart2),
            'part1_size' => filesize($tempPart1),
            'part2_size' => filesize($tempPart2)
        ]);
        
        try {
            Log::info("Initializing FPDI for PDF merge");
            
            // Check if FPDI class exists
            if (!class_exists('setasign\Fpdi\Fpdi')) {
                Log::error("FPDI class not found - package may not be installed correctly");
                throw new Exception("FPDI class not found");
            }
            
            // Initialize FPDI
            $fpdi = new Fpdi();
            Log::info("FPDI initialized successfully");
            
            // Add pages from Part 1
            Log::info("Setting source file for Part 1");
            $pageCount1 = $fpdi->setSourceFile($tempPart1);
            Log::info("Part 1 pages detected", ['page_count' => $pageCount1]);
            
            for ($i = 1; $i <= $pageCount1; $i++) {
                Log::debug("Adding Part 1 page", ['page' => $i]);
                $fpdi->AddPage();
                $tplId = $fpdi->importPage($i);
                $fpdi->useTemplate($tplId);
            }
            
            // Add pages from Part 2
            Log::info("Setting source file for Part 2");
            $pageCount2 = $fpdi->setSourceFile($tempPart2);
            Log::info("Part 2 pages detected", ['page_count' => $pageCount2]);
            
            for ($i = 1; $i <= $pageCount2; $i++) {
                Log::debug("Adding Part 2 page", ['page' => $i]);
                $fpdi->AddPage();
                $tplId = $fpdi->importPage($i);
                $fpdi->useTemplate($tplId);
            }
            
            // Get merged PDF content
            Log::info("Generating final merged PDF");
            $mergedContent = $fpdi->Output('', 'S');
            Log::info("PDF merge completed successfully", [
                'total_pages' => $pageCount1 + $pageCount2,
                'merged_size_bytes' => strlen($mergedContent)
            ]);
            
            return $mergedContent;
            
        } catch (Exception $e) {
            Log::error("Error during PDF merge", [
                'error_message' => $e->getMessage(),
                'error_file' => $e->getFile(),
                'error_line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            throw $e;
        } finally {
            // Clean up temporary files
            Log::info("Cleaning up temporary files");
            if (file_exists($tempPart1)) {
                unlink($tempPart1);
                Log::debug("Deleted temp Part 1 file");
            }
            if (file_exists($tempPart2)) {
                unlink($tempPart2);
                Log::debug("Deleted temp Part 2 file");
            }
        }
    }

    /**
     * Debug method to list files in templates directory
     */
    private function debugTemplatesDirectory(): void
    {
        try {
            $templatesPath = 'tcaa/templates';
            Log::info("Debugging templates directory", ['path' => $templatesPath]);
            
            if (Storage::disk('local')->exists($templatesPath)) {
                $files = Storage::disk('local')->files($templatesPath);
                Log::info("Files in templates directory", [
                    'files' => $files,
                    'count' => count($files)
                ]);
                
                // Get file sizes
                foreach ($files as $file) {
                    $size = Storage::disk('local')->size($file);
                    Log::info("File details", [
                        'file' => $file,
                        'size_bytes' => $size,
                        'full_path' => Storage::disk('local')->path($file)
                    ]);
                }
            } else {
                Log::warning("Templates directory does not exist", ['path' => $templatesPath]);
                
                // Try to create it
                Storage::disk('local')->makeDirectory($templatesPath);
                Log::info("Created templates directory");
            }
        } catch (Exception $e) {
            Log::error("Error debugging templates directory", [
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Download previously generated TCAA PDF
     */
    public function downloadTcaa(Pli $pli, string $type): Response
    {
        Log::info("Download TCAA requested", [
            'pli_id' => $pli->id,
            'type' => $type
        ]);
        
        // Try regular filename first
        $filename = $this->generateFilename($pli, $type);
        $filePath = "temp/tcaa/{$filename}";
        
        Log::info("Checking for generated file", ['path' => $filePath]);
        
        // If not found, try Part 1 only version
        if (!Storage::disk('local')->exists($filePath)) {
            $fallbackFilename = str_replace('.pdf', '-Part1Only.pdf', $filename);
            $fallbackPath = "temp/tcaa/{$fallbackFilename}";
            
            Log::info("Regular file not found, checking fallback", ['fallback_path' => $fallbackPath]);
            
            if (Storage::disk('local')->exists($fallbackPath)) {
                $filename = $fallbackFilename;
                $filePath = $fallbackPath;
                Log::info("Using fallback file");
            } else {
                Log::info("No existing file found, generating new TCAA");
                // Generate if neither exists
                $this->generateTcaaUrl($pli, $type);
                // Re-check which file was created
                if (Storage::disk('local')->exists("temp/tcaa/{$fallbackFilename}")) {
                    $filename = $fallbackFilename;
                    $filePath = "temp/tcaa/{$fallbackFilename}";
                    Log::info("Using newly generated fallback file");
                }
            }
        }
        
        $pdfContent = Storage::disk('local')->get($filePath);
        Log::info("Serving PDF download", [
            'filename' => $filename,
            'size_bytes' => strlen($pdfContent)
        ]);
        
        // Clean up temp file after a short delay
        dispatch(function () use ($filePath) {
            sleep(2);
            Storage::disk('local')->delete($filePath);
            Log::info("Cleaned up temporary file", ['path' => $filePath]);
        })->afterResponse();
        
        return response($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            'Content-Length' => strlen($pdfContent),
        ]);
    }

    /**
     * Generate TCAA PDF for loans (legacy method)
     */
    public function generateLoansTcaa(Pli $pli): string
    {
        return $this->generateTcaaUrl($pli, 'loans');
    }

    /**
     * Generate TCAA PDF for insurance/MAS (legacy method)
     */
    public function generateInsuranceTcaa(Pli $pli): string
    {
        return $this->generateTcaaUrl($pli, 'insurance');
    }

    /**
     * Prepare data for TCAA templates
     */
    private function prepareTcaaData(Pli $pli): array
    {
        // Sanitize data to prevent UTF-8 issues
        return [
            'pli' => $pli,
            'pli_name' => $this->sanitizeText($pli->name),
            'loan_code' => $this->sanitizeText($pli->loan_code),
            'mas_code' => $this->sanitizeText($pli->mas_code),
            'insurance_code' => $this->sanitizeText($pli->insurance_code),
            'classification' => $this->sanitizeText($pli->classification?->name),
            'regions' => $pli->region ?? [],
            'generated_date' => now()->format('F d, Y'),
            // Placeholder for future implementation
            'apds_code' => '[TO BE IMPLEMENTED]',
            'deped_order_number' => '[TO BE IMPLEMENTED]',
            'effectivity_date' => '[TO BE IMPLEMENTED]',
        ];
    }

    /**
     * Sanitize text to prevent UTF-8 encoding issues
     */
    private function sanitizeText(?string $text): string
    {
        if (empty($text)) {
            return '';
        }
        
        // Convert to UTF-8 and remove invalid characters
        $text = mb_convert_encoding($text, 'UTF-8', 'UTF-8');
        $text = preg_replace('/[^\x{0009}\x{000a}\x{000d}\x{0020}-\x{D7FF}\x{E000}-\x{FFFD}]+/u', '', $text);
        
        return $text;
    }

    /**
     * Generate filename for PDF
     */
    private function generateFilename(Pli $pli, string $type): string
    {
        $sanitizedName = preg_replace('/[^A-Za-z0-9\-]/', '-', $pli->name);
        $sanitizedName = substr($sanitizedName, 0, 50); // Limit length
        $date = now()->format('Y-m-d-His');
        
        return "TCAA-{$type}-{$sanitizedName}-{$date}.pdf";
    }

    /**
     * Check if PLI is approved (has approved user)
     */
    public function isPliApproved(Pli $pli): bool
    {
        return $pli->users()->where('status', 'approved')->exists();
    }

    /**
     * Check if current user can generate TCAA
     */
    public function canGenerateTcaa(): bool
    {
        $user = auth()->user();
        return $user && in_array($user->userrole, ['SuperAdmin', 'Approver']);
    }

    /**
     * Check if Part 2 template exists for given type
     */
    public function part2Exists(string $type): bool
    {
        return Storage::disk('local')->exists("tcaa/templates/{$type}-part2.pdf");
    }
}