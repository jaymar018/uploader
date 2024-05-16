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
use App\Jobs\ExportEmployeeJob;
use App\Exports\EmployeeDbExport;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Helpers\FilePathHelper;
use Illuminate\Support\Facades\Redirect;
use App\Jobs\GenerateRandomStudentsJob;
use App\Jobs\ImportStudentExcelJob;

class UploadController extends Controller
{

    protected $filePath;

    public function showUploadForm()
    {
        return view('upload');
    }

    public function showEmployeeUploadForm(){
        return view('employee-upload');
    }


    public function showStudentUploadForm(){
        return view('student-upload');
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

    
    public function importStudents(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx|max:102400',
        ]);

        $filePath = $request->file('file')->store('uploads');

        ImportStudentExcelJob::dispatch($filePath)->onQueue('imports');

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
        } catch (\  Exception $e) {
            return response()->json(['error' => 'An error occurred while dispatching the export job'], 500);
        }
    }

    public function exportEmployeeFromDb(Request $request)
    {
        try {
            // Dispatch the job to export employee data
            ExportEmployeeJob::dispatch();


            return view('employee-upload');
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while dispatching the export job'], 500);
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
        return Storage::download('public/' . $filePath);
    }

    public function generateRandomStudent()
    {
        try {
            GenerateRandomStudentsJob::dispatch()->onQueue('exports');
            return response()->json(['message' => 'Export job has been dispatched successfully'], 200);
        } catch (\  Exception $e) {
            return response()->json(['error' => 'An error occurred while dispatching the export job'], 500);
        }
    }

        
    
}
