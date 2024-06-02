<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\XyzController;
use App\Http\Controllers\Xyz1Controller;
use App\Http\Controllers\Xyz2Controller;
use Illuminate\Support\Facades\Route;
# AUTH
Route::get('/', [AuthController::class, 'loginPage']);
Route::get('/register', [AuthController::class, 'registerPage']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/deleteUser/{id}', [AuthController::class, 'deleteUser']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/edit', [AuthController::class, 'edit']);
Route::post('/changePassword', [AuthController::class, 'changePassword']);

# PT XYZ
Route::get('/xyz/home', [XyzController::class, 'home']);
Route::get('/xyz/admin/registerUser', [XyzController::class, 'registerUser']);
Route::get('/xyz/dataUser', [XyzController::class, 'dataUser']);
Route::get('/xyz/editUser/{id}', [XyzController::class, 'editUser']);
Route::get('/xyz/changePassword/{id}', [XyzController::class, 'changePassword']);

# PT XYZ-1
Route::get('/xyz-1/home', [Xyz1Controller::class, 'home']);
Route::get('/xyz-1/admin/registerUser', [Xyz1Controller::class, 'registerUser']);
Route::get('/xyz-1/dataUser', [Xyz1Controller::class, 'dataUser']);
Route::get('/xyz-1/editUser/{id}', [Xyz1Controller::class, 'editUser']);
Route::get('/xyz-1/changePassword/{id}', [Xyz1Controller::class, 'changePassword']);

# PT XYZ-2
Route::get('/xyz-2/home', [Xyz2Controller::class, 'home']);
Route::get('/xyz-2/admin/registerUser', [Xyz2Controller::class, 'registerUser']);
Route::get('/xyz-2/dataUser', [Xyz2Controller::class, 'dataUser']);
Route::get('/xyz-2/editUser/{id}', [Xyz2Controller::class, 'editUser']);
Route::get('/xyz-2/changePassword/{id}', [Xyz2Controller::class, 'changePassword']);
