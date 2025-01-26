<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;

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
    return view('page');

});
Route::resource('dashboard',DashboardController::class);

Route::resource('classes',ClassesController::class);
Route::get('/classes', [ClassesController::class, 'index'])->name('classes.index');
Route::post('/classes', [ClassesController::class, 'store'])->name('classes.store');

Route::resource('student',StudentController::class);
Route::get('/student', [StudentController::class, 'index'])->name('student.index');
Route::post('/student', [StudentController::class, 'store'])->name('student.store');

Route::resource('spp',SppController::class);
Route::get('/spp', [SppController::class, 'index'])->name('spp.index');
Route::post('/spp', [SppController::class, 'store'])->name('spp.store');

Route::resource('user',UserController::class);
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::post('/user', [UserController::class, 'store'])->name('user.store');

Route::resource('/payment',PaymentController::class);
Route::get('payment/search', [PaymentController::class, 'search'])->name('payment.search');
Route::get('payment/{id}', [PaymentController::class, 'show'])->name('payment.show');
Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
Route::post('/payment', [PaymentController::class, 'store'])->name('payment.store');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');


Route::get('/loginSiswa', [SiswaController::class, 'showLoginForm'])->name('siswa.login');
Route::post('/loginSiswa', [SiswaController::class, 'loginSiswa'])->name('siswa.login.post');
Route::get('/logoutSiswa', [SiswaController::class, 'logoutSiswa'])->name('siswa.logout');

Route::resource('home',HomeController::class);
Route::get('/payment_history/report', [HomeController::class, 'generateReport'])->name('report.generate');

Route::resource('page',PageController::class);

