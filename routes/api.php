<?php

use App\Http\Controllers\ProgrameController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Programes;
use App\Models\Branch;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/review', function () {
    $review = Programes::all();
    return $review;
});

Route::get('/branch', function () {
    $branch = Branch::all();
    return $branch;
});

// Route::post('/present/form', [ProgrameController::class, 'create']);
