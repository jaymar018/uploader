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
        if(count($this->chunkedData) == 1) {
            Log::info(" starting...");
        }


        $employee = [
            'name' => $row['name'],
            'address' => $row['address']
        ];

        // Adding the Employee model instance to the chunkedData array
        $this->chunkedData[] = $employee;
        
        if(count($this->chunkedData) == $this->chunkSize()) {
            Log::info("Count : " . count($this->chunkedData));
        }

        if (count($this->chunkedData) >= $this->chunkSize()) {
            $this->insertBatch();
        }

        return null;
    }

    public function chunkSize(): int
    {
        return 5000;
    }

    // public function insertBatch(){
    //     if (!empty($this->chunkedData)) {
    //         DB::beginTransaction();
    //         try {
    //             DB::table('employees')->insert($this->chunkedData);
    //             Log::info(count($this->chunkedData) . " records inserted successfully.");
    //             DB::commit();
    //         } catch (\Exception $e) {
    //             DB::rollBack();
    //             Log::error("Error inserting records: " . $e->getMessage());
    //         }
    
    //         // Clear chunked data after insertion
    //         $this->chunkedData = [];
    //     }

    // }

        
    public function insertBatch()
    {
        if (!empty($this->chunkedData)) {
            DB::beginTransaction();
            try {
                // Transform chunked data into array suitable for Eloquent insert
                $records = [];
                foreach ($this->chunkedData as $data) {
                    $records[] = [
                        'name' => $data['name'],
                        'address' => $data['address']
                    ];
                }   

                // Insert records using Eloquent's insert method
                Employee::insert($records);

                Log::info(count($this->chunkedData) . " records inserted successfully.");
                DB::commit();
                Log::info(" Commited");
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error("Error inserting records: " . $e->getMessage());
            }

            $this->chunkedData = [];
        }
    }

    // public function insertBatch()
    // {
    //     if (!empty($this->chunkedData)) {
    //         DB::beginTransaction();
    //         try {
    //             $values = [];
    //             $placeholders = [];
    //             foreach ($this->chunkedData as $data) {
    //                 $placeholders[] = '(?, ?)';
    //                 $values[] = $data['name'];
    //                 $values[] = $data['address'];
    //             }

    //             $placeholders = implode(', ', $placeholders);
    //             $query = "INSERT INTO employees (name, address) VALUES {$placeholders}";
    //             DB::insert($query, $values);

    //             Log::info(count($this->chunkedData) . " records inserted successfully.");
    //             DB::commit();
    //         } catch (\Exception $e) {
    //             DB::rollBack();
    //             Log::error("Error inserting records: " . $e->getMessage());
    //         }

    //         $this->chunkedData = [];
    //     }
    // }


    public function __destruct()
    {
        // Ensure the last chunk of data is inserted when the import process is complete
        $this->insertBatch();
    }

}
