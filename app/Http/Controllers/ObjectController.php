<?php

namespace App\Http\Controllers;

use App\Imports\ObjectMod2Import;
use App\Imports\ObjectModImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;

class ObjectController extends Controller
{
    public function index(){
        return view('index');
    }

    public function importdata(Request $request){
        Excel::import(new ObjectModImport, $request->file('file')->store('temp'));
        return back()->with('success', 'Import successfully!');
    }

    public function validataAndImportdata(Request $request){

        Excel::import(new ObjectMod2Import, "test.xlsx");
        return back()->with('success', 'Import successfully!');
    }
}
