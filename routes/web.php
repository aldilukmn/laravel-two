<?php

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentsController;
use App\Http\Middleware\UserCheckLogin;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('partials.mains.student');
// });

// Route::get('/', [StudentsController::class, 'home']);

Route::resource('students', StudentsController::class);

Route::get('auth/google', [GoogleController::class, 'redirectToGoole'])->name('google-auth');

// Route::get('login', [LoginController::class, 'Login']);


Route::controller(LoginController::class)->group(function(){
    Route::get('login', 'login')->name('login');
    Route::post('login/process', 'process');
    Route::get('logout', 'logout');
});

Route::group(['middleware' => ['auth']], function() {
    Route::group(['middleware' => ['UserCheckLogin:1']], function() {
        Route::resource('/home', HomeController::class);
    });
    Route::group(['middleware' => ['UserCheckLogin:2']], function() {
        Route::resource('/students', StudentsController::class);
    });
});
