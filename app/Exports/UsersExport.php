<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;    

class UsersExport implements FromCollection, WithHeadings
{
    protected $users;

    public function __construct()
    {

    }

    public function collection()
    {
        return User::select('id', 'name', 'email')->cursor();
    }

    public function headings() : array
    {
        return [
            "id",
            "name",
            "email",
        ];
    }
}
