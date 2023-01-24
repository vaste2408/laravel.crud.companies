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
    Route::resource('companies', CompanyController::class, [
        'names' => [
            'index' => 'companies'
        ]
    ]);
    Route::resource('employees', EmployeeController::class);
});

Auth::routes(['register' => false]);

Route::get('/', [HomeController::class, 'index']);
