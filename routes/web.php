<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\pendudukController;
// use App\Http\Controllers\adminController;
use App\Http\Controllers\UserController;
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

// Route::put('/admin/user/{id}',[AdminController::class,'update_user'])->name('users.update');

Route::get('/',[userController::class,'index'])->name('mainpage');

Route::post('/admin/store_data',[pendudukController::class,'store_data'])->name('store_data');


Route::prefix('admin')->group(function () {
    
    // Route::get('{id}/edit',[pendudukController::class,'edit_data'])->name('update_data');

    Route::get('login_admin',[AdminAuthController::class,'login'])->name('login.admin');
    Route::post('login_admin_logic',[AdminAuthController::class,'login_logic'])->name('login.admin_logic');
    Route::get('logout',[AdminAuthController::class,'logout'])->name('logout.admin');
    Route::get('admin',[AdminAuthController::class,'admin'])->name('admin');
    Route::get('admin/{id}/edit',[pendudukController::class,'edit_data'])->name('edit.data');
    Route::put('admin/{id}',[pendudukController::class,'update_data'])->name('update.data');
    Route::delete('admin/{id}/delete',[pendudukController::class,'delete_penduduk'])->name('penduduk.delete');

});

Route::get('/login', [UserController::class, 'login'])->name('login_user');
Route::post('/login_user_logic', [UserController::class, 'login_logic'])->name('login.user_logic');
Route::get('/register', [UserController::class, 'register'])->name('register_user');
Route::post('/store_register', [UserController::class, 'reg_penduduk'])->name('register');
Route::get('/pengaduan', [UserController::class, 'pengaduan'])
->middleware('auth')
->name('pengaduan');




// Route::post('logout', 'AdminAuthController@logout')->name('admin.logout');
// Route::post('login', 'AdminAuthController@login')->name('admin.login.submit');
// Route::get('login', 'AdminAuthController@showLoginForm')->name('admin.login');



// Route::get('/login-admin',[adminController::class,'login'])->name('admin.login');
