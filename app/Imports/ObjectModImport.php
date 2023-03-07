<?php

namespace App\Imports;

use App\Models\ObjectMod;
use Maatwebsite\Excel\Concerns\ToModel;

class ObjectModImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $count = ObjectMod::where('speciality', $row[0])->count();
        if($count > 0){
            return null;
        }
        return new ObjectMod([
            'speciality'=> $row[0],
            'specialization'=> $row[1],
            'idop' =>$row[2],
            'nasva' => $row[3],
            //
        ]);
    }
}
