<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ItemTypeController;
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

Route::get('/', [AdminController::class, 'index'])->name('trang-chu')->middleware('web');
Route::get('/home', [AdminController::class, 'index'])->name('trang-chu')->middleware('web');

Route::group(['prefix' => '/loai-bai-dang', 'as' => 'loai-bai-dang.'], function () {
    Route::get('/', [ItemTypeController::class, 'index'])->name('index');
});