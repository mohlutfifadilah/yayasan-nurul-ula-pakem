<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GantiPassword;
use App\Http\Controllers\JenjangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsersController;
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

// Admin

Route::get('/', [MainController::class, 'index']);

# Admin
Route::get('/dashboard',  [DashboardController::class, 'index']);
Route::resource('profil', ProfilController::class);
Route::resource('users', UsersController::class);
Route::resource('role', RoleController::class);
Route::resource('jenjang', JenjangController::class);

Route::get('/gantiPassword/{id}', [GantiPassword::class, 'change'])->name('change');
Route::put('/updatePassword/{id}', [GantiPassword::class, 'update'])->name('update-password');

// Login
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
