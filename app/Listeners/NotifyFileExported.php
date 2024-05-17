<?php

namespace App\Listeners;

use App\Events\FileExported;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class NotifyFileExported
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\FileExported  $event
     * @return void
     */
    public function handle(FileExported $event)
    {
        Log::info('Employee export file has been stored: ' . $event->filePath);
    }
}
