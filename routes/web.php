<?php

use App\Http\Controllers\ManagerController;
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
    Route::get('/doctor', [App\Http\Controllers\DoctorContoller::class, 'index'])->name('doctor');

    Route::get('/adddoctor', [App\Http\Controllers\DoctorContoller::class, 'create'])->name('add.doctor');
    Route::get('/alldoctor', [App\Http\Controllers\DoctorContoller::class, 'show'])->name('show.doctor');
    Route::post('/storedoctor', [App\Http\Controllers\DoctorContoller::class, 'store'])->name('store.doctor');
    Route::post('/deletedoctor', [App\Http\Controllers\DoctorContoller::class, 'destroy'])->name('delete.doctor');
    Route::post('/editdoctor', [App\Http\Controllers\DoctorContoller::class, 'edit'])->name('edit.doctor');

    //assistant
    Route::get('/assistant', [App\Http\Controllers\AssistantContoller::class, 'index'])->name('assistant');
    Route::get('/addassistant', [App\Http\Controllers\AssistantContoller::class, 'create'])->name('add.assistant');
    Route::get('/allassistant', [App\Http\Controllers\AssistantContoller::class, 'show'])->name('show.assistant');
    Route::post('/storeassistant', [App\Http\Controllers\AssistantContoller::class, 'store'])->name('store.assistant');
    Route::post('/deleteassistant', [App\Http\Controllers\AssistantContoller::class, 'destroy'])->name('delete.assistant');
    Route::post('/editassistant', [App\Http\Controllers\AssistantContoller::class, 'edit'])->name('edit.assistant');

    //accountant
    Route::get('/accountant', [App\Http\Controllers\AccountantContoller::class, 'index'])->name('accountant');
    Route::get('/addaccountant', [App\Http\Controllers\AccountantContoller::class, 'create'])->name('add.accountant');
    Route::get('/allaccountant', [App\Http\Controllers\AccountantContoller::class, 'show'])->name('show.accountant');
    Route::post('/storeaccountant', [App\Http\Controllers\AccountantContoller::class, 'store'])->name('store.accountant');
    Route::post('/deleteaccountant', [App\Http\Controllers\AccountantContoller::class, 'destroy'])->name('delete.accountant');
    Route::post('/editaccountant', [App\Http\Controllers\AccountantContoller::class, 'edit'])->name('edit.accountant');

    //patient
    Route::get('/patient', [App\Http\Controllers\PatientContoller::class, 'index'])->name('patient');
    Route::get('/addpatient', [App\Http\Controllers\PatientContoller::class, 'create'])->name('add.patient');
    Route::get('/allpatient', [App\Http\Controllers\PatientContoller::class, 'show'])->name('show.patient');
    Route::post('/storepatient', [App\Http\Controllers\PatientContoller::class, 'store'])->name('store.patient');
    Route::post('/deletepatient', [App\Http\Controllers\PatientContoller::class, 'destroy'])->name('delete.patient');
    Route::post('/editpatient', [App\Http\Controllers\PatientContoller::class, 'edit'])->name('edit.patient');
});
