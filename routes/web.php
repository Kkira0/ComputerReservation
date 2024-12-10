<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\Computer_Config_Controller;
use App\Http\Controllers\Computer_Parts_Controller;
use App\Http\Controllers\Computer_Software_Controller;
use App\Http\Controllers\Config_Controller;
use App\Http\Controllers\PC_Parts_Controller;
use App\Http\Controllers\Pieteikums_Controller;
use App\Http\Controllers\Rezervacija_Controller;
use App\Http\Controllers\Roles_Controller;
use App\Http\Controllers\Software_Controller;
use App\Http\Controllers\Users_Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/computer', [ComputerController::class, 'index'])->name('computer.index');

Route::get('/computer_config', [Computer_Config_Controller::class, 'index']);
Route::get('/computer_parts', [Computer_Parts_Controller::class, 'index']);
Route::get('/computer_software', [Computer_Software_Controller::class, 'index']);
Route::get('/config', [Config_Controller::class, 'index']);
Route::get('/pc_parts', [PC_Parts_Controller::class, 'index']);
Route::get('/pieteikums', [Pieteikums_Controller::class, 'index'])->name('pieteikums.index');
Route::get('/pieteikums/create', [Pieteikums_Controller::class, 'create'])->name('pieteikums.create');
Route::post('/pieteikums', [Pieteikums_Controller::class, 'store'])->name('pieteikums.store');

// Route::get('/rezervacija', [Rezervacija_Controller::class, 'index'])->name('rezervacija.index');
// Route::get('/rezervacija/create', [Rezervacija_Controller::class, 'create'])->name('rezervacija.create'); 
// Route::delete('/rezervacija/{id}', [Rezervacija_Controller::class, 'deny'])->name('rezervacija.deny');
// Route::get('/rezervacija/store/{pieteikums}', [Rezervacija_Controller::class, 'store'])->name('rezervacija.store');

Route::get('rezervacija', [Rezervacija_Controller::class, 'index'])->name('rezervacija.index');
Route::get('rezervacija/create', [Rezervacija_Controller::class, 'create'])->name('rezervacija.create');
Route::post('rezervacija', [Rezervacija_Controller::class, 'store'])->name('rezervacija.store');

Route::get('/roles', [Roles_Controller::class, 'index']);
Route::get('/software', [Software_Controller::class, 'index']);
Route::get('/users', [Users_Controller::class, 'index']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.submit');
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.submit');
Route::get('dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'adminIndex'])->name('admin.dashboard');
    Route::post('/admin/pieteikumi/{id}/approve', [Pieteikums_Controller::class, 'approve'])->name('admin.pieteikums.approve');
    Route::post('/admin/pieteikumi/{id}/deny', [Pieteikums_Controller::class, 'deny'])->name('admin.pieteikums.deny');

});



