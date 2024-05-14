<?php

namespace App\Jobs;


use Faker\Factory as Faker;
use App\Exports\RandomDataExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Illuminate\Support\Collection;



class RandomDataJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $batchSize = 1000; // Set the batch size
    protected $totalRecords = 400000; // Total number of records to generate

 

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        Log::info('RandomDataJob started');

        $faker = Faker::create();
        $fileName = 'random_data_' . uniqid() . '.xlsx';
        $offset = 0;
        $export = new RandomDataExport(new Collection()); // Initialize with an empty collection

        while ($offset < $this->totalRecords) {
            $data = $this->generateData($faker, min($this->batchSize, $this->totalRecords - $offset));
            $export->append(new Collection($data)); // Append the data to the export
            Log::info("Generated and appended data for offset: $offset");

            $offset += $this->batchSize;
        }

        Excel::store($export, $fileName, 'public'); // Store the export
        Log::info('Data exported to file: ' . $fileName);
        Log::info('RandomDataJob completed');


    }

        /**
     * Generate data.
     *
     * @param  \Faker\Generator  $faker
     * @param  int  $count
     * @return array
     */
    protected function generateData($faker, $count)
    {
        $data = [];

        for ($i = 0; $i < $count; $i++) {
            $data[] = [
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => $faker->password,
            ];
        }

        return $data;

    }
}