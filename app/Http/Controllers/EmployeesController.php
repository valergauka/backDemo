<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\EmployeesImport;
use App\Imports\Employees2Import;
use Maatwebsite\Excel\Facades\Excel;

class EmployeesController extends Controller
{
    public function index(){
        return view('index');
    }

    // Import data
    public function importdata(Request $request){
        Excel::import(new EmployeesImport, $request->file('file')->store('temp'));
        return back()->with('success', 'Import successfully!');
    }

    // Validate and Import data
    public function validateAndImportdata(Request $request){

        Excel::import(new Employees2Import, "employees.xlsx");
        return back()->with('success', 'Import successfully!');
    }

}
