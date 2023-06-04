<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/versi', function(){
    return view('welcome');
});

// Route::put('/admin/user/{id}',[AdminController::class,'update_user'])->name('users.update');

Route::get('/', [UserController::class,'index'])->name('mainpage');

Route::post('/admin/store_data',[pendudukController::class,'store_data'])->name('store_data');
Route::get('/perangkat', [LoginController::class,'tampilanAdmin'])->middleware('admin')->name('admin');

// Route::get('{id}/edit',[pendudukController::class,'edit_data'])->name('update_data');
Route::get('/admin/login_admin',[LoginController::class,'index'])->middleware('guest')->name('login.admin');
Route::post('/admin/login_admin_logic',[LoginController::class,'authenticate'])->middleware('guest')->name('login.admin_logic');
Route::get('/admin/logout',[LoginController::class,'logout'])->middleware('admin')->name('logout.admin');
Route::get('/admin/{id}/edit',[pendudukController::class,'edit_data'])->name('edit.data');
Route::put('/admin/{id}',[pendudukController::class,'update_data'])->name('update.data');
Route::delete('/admin/{id}/delete',[pendudukController::class,'delete_penduduk'])->name('penduduk.delete');

Route::get('/login', [UserController::class, 'login'])->name('login_user');
Route::post('/login_user_logic', [UserController::class, 'login_logic'])->name('login.user_logic');
Route::get('/register', [UserController::class, 'register'])->name('register_user');
Route::post('/store_register', [UserController::class, 'reg_penduduk'])->name('register');
Route::get('/pengaduan', [UserController::class, 'pengaduan'])->middleware('auth')->name('pengaduan');
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth')->name('logout');




// Route::post('logout', 'LoginController@logout')->name('admin.logout');
// Route::post('login', 'LoginController@login')->name('admin.login.submit');
// Route::get('login', 'LoginController@showLoginForm')->name('admin.login');



// Route::get('/login-admin',[adminController::class,'login'])->name('admin.login');