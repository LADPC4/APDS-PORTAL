<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function startReview(Document $document)
    {
        // Update status
        $document->status = 'under-review'; // or 'under-review'
        $document->save();

        return back()->with('success', 'Document status updated to Under Review.');
    }
}
