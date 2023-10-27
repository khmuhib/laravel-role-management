<?php

use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin');
})->middleware(['auth'])->name('dashboard');

Route::get('/file', [FileController::class, 'index'])->middleware(['auth'])->name('file.index');
Route::get('/role', [RoleController::class, 'index'])->middleware(['auth'])->name('role.index');
Route::get('/user', [UserController::class, 'index'])->middleware(['auth'])->name('user.index');

require __DIR__ . '/auth.php';
