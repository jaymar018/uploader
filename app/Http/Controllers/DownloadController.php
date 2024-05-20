<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ExportStudentJob;
use App\Jobs\ExportEmployeeJob;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function index()
    {
        return view('download');
    }

    public function download(Request $request)
    {
        try {
            $job = $request->route()->named('export.employees.db') ? ExportEmployeeJob::class : ExportStudentJob::class;
            dispatch(new $job())->onQueue('exports');
            

            return view('download');
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function downloadExportedFile()
    {
        
        // Retrieve the file path from cache
        $filePath = cache('exported_file_path');

        // Check if the file path exists in cache
        if (!$filePath) {
            // If file path doesn't exist, display a message
            return redirect()->back()->with('status', 'Export is still in progress. Please try again later.');
        }

        // Check if the file exists
        if (!Storage::exists('public/' . $filePath)) {
            // If file doesn't exist, display a message or redirect back
            return redirect()->back()->with('status', 'Exported file not found. Please try again later.');
        }


        // Download the file
        //return response()->download(storage_path($path));
        //return response()->json(['path' => $filePath, 200]);
        return Storage::download('public/' . $filePath);
    }

    
}
