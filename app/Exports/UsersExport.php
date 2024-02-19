<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return User::select('name','email','role','created_at','updated_at','id')->get();
    }

    public function headings() : array
    {
        return[
            'name' => 'Name',
            'email' => 'Email',
            'role' => 'Role',
            'created_at' => 'Created at',
            'updated_at' => 'Updated at',
            'id' => 'Id',
        ];
    }
}
