<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StudentsImport implements ToModel, WithHeadingRow, WithChunkReading
{
    private $chunkedData = [];


    public function model(array $row)
    {
        $birthdate = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['birthdate']));

        $student = [
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'email' => $row['email'],
            'phone' => $row['phone'],
            'address' => $row['address'],
            'city' => $row['city'],
            'state' => $row['state'],
            'country' => $row['country'],
            'birthdate' => $birthdate->toDateString(),
            'grade' => $row['grade'],
        ];

        // Adding the Employee model instance to the chunkedData array
        $this->chunkedData[] = $student;
        
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
        
    public function insertBatch()
    {
        if (!empty($this->chunkedData)) {
            DB::beginTransaction();
            try {
                // Transform chunked data into array suitable for Eloquent insert
                $records = [];
                foreach ($this->chunkedData as $data) {
                    $records[] = [
                        'first_name' => $data['first_name'],
                        'last_name' => $data['last_name'],
                        'email' => $data['email'],
                        'phone' => $data['phone'],
                        'address' => $data['address'],
                        'city' => $data['city'],
                        'state' => $data['state'],
                        'country' => $data['country'],
                        'birthdate' => $data['birthdate'],
                        'grade' => $data['grade'],
                    ];
                }   

                // Insert records using Eloquent's insert method
                Student::insert($records);

                Log::info(count($this->chunkedData) . " records inserted successfully.");
                DB::commit();
                Log::info("Commited");
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error("Error inserting records: " . $e->getMessage());
            }

            $this->chunkedData = [];
        }
    }

    public function __destruct()
    {
        // Ensure the last chunk of data is inserted when the import process is complete
        $this->insertBatch();
    }

}
