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
    Route::get('/admin/computer', [DashboardController::class, 'adminComputer'])->name('admin.computer');
    Route::get('/computers/create', [ComputerController::class, 'create'])->name('admin.computer.create'); 
    Route::post('/computers', [ComputerController::class, 'store'])->name('admin.computer.store'); 
    Route::get('/software/{software}/edit', [Software_Controller::class, 'edit'])->name('software.edit');
    Route::put('/software/{software}', [Software_Controller::class, 'update'])->name('software.update');
    Route::get('/computer/{computer}/edit', [ComputerController::class, 'edit'])->name('computer.edit');
    Route::put('/computer/{computer}', [ComputerController::class, 'update'])->name('computer.update');
    Route::get('/software/create', [Computer_Software_Controller::class, 'createSoftware'])->name('software.create');
    Route::post('/software', [Computer_Software_Controller::class, 'storeSoftware'])->name('software.store');
    Route::get('/computer/{Computer_ID}/software/add', [Computer_Software_Controller::class, 'showAddExistingSoftwareForm'])->name('computer.addExistingSoftwareForm');
    Route::post('/computer/{Computer_ID}/software', [Computer_Software_Controller::class, 'addExistingSoftwareToComputer'])->name('computer.addExistingSoftware');
    Route::post('/computers/{Computer_ID}/software', [Computer_Software_Controller::class, 'addSoftwareToComputer'])->name('computer.addSoftware');
    Route::get('/computer/{Computer_ID}/pc_parts/add', [Computer_Parts_Controller::class, 'showAddExistingHardwareForm'])->name('computer.addExistingHardwareForm');
    Route::get('/pc_parts/create', [Computer_Parts_Controller::class, 'createHardware'])->name('pc_parts.create');
    Route::post('/pc_parts', [Computer_Parts_Controller::class, 'storeHardware'])->name('pc_parts.store');
    Route::post('/computer/{Computer_ID}/pc_parts', [Computer_Parts_Controller::class, 'addExistingHardwareToComputer'])->name('computer.addExistingHardware');
    Route::delete('/computer/{Computer_ID}/destroy', [ComputerController::class, 'destroy'])->name('computer.destroy');
    Route::delete('/computer/{computer_id}/software/{software_id}/destroy', [ComputerController::class, 'destroySoftware'])->name('computer.software.destroy');
    Route::delete('/computer/{computer_id}/pc_parts/{part_id}/destroy', [ComputerController::class, 'destroyHardware'])->name('computer.pc_parts.destroy');

    Route::post('/computers/{Computer_ID}/pc_parts', [Computer_Software_Controller::class, 'addHardwareToComputer'])->name('computer.addHardware');
    Route::post('/admin/pieteikumi/{id}/approve', [Pieteikums_Controller::class, 'approve'])->name('admin.pieteikums.approve');
    Route::post('/admin/pieteikumi/{id}/deny', [Pieteikums_Controller::class, 'deny'])->name('admin.pieteikums.deny');

});



