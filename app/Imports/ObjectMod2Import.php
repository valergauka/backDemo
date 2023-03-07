<?php

namespace App\Imports;

use App\Models\ObjectMod;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;

class ObjectMod2Import implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
            '*.speciality'=>'required|string',
            '*.specialization'=> 'required|string',
            '*.idop' =>'required|integer',
            '*.nasva' =>'required|string',
        ],[
            '*.speciality.required'=> "The speciality field is required.",
            '*.speciality.string'=> "The speciality must be string.",
            '*.specialization.required'=> "The specialization field is required.",
            '*.specialization.string'=> "The specialization must be string.",
            '*.idop.integer'=> "The idop must be an integer.",
            '*.nasva.required'=> "The nasva field is required.",
            '*.nasva.string'=> "The nasva must be a valid email address."
           ])->validate();

        foreach ($rows as $row) {

            // Check email already exists
            $count =ObjectMod::where('speciality',$row['speciality'])->count();
            if($count > 0){
                continue;
            }
           ObjectMod::create([
                'speciality' => $row['speciality'],
                'specialization' => $row['specialization'],
               'idop' => $row['idop'],
               'nasva' => $row['nasva'],

            ]);
        }
    }

    // Specify header row index position to skip
    public function headingRow(): int {
        return 1;
    }
}

