<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('dashboard', [AuthController::class, 'dashboard'])->middleware('auth'); 
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'Login'])->name('login.custom'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register-user');
Route::post('registration', [AuthController::class, 'handleRegistration'])->name('register.custom'); 
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');
Route::get('/user', [AuthController::class, 'home'])->middleware(['auth', 'user']);
Route::get('/admin', [AuthController::class, 'admin'])->middleware(['auth', 'admin']);

// questions
Route::get('/questions/ask', [QuestionController::class, 'ask'])->name('questions.ask');
Route::get('/questions/view', [QuestionController::class, 'view'])->name('questions.view');


//users
Route::get('/users', [UserController::class, 'index'])->name('users.list');
Route::get('/users/{id}', [UserController::class, 'view'])->name('users.view');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');