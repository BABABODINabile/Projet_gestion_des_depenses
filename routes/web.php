<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OperationController;
use App\Models\Category;
use App\Models\Operation;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inscription',[UserController::class , 'create'])->name('inscription');
Route::post('/inscription',[UserController::class , 'store']);
Route::put('/profil',[UserController::class , 'update']);
Route::post('/connection',[AuthController::class , 'doLogin'])->name('auth.login');
Route::get('/index', [AuthController::class , 'index'])->middleware('auth')->name('index');
Route::get('/profil', [AuthController::class , 'profil'])->middleware('auth')->name('profil');
Route::post('/categorie', [CategoryController::class , 'store'])->name('store.category');
Route::delete('/categorie/{category}', [CategoryController::class, 'destroy'])->name('destroy.category');
Route::put('/categorie/{category}', [CategoryController::class , 'update'])->name('update.category');
Route::post('/operation',[OperationController::class , 'store'])->middleware('inject.user')->name('store.operation');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
