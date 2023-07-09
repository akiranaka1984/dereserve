<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanionController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PhotoSizeEditController;

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login'); 

Route::get('forgotpassword', [AuthController::class, 'forgotpassword'])->name('forgot_password');
Route::post('forgotpassword', [AuthController::class, 'forgotpasswordSave'])->name('forgot_password_save');
Route::get('resetpassword/{token}', [AuthController::class, 'resetpassword'])->name('reset_password');
Route::post('resetpassword', [AuthController::class, 'resetpasswordSave'])->name('reset_password_save');

Route::get('signout', [AuthController::class, 'signout'])->name('signout');

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    Route::get('/dashboard', [AdminController::class,'dashboard'])->name('admin.dashbord');

    Route::get('/companion/list', [CompanionController::class,'index'])->name('admin.companion.list');
    Route::get('/companion/add', [CompanionController::class,'add'])->name('admin.companion.add');
    Route::get('/companion/edit', [CompanionController::class,'edit'])->name('admin.companion.edit');

    Route::get('/attendance/list', [AttendanceController::class,'index'])->name('admin.attendance.list');
    Route::get('/attendance/bulk', [AttendanceController::class,'bulk'])->name('admin.attendance.bulk');

    Route::get('/news/list', [NewsController::class,'index'])->name('admin.news.list');

    Route::get('/reception/list', [ReservationController::class,'index'])->name('admin.reception.list');
    Route::get('/interview/list', [ReservationController::class,'interview'])->name('admin.interview.list');

    Route::get('/photo/size', [PhotoSizeEditController::class,'index'])->name('admin.photo_size.edit');

}); 