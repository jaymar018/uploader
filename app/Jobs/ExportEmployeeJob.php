<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EmployeeDbExport;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Helpers\FilePathHelper;
use App\Jobs\GenerateDownloadUrl;

class ExportEmployeeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {    
        $filePath = 'exports/' . time() . 'employeesdb.csv';

        Excel::store(new EmployeeDbExport(), $filePath, 'public');
        
        // Cache the file path
        cache()->put('exported_file_path', $filePath, now()->addHours(1));
    }

}
    