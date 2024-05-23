<?php

namespace App\Exports;

use App\Models\Employee;
use App\Events\ExportProgress;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromGenerator;
use Maatwebsite\Excel\Concerns\FromCollection;


// class EmployeeDbExport implements FromCollection
// {
//     public function collection()
//     {
//         return Employee::limit(200)->get();
//     }
// }

class EmployeeDbExport implements FromGenerator, WithHeadings
{
    
    /**
    * @return \Generator
    */
    public function generator(): \Generator
    {
        $chunkSize = 1000; 
        $offset = 0;

        $totalRows = Employee::count();

        do {
            // Fetch data from the database 
            $employees = Employee::select('name', 'address')
                ->offset($offset)
                ->limit($chunkSize)
                ->cursor();

            foreach ($employees as $employee) {
                yield [
                    'name' => $employee->name,
                    'address' => $employee->address,
                ];
            }

            $offset += $chunkSize;

            $progress = round(($offset / ($totalRows)) * 100);

            event(new ExportProgress($progress));
        } while ($employees->count() > 0);
    }

    public function headings(): array
    {
        return [
            'name',
            'address'
        ];
    }

}
