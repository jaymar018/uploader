<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;


class EmployeeImport implements ToModel, WithHeadingRow, WithChunkReading
{

    private $chunkedData = [];
    private $count = 0;


    public function model(array $row){

        $employee = [
            'name' => $row['name'],
            'address' => $row['address']
        ];

        // Adding the Employee model instance to the chunkedData array
        $this->chunkedData[] = $employee;

        //Log::info("Data #" . $this->count. " " . $chunkedData);
        $this->count++;
        
        if (count($this->chunkedData) >= $this->chunkSize()) {
            $this->insertBatch();
        }

        return null;
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function onEnd(): void
    {
        $this->insertBatch();
        Log::info("onEnd");
    }

    public function insertBatch(){
        if (!empty($this->chunkedData)) {
            try {
                Employee::insert($this->chunkedData);
                Log::info(count($this->chunkedData) . " records inserted successfully.");
            } catch (\Exception $e) {
                Log::error("Error inserting records: " . $e->getMessage());
            }
    
            // Clear chunked data after insertion
            $this->chunkedData = [];
        }
        Log::info("No data has been inserted");

    }

}
