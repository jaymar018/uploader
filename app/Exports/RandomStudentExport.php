<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Faker\Factory as Faker;
use Maatwebsite\Excel\Concerns\FromGenerator;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RandomStudentExport implements FromGenerator, WithHeadings
{

    private $faker;

    public function __construct()
    {
        $this->faker = Faker::create(); 
        $this->faker->unique(true); // Enable unique value tracking  
    }

    public function generator(): \Generator
    {
        for ($i = 0; $i < 100000; $i++)
        {
            yield[
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'country' => $this->faker->country(),
            'birthdate' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'grade' => $this->faker->randomElement(['A', 'B', 'C', 'D', 'F']),
            ];
        }
    }

    public function headings(): array
    {
        return [
            'First Name',
            'Last Name',
            'Email',
            'Phone',
            'Address',
            'City',
            'State',
            'Country',
            'Birthdate',
            'Grade'
        ];
    }


}
