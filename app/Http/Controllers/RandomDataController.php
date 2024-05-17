<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\RandomDataJob;
use App\Models\User;


class RandomDataController extends Controller
{

    public function export(){
        // Dispatch export job to queue
        RandomDataJob::dispatch()->onQueue('exports');

        return 'Export process started. Check your queue worker for progress.';
    }
  
}
