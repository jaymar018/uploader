<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Faker\Factory as Faker;

class EmployeeExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $faker = Faker::create();
        $data = [];

        for($i = 0; $i < 50000; $i++){
            $data[] = [
                'name' => $faker->name,
                'address' => $faker->address,
            ];
        }

        return collect($data);
    }

    public function headings(): array
    {
        return [
            'id',
            'name',
            'address'
        ];
    }

}
