<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ItemTypeController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\PostController;

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
Route::get('dang-nhap',[AdminController::class,'login'])->name('dang-nhap');
Route::post('dang-nhap',[AdminController::class,'store'])->name('dang-nhap');
Route::get('di',[AdminController::class,'create'])->name('di');



/** đăng xuất */
    Route::post('/logout', function () {
        Auth::logout();
        session()->flush();
        return redirect()->route('dang-nhap'); })->name('logout');
/** admin */
Route::group(['prefix' => '/admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('trang-chu');


    Route::group(['prefix' => '/tai-khoan', 'as' => 'tai-khoan.'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('/them-tai-khoan', [AdminController::class, 'showthemtaikhoan'])->name('show-them-tai-khoan');
        Route::post('/them-tai-khoan', [AdminController::class, 'themtaikhoan'])->name('xu-li-them-tai-khoan');
        Route::get('/chi-tiet/{id}', [AdminController::class, 'show'])->name('show-tai-khoan');
        Route::delete('/{id}', [AdminController::class, 'destroy'])->name('destroy');
        Route::get('/chinh-sua/{id}', [AdminController::class, 'edit'])->name('chinh-sua');
        Route::post('/cap-nhat/{id}', [AdminController::class, 'update'])->name('cap-nhat');

        
    });

    Route::group(['prefix' => '/loai-bai-dang', 'as' => 'loai-bai-dang.'], function () {
        Route::get('/', [ItemTypeController::class, 'index'])->name('index');
        Route::get('/them-loai-bai-dang', [ItemTypeController::class, 'showadd'])->name('showadd');
        Route::post('/them-loai-bai-dang', [ItemTypeController::class, 'create']);
    });

    Route::group(['prefix' => '/loai-bai-dang-con', 'as' => 'loai-bai-dang-con.'], function () {
        Route::get('/', [SubcategoryController::class, 'index'])->name('index');
        Route::get('/them', [SubcategoryController::class, 'showadd'])->name('showadd');
        Route::post('/them', [SubcategoryController::class, 'create'])->name('xu-li-them-loai-bai-dang-con');

    });
    Route::group(['prefix' => '/bai-dang', 'as' => 'bai-dang.'], function () {
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::get('/them', [PostController::class, 'addpost'])->name('addpost');
        Route::post('/them', [PostController::class, 'create'])->name('xu-li-them-bai-dang');

    });
});

