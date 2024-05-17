<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Student;

class StudentDbExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::select('first_name', 'last_name', 'email', 'phone', 'address', 'city', 'state',  'country', 'birthdate', 'grade')->cursor();
    }
}
