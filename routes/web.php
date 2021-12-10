<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TagController;
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
Route::get('/questions/ask', [PostController::class, 'ask'])->name('questions.ask');
Route::get('/questions/view/{id}', [PostController::class, 'view'])->name('questions.view');
Route::post('/questions', [PostController::class, 'store'])->name('questions.post');
Route::get('/questions/suggest', [PostController::class, 'suggest'])->name('questions.suggest');

//saved list
Route::get('/user/{id}/saved-list', [PostController::class, 'viewSavedList'])->name('savedList');
Route::post('/saved-list', [PostController::class, 'addSavedList'])->name('savedList.add');
Route::get('/saved-list/delete', [PostController::class, 'removeSavedList'])->name('savedList.delete');

//answers
Route::post('/answers/question/{idQues}', [PostController::class, 'answer'])->name('answers.post');

//users
Route::get('/users', [UserController::class, 'index'])->name('users.list');
Route::get('/users/{id}', [UserController::class, 'view'])->name('users.view');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users/edit/{id}', [UserController::class, 'update'])->name('users.update');

// comments
Route::post('/comments/post/{id}', [CommentController::class, 'store'])->name('comments.post');


//tags
Route::get('/tags/suggest', [TagController::class, 'suggest'])->name('tags.suggest');

//votes
Route::post('/questions/vote/add', [PostController::class, 'addVote'])->name('votes.add');
Route::get('/questions/vote/delete', [PostController::class, 'removeVote'])->name('votes.delete');