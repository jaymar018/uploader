<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Faker\Factory as Faker;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromGenerator;


class EmployeeExport implements FromGenerator, WithHeadings
{
    private $faker;

    public function __construct()
    {
        $this->faker = Faker::create();
    }

    /**
    * @return \Generator
    */
    public function generator(): \Generator
    {
        for ($i = 0; $i < 900000; $i++) {
            yield [
                'name' => $this->faker->name,
                'address' => $this->faker->address,
            ];
        }
    }

    public function headings(): array
    {
        return [
            'name',
            'address'
        ];
    }
}