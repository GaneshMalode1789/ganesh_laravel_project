<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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
// Auth::routes();

Route::get('/', 'EmployeeController@index');
Route::get('/create', 'EmployeeController@create');
Route::post('/store', 'EmployeeController@store');
Route::get('/edit/{id}', 'EmployeeController@edit');
Route::post('/update/{id}', 'EmployeeController@update');
Route::get('/delete/{id}', 'EmployeeController@delete');
Route::get('/employee/search/{name}', 'EmployeeController@search');