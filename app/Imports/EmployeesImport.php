<?php

namespace App\Imports;

use App\Models\Employees;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

abstract class EmployeesImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        $count = Employees::where('speciality', $row[0])->count();
       if ($count > 0) {
           return null;
       }
       return new Employees([
                'speciality' => $row[0],
                'specialization'=> $row[1],
                'id_op'=>$row[2],
                'nasva'=>$row[3],
            ]);
    }

}
