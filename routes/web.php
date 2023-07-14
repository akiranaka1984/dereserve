<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanionController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PhotoSizeEditController;
use App\Http\Controllers\PhotoCategoryController;
use App\Http\Controllers\CategoryController;



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
    Route::post('/companion/save', [CompanionController::class,'save'])->name('admin.companion.save');
    Route::get('/companion/edit', [CompanionController::class,'edit'])->name('admin.companion.edit');
    Route::post('/companion/update', [CompanionController::class,'update'])->name('admin.companion.update');
    Route::post('/companion/extra/update', [CompanionController::class,'extra'])->name('admin.companion.extra.update');
    Route::post('/companion/photo/save', [CompanionController::class,'photo_save'])->name('admin.companion.photo.save');
    Route::post('/companion/position/save', [CompanionController::class,'position'])->name('admin.companion.position.save');
    Route::post('/companion/status/save', [CompanionController::class,'status'])->name('admin.companion.status.save');

    Route::get('/attendance/list', [AttendanceController::class,'index'])->name('admin.attendance.list');
    Route::get('/attendance/bulk', [AttendanceController::class,'bulk'])->name('admin.attendance.bulk');

    Route::get('/news/list', [NewsController::class,'index'])->name('admin.news.list');

    Route::get('/reception/list', [ReservationController::class,'index'])->name('admin.reception.list');
    Route::get('/interview/list', [ReservationController::class,'interview'])->name('admin.interview.list');

    Route::get('/photo/size', [PhotoSizeEditController::class,'index'])->name('admin.photo_size.edit');
    Route::post('/photo/save', [PhotoSizeEditController::class,'save'])->name('admin.photo_size.save');
    Route::post('/photo/update', [PhotoSizeEditController::class,'update'])->name('admin.photo_size.update');
    Route::get('/photo/delete', [PhotoSizeEditController::class,'delete'])->name('admin.photo_size.delete');

    Route::get('/photo/category/list', [PhotoCategoryController::class,'index'])->name('admin.photo.category.list');
    Route::post('/photo/category/save', [PhotoCategoryController::class,'save'])->name('admin.photo.category.save');
    Route::get('/photo/category/delete', [PhotoCategoryController::class,'delete'])->name('admin.photo.category.delete');
    Route::post('/photo/category/position/save', [PhotoCategoryController::class,'position'])->name('admin.photo.category.position.save');

    Route::get('/category/list', [CategoryController::class,'index'])->name('admin.category.list');
    Route::post('/category/save', [CategoryController::class,'save'])->name('admin.category.save');
    Route::get('/category/delete', [CategoryController::class,'delete'])->name('admin.category.delete');
    Route::post('/category/position/save', [CategoryController::class,'position'])->name('admin.category.position.save');

}); 