<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Exports\UsersExportChunk;
use App\Jobs\GenerateRandomEmployee;
use App\Jobs\GenerateRandomStudentsJob;

class ExportController extends Controller
{
    public function exportUsers()
    {
        return Excel::download(new UsersExport(), 'users.xlsx');
    }

    public function exportUsersChunk()
    {
        return Excel::download(new UsersExportChunk(), 'users.xlsx');
    }

    public function generateRandomData(Request $request)
    {
        try {
            $job = $request->route()->named('export.employees') ? GenerateRandomEmployee::class : GenerateRandomStudentsJob::class;
            dispatch(new $job())->onQueue('exports');

            return response()->json(['message' => 'Export job has been dispatched successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while dispatching the export job'], 500);
        }
    }


    

}
