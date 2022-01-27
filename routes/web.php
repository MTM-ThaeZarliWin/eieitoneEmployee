<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserCotroller;
use App\Http\Controllers\Backend\CountryCotroller;
use App\Http\Controllers\Backend\ChangePasswordController;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\DepartmentController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/users',App\Http\Controllers\Backend\UserController::class);
//Country Resource
Route::resource('/countries',App\Http\Controllers\Backend\CountryController::class);
Route::resource('states',App\Http\Controllers\Backend\StateController::class);
Route::resource('cities',App\Http\Controllers\Backend\CityController::class);
Route::resource('departments',App\Http\Controllers\Backend\DepartmentController::class);

//To Change Password
Route::post('users/{user}/change-password',[App\Http\Controllers\Backend\ChangePasswordController::class, 'change_password'])->name('users.change.password');

Route::get('{any}',function(){
    return view('employees.index');
})->where('any','.*');