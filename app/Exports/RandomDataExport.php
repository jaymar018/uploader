<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class RandomDataExport implements FromCollection, WithHeadings
{
    
    protected $data;

    public function __construct(Collection $data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        return [
            'name',
            'email',
            'password',
        ];
    }

    public function append(Collection $data)
    {
        $this->data = $this->data->concat($data);
    }

//     protected $data;

//     public function __construct($data)
//     {
//         $this->data = $data;
//     }

//     public function collection()
//     {
//         return collect($this->data);
//     }

//     public function headings(): array
//     {
//         return [
//             'name',
//             'email',
//             'password',
//         ];
//     }

//     public function append(array $data)
//     {
//         $this->data = $this->data->merge($data);
//     }
// 
}
