<?php

namespace App\Imports;

use App\Testtable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TesttableImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Testtable([
            'name'     => $row['name'],
            'email'    => $row['email']
        ]);
    }
}
