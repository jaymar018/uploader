<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExportChunk implements FromCollection, WithHeadings
{

    //use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $users = User::query()->select('id', 'name', 'email')->get();
        return $users->chunk(1000);
    }

    public function headings(): array
    {
        return [
            'id',
            'name',
            'email',
        ];
    }

}
