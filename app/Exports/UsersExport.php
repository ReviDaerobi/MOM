<?php

namespace App\Exports;

use App\Models\List_User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromQuery, WithHeadings
{
    /**
     * @return \Illuminate\Database\Query\Builder
     */
    public function query()
    {
        return List_User::query()->select('id','username', 'fullname', 'stasiuntvid', 'posisi', 'level', 'userAs', 'createdby', 'createddate');
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'id',
            'Username',
            'Fullname',
            'Company',
            'Position',
            'Level',
            'Type',
            'Created By',
            'Create Date'
        ];
    }
}
