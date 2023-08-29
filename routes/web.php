<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KainController;
use App\Http\Controllers\TokoController;

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

Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [LoginController::class, 'register']);

Route::get('/SAs', [UserController::class, 'SuperAdminList'])->name('SA_List');
Route::get('/Admins', [UserController::class, 'AdminList'])->name('A_List');
Route::get('/Users', [UserController::class, 'UserList'])->name('U_List');
Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');
Route::get('/editProfile', [UserController::class, 'showEditProfileForm'])->name('editProfile');
Route::patch('/editProfile', [UserController::class, 'editProfile']);
Route::get('/editProfilePassword', [UserController::class, 'showEditPasswordForm'])->name('editProfilePassword');
Route::patch('/editProfilePassword', [UserController::class, 'editProfilePassword']);

Route::get('/createUser', [AdminController::class,'showCreateUserForm'])->name('createUserByAdmin');
Route::post('/createUser', [AdminController::class,'createUser']);
Route::get('/editUser', [AdminController::class,'showEditUserForm'])->name('editProfileByAdmin');
Route::patch('/editUser', [AdminController::class,'editUser']);
Route::delete('/deleteUser', [AdminController::class,'deleteUser'])->name('deleteProfileByAdmin');

Route::get('/Tokos', [TokoController::class,'TokoList'])->name('toko_list');

Route::get('/dashboard', [HomeController::class,'adminPage'])->name('dash');
Route::get('/products', [HomeController::class, 'showKain'])->name('products');

Route::get('/Kains', [KainController::class,'KainList'])->name('kain_list');

Route::get('/redirect', [HomeController::class,'redirect']);
