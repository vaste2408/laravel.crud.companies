<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['auth']], function() {
    Route::get('companies/data', [CompanyController::class, 'data']);
    Route::post('companies/{company}', [CompanyController::class, 'update']); //Html forms sadly cannot use PUT/PATCH methods
    Route::resource('companies', CompanyController::class, [
        'names' => [
            'index' => 'companies'
        ]
    ]);
    Route::get('employees/data', [EmployeeController::class, 'data']);
    Route::post('employees/{employee}', [EmployeeController::class, 'update']); //Same hack as for companies
    Route::resource('employees', EmployeeController::class, [
        'names' => [
            'index' => 'employees'
        ]
    ]);
});

Auth::routes(['register' => false]);

Route::get('/', [HomeController::class, 'index']);
