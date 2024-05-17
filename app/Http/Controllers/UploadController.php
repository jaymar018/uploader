<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\UsersExport;
use App\Jobs\ImportExcelJob;
use Illuminate\Http\Request;
use App\Helpers\FilePathHelper;
use App\Jobs\ExportEmployeeJob;
use App\Exports\EmployeeDbExport;
use App\Exports\UsersExportChunk;
use App\Jobs\ImportStudentExcelJob;
use Illuminate\Support\Facades\Log;
use App\Jobs\GenerateRandomEmployee;
use Maatwebsite\Excel\Facades\Excel;
use App\Jobs\GenerateRandomStudentsJob;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Jobs\ImportEmployeeExcelJob;

class UploadController extends Controller
{

    protected $filePath;

    public function showUploadForm(Request $request)
    {

        if ($request->route()->named('upload.employee.form')) {
            $formAction = route('upload.employee');
        } elseif ($request->route()->named('upload.student')) {
            $formAction = route('upload.student');
        } else {
            $formAction = route('upload.form');
        }

        $title = $this->getTitle($request->route()->getName());


        return view('upload', compact('formAction', 'title'));
    }

    private function getTitle($routeName)
    {
        switch ($routeName) {
            case 'upload.user.form':
                return 'Upload User Data';
            case 'upload.employee.form':
                return 'Upload Employee Data';
            case 'upload.student.form':
                return 'Upload Student Data';
            default:
                return 'Upload User Data';
        }
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx|max:102400', // Max 100MB
        ]);

        $filePath = $request->file('file')->store('uploads');

        switch($request->route()->named())
        {
            case 'upload.employee':
                ImportEmployeeExcelJob::dispatch($filePath)->onQueue('imports');
                break;
            case 'upload.student':
                ImportStudentExcelJob::dispatch($filePath)->onQueue('imports');
                break;
            default:
                ImportExcelJob::dispatch($filePath)->onQueue('imports');        
        }

        return redirect()->back()->with('success', 'File uploaded successfully and is being processed.');
    }

    
    
    

        
    
}
