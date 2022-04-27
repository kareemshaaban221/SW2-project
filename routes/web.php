<?php

use App\Http\Controllers\AccountantContoller;
use App\Http\Controllers\DoctorContoller;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\PatientContoller;
use App\Http\Controllers\ReceptionistContoller;
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

// Auth::routes();
// Route::get('/register/step2', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm2')->name('register/step2');
// Route::post('/register/step2', 'App\Http\Controllers\Auth\RegisterController@register2')->name('register/step2');

Route::get('login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');

Route::get('register', 'App\Http\Controllers\Auth\RegisterController@showRegisterForm')->name('register');
Route::post('register', 'App\Http\Controllers\Auth\RegisterController@register')->name('register');

Route::get('register2', 'App\Http\Controllers\Auth\RegisterController@showRegisterForm2')->name('register2');
Route::post('register2/{id}', 'App\Http\Controllers\Auth\RegisterController@register2')->name('register2');

// here our routes
Route::middleware('auth')->group(function () {

    Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

    Route::get('/', fn () => redirect('/home'));
    Route::get('/home','App\Http\Controllers\HomeController@index')->name('home');

    // manager routes
    Route::resource('/managers', ManagerController::class);
    Route::post('/managers/create/exists', [
        ManagerController::class, 'createWithExistingEmail'
    ])->name('managers.create.exists');

    //doctor
    Route::resource('/doctors', DoctorContoller::class);
    Route::post('/doctors/create/exists', [
        DoctorContoller::class, 'createWithExistingEmail'
    ])->name('doctors.create.exists');

    //receptionist
    Route::resource('/receptionists', ReceptionistContoller::class);

    //accountant
    Route::resource('/accountants', AccountantContoller::class);

    //patient
    Route::resource('/patients', PatientContoller::class);

});
