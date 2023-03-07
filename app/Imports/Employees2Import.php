<?php

namespace App\Imports;

use App\Models\Employees;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;

class Employees2Import implements ToCollection ,WithHeadingRow
{

    public function collection(Collection $rows){

        // Validate
        Validator::make($rows->toArray(), [
            '*.speciality' => 'required|string',
            '*.specialization'=> 'required|string',
            '*.id_op'=>'required|string',
            '*.nasva'=>'required|string',
        ],[
            '*.speciality.required'=> "The speciality field is required.",
            '*.speciality.string'=> "The speciality must be string.",
            '*.specialization.required'=> "The specialization field is required.",
            '*.specialization.string'=> "The specialization must be string.",
            '*.id_op.required'=> "The id_op field is required.",
            '*.id_op.email'=> "The id_op must be a valid email address.",
            '*.nasva.required'=> "The nasva field is required.",
            '*.nasva.email'=> "The nasvamust be a valid email address.",
        ])->validate();

        foreach ($rows as $row) {

            // Check email already exists
            $count = Employees::where('speciality',$row['speciality'])->count();
            if($count > 0){
                continue;
            }
            Employees::create([
                'speciality' => $row['speciality'],
                'specialization' => $row['specialization'],
                'id_op' => $row['id_op'],
                'nasva' => $row['nasva'],
            ]);
        }
    }

    // Specify header row index position to skip
    public function headingRow(): int {
        return 1;
    }
}
