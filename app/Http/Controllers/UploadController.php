<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ImportExcelJob;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Exports\UsersExportChunk;
use App\Jobs\GenerateRandomEmployee;
use App\Jobs\ImportEmployeeExcelJob;


class UploadController extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }

    public function showEmployeeUploadForm(){
        return view('employee-upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx|max:102400', // Max 100MB
        ]);

        $filePath = $request->file('file')->store('uploads');

        ImportExcelJob::dispatch($filePath)->onQueue('imports');

        return redirect()->back()->with('success', 'File uploaded successfully and is being processed.');
    }

    public function uploadEmployee(Request $request){
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx|max:102400',
        ]);

        $filePath = $request->file('file')->store('uploads');

        ImportEmployeeExcelJob::dispatch($filePath)->onQueue('imports');

        return redirect()->back()->with('success', 'File uploaded successfully and is being processed.');
    }

    public function exportUsers()
    {
        
        return Excel::download(new UsersExport(), 'users.xlsx');
    }

    public function exportUsersChunk()
    {
        return Excel::download(new UsersExportChunk(), 'users.xlsx');
    }

    public function exportEmployees()
    {
        try {
            GenerateRandomEmployee::dispatch()->onQueue('exports');
            return response()->json(['message' => 'Export job has been dispatched successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while dispatching the export job'], 500);
        }
    }
    
}
