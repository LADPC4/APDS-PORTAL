<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ExistingPli;
use App\Models\Classification;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Log;

class ExistingPlisSeeder extends Seeder
{
    /**
     * Classification mapping
     */
    private $classificationMapping = [
        'Bank' => 1,
        'Cooperative' => 2,
        'Cooperative Bank' => 3,
        'Insurance Company' => 4,
        'Teachers Association' => 5,
        'Cooperative (Region-based)' => 2, // Same as Cooperative
        'Mutual Benefit Association' => 6, // Add this to classifications if needed
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Starting ExistingPlis seeder...');
        
        // Check if Excel file exists
        $filePath = base_path('migrate_existing_plis.xlsx');
        if (!file_exists($filePath)) {
            $this->command->error('Excel file not found: migrate_existing_plis.xlsx');
            return;
        }

        // Get valid classification IDs
        $validClassificationIds = Classification::pluck('id')->toArray();
        
        $successCount = 0;
        $skipCount = 0;
        $errorCount = 0;
        $nullLoanCodeCount = 0;

        try {
            $this->command->info('Reading Excel file...');
            
            // Load Excel file
            $spreadsheet = IOFactory::load($filePath);
            $worksheet = $spreadsheet->getActiveSheet();
            $rows = $worksheet->toArray();
            
            // Skip header row and process data
            foreach ($rows as $index => $row) {
                try {
                    // Skip header row
                    if ($index === 0) {
                        $this->command->info('Headers: ' . implode(', ', array_filter($row)));
                        continue;
                    }
                    
                    // Map row data to associative array
                    $rowData = $this->mapRowData($row);
                    
                    // Debug first record mapping
                    if ($index === 1) {
                        $this->command->info('First record mapping debug:');
                        $this->command->info("Name: {$rowData['name']}");
                        $this->command->info("Loan Code: {$rowData['loan_code']}");
                        $this->command->info("Classification: {$rowData['classification_id']}");
                        $this->command->info("R06_region: " . ($rowData['R06_region'] ? 'true' : 'false'));
                        $this->command->info("R06_provinces: " . ($rowData['R06_provinces'] ?: 'NULL'));
                        $this->command->info("R07_region: " . ($rowData['R07_region'] ? 'true' : 'false'));
                        $this->command->info("R07_provinces: " . ($rowData['R07_provinces'] ?: 'NULL'));
                    }
                    
                    // Validate required fields
                    if (empty($rowData['name'])) {
                        $this->command->warn("Row {$index}: Missing name, skipping");
                        $skipCount++;
                        continue;
                    }
                    
                    // Check for null loan_code - skip with warning
                    if (empty($rowData['loan_code']) || $rowData['loan_code'] === null) {
                        $this->command->warn("Row {$index}: NULL loan_code for PLI '{$rowData['name']}' - REVIEW NEEDED - skipping");
                        $nullLoanCodeCount++;
                        $skipCount++;
                        continue;
                    }
                    
                    // Check if PLI with same loan_code already exists
                    if (ExistingPli::where('loan_code', $rowData['loan_code'])->exists()) {
                        $this->command->info("Row {$index}: PLI with loan_code '{$rowData['loan_code']}' already exists (Name: '{$rowData['name']}'), skipping");
                        $skipCount++;
                        continue;
                    }
                    
                    // Convert classification name to ID
                    $classificationName = $rowData['classification_id'];
                    $classificationId = $this->classificationMapping[$classificationName] ?? null;
                    
                    if (!$classificationId || !in_array($classificationId, $validClassificationIds)) {
                        $this->command->warn("Row {$index}: Invalid classification '{$classificationName}' for loan_code '{$rowData['loan_code']}', skipping");
                        $errorCount++;
                        continue;
                    }
                    
                    // Prepare data for insertion
                    $pliData = [
                        'name' => $rowData['name'],
                        'loan_code' => $rowData['loan_code'],
                        'mas_code' => $rowData['mas_code'],
                        'insurance_code' => $rowData['insurance_code'],
                        'classification_id' => $classificationId,
                        'status' => $rowData['status'] ?? 'Active',
                        'user_in_charge' => null, // Always set to null as requested
                        
                        // Region boolean fields
                        'CAR_region' => (bool)$rowData['CAR_region'],
                        'NCR_region' => (bool)$rowData['NCR_region'],
                        'R01_region' => (bool)$rowData['R01_region'],
                        'R02_region' => (bool)$rowData['R02_region'],
                        'R03_region' => (bool)$rowData['R03_region'],
                        'R04A_region' => (bool)$rowData['R04A_region'],
                        'R04B_region' => (bool)$rowData['R04B_region'],
                        'R05_region' => (bool)$rowData['R05_region'],
                        'R06_region' => (bool)$rowData['R06_region'],
                        'R07_region' => (bool)$rowData['R07_region'],
                        'R08_region' => (bool)$rowData['R08_region'],
                        'R09_region' => (bool)$rowData['R09_region'],
                        'R10_region' => (bool)$rowData['R10_region'],
                        'R11_region' => (bool)$rowData['R11_region'],
                        'R12_region' => (bool)$rowData['R12_region'],
                        'R13_region' => (bool)$rowData['R13_region'],
                        
                        // Province JSON fields
                        'CAR_provinces' => $this->parseProvinces($rowData['CAR_provinces']),
                        'NCR_provinces' => $this->parseProvinces($rowData['NCR_provinces']),
                        'R01_provinces' => $this->parseProvinces($rowData['R01_provinces']),
                        'R02_provinces' => $this->parseProvinces($rowData['R02_provinces']),
                        'R03_provinces' => $this->parseProvinces($rowData['R03_provinces']),
                        'R04A_provinces' => $this->parseProvinces($rowData['R04A_provinces']),
                        'R04B_provinces' => $this->parseProvinces($rowData['R04B_provinces']),
                        'R05_provinces' => $this->parseProvinces($rowData['R05_provinces']),
                        'R06_provinces' => $this->parseProvinces($rowData['R06_provinces']),
                        'R07_provinces' => $this->parseProvinces($rowData['R07_provinces']),
                        'R08_provinces' => $this->parseProvinces($rowData['R08_provinces']),
                        'R09_provinces' => $this->parseProvinces($rowData['R09_provinces']),
                        'R10_provinces' => $this->parseProvinces($rowData['R10_provinces']),
                        'R11_provinces' => $this->parseProvinces($rowData['R11_provinces']),
                        'R12_provinces' => $this->parseProvinces($rowData['R12_provinces']),
                        'R13_provinces' => $this->parseProvinces($rowData['R13_provinces']),
                    ];
                    
                    // Create the record
                    ExistingPli::create($pliData);
                    $successCount++;
                    
                    if ($successCount % 25 === 0) {
                        $this->command->info("Processed {$successCount} records...");
                    }
                    
                } catch (\Exception $e) {
                    $loanCode = $rowData['loan_code'] ?? 'NULL';
                    $this->command->error("Row {$index}: Error processing loan_code '{$loanCode}' - " . $e->getMessage());
                    $errorCount++;
                }
            }
            
        } catch (\Exception $e) {
            $this->command->error('Error reading Excel file: ' . $e->getMessage());
            return;
        }
        
        $this->command->info("Seeding completed!");
        $this->command->info("Success: {$successCount}");
        $this->command->info("Skipped (duplicates): {$skipCount}");
        $this->command->info("Skipped (NULL loan codes): {$nullLoanCodeCount}");
        $this->command->info("Errors: {$errorCount}");
        
        if ($nullLoanCodeCount > 0) {
            $this->command->warn("⚠️  REVIEW NEEDED: {$nullLoanCodeCount} records with NULL loan codes were skipped!");
            $this->command->warn("   Check your Excel file for missing loan codes and re-run if needed.");
        }
    }
    
    /**
     * Map row data to associative array based on CORRECTED column order
     */
    private function mapRowData(array $row): array
    {
        // CORRECTED column order - includes user_in_charge at position 6
        $columnMapping = [
            0 => 'name',
            1 => 'loan_code',
            2 => 'mas_code',
            3 => 'insurance_code',
            4 => 'classification_id',
            5 => 'status',
            6 => 'user_in_charge',        // ADDED - this was missing!
            7 => 'CAR_region',
            8 => 'CAR_provinces',
            9 => 'NCR_region',
            10 => 'NCR_provinces',
            11 => 'R01_region',
            12 => 'R01_provinces',
            13 => 'R02_region',
            14 => 'R02_provinces',
            15 => 'R03_region',
            16 => 'R03_provinces',
            17 => 'R04A_region',
            18 => 'R04A_provinces',
            19 => 'R04B_region',
            20 => 'R04B_provinces',
            21 => 'R05_region',
            22 => 'R05_provinces',
            23 => 'R06_region',
            24 => 'R06_provinces',
            25 => 'R07_region',
            26 => 'R07_provinces',
            27 => 'R08_region',
            28 => 'R08_provinces',
            29 => 'R09_region',
            30 => 'R09_provinces',
            31 => 'R10_region',
            32 => 'R10_provinces',
            33 => 'R11_region',
            34 => 'R11_provinces',
            35 => 'R12_region',
            36 => 'R12_provinces',
            37 => 'R13_region',
            38 => 'R13_provinces',
        ];
        
        $mappedData = [];
        foreach ($columnMapping as $index => $fieldName) {
            $mappedData[$fieldName] = $row[$index] ?? null;
        }
        
        return $mappedData;
    }
    
    /**
     * Parse province data into JSON array
     */
    private function parseProvinces($provinceData): ?array
    {
        if (empty($provinceData)) {
            return null;
        }
        
        // If it's already an array, return it
        if (is_array($provinceData)) {
            return $provinceData;
        }
        
        // If it's a string, try to parse it
        if (is_string($provinceData)) {
            // Handle different line break formats
            $provinceData = str_replace(["\r\r\n", "\r\n", "\n"], ',', $provinceData);
            
            // Split by comma and clean up
            $provinces = array_map('trim', explode(',', $provinceData));
            $provinces = array_filter($provinces); // Remove empty values
            
            return empty($provinces) ? null : array_values($provinces);
        }
        
        return null;
    }
}