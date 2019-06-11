<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name'     => $row[1],
            'email'    => $row[2],
            'certi_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[3]),
            'password' =>  \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[4]),
        ]);
    }
}
