<?php

namespace App\Imports;

use App\Models\List_User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new List_User([
            'username' => $row['username'],
            'fullname' => $row['fullname'],
            'posisi' => $row['posisi'],
        ]);
    }
}
