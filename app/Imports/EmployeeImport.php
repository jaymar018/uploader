<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


class EmployeeImport implements ToModel, WithHeadingRow, WithChunkReading
{

    private $chunkedData = [];


    public function model(array $row){

        $employee = [
            'name' => $row['name'],
            'address' => $row['address']
        ];

        // Adding the Employee model instance to the chunkedData array
        $this->chunkedData[] = $employee;

        if (count($this->chunkedData) >= $this->chunkSize()) {
            $this->insertBatch();
        }

        return null;
    }

    public function chunkSize(): int
    {
        return 2000;
    }

    public function insertBatch(){
        if (!empty($this->chunkedData)) {
            DB::beginTransaction();
            try {
                DB::table('employees')->insert($this->chunkedData);
                Log::info(count($this->chunkedData) . " records inserted successfully.");
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error("Error inserting records: " . $e->getMessage());
            }
    
            // Clear chunked data after insertion
            $this->chunkedData = [];
        }

    }

}
