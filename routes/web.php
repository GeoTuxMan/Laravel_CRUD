<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ajax-crud',[EmployeeController::class,'index']);
Route::post('/employeeadd', [EmployeeController::class,'store']);
Route::put('/employeeupdate/{id}', [EmployeeController::class,'update']);
Route::delete('/employeedelete/{id}', [EmployeeController::class,'delete']);
