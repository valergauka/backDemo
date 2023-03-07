<?php

use Illuminate\Support\Facades\Route;
use SebastianBergmann\Comparator\ObjectComparator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ObjectComparator::class, 'index'])->name('home');
Route::post('object/importdata', [ObjectComparator::class, 'importData'])->name('object.importdata');
Route::post('object/validateandimportdata/', [ObjectComparator::class, 'validateAndImportdata'])->name('employees.validateandimportdata');
