<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\NewsController;
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
// Route::get('/admin', [AuthController::class, 'admin'])->middleware(['auth', 'admin']);

//post
Route::get('/posts/detail/{id}', [PostController::class, 'viewPostDetail'])->name('posts.detail');
Route::get('/posts/delete/{id}', [PostController::class, 'deletePost'])->name('posts.delete');

// questions
Route::get('/questions/ask', [PostController::class, 'ask'])->name('questions.ask');
Route::get('/questions/view/{id}', [PostController::class, 'view'])->name('questions.view');
Route::post('/questions', [PostController::class, 'store'])->name('questions.post');
Route::get('/questions/suggest', [PostController::class, 'suggest'])->name('questions.suggest');
Route::get('/questions/detail/{id}', [PostController::class, 'questionDetail'])->name('questions.detail');
Route::get('questions/delete/{id}', [PostController::class, 'questionDelete'])->name('questions.delete');

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
Route::get('/users/detail/{id}', [UserController::class, 'customerDetail'])->name('users.detail');
Route::get('users/delete/{id}', [UserController::class, 'userDelete'])->name('users.delete');

// comments
Route::post('/comments/post/{id}', [CommentController::class, 'store'])->name('comments.post');


//tags
Route::get('/tags', [TagController::class, 'viewTags'])->name('tags');
Route::get('/tags/suggest', [TagController::class, 'suggest'])->name('tags.suggest');
Route::get('tags/list', [TagController::class, 'listTags'])->name('tags.list');
Route::get('tags/detail/{id}', [TagController::class, 'tagDetail'])->name('tags.detail');
Route::get('tags/update/{id}', [TagController::class, 'tagUpdate'])->name('tags.update');
Route::get('tags/delete/{id}', [TagController::class, 'tagDelete'])->name('tags.delete');


//votes
Route::post('/questions/vote/add', [PostController::class, 'addVote'])->name('votes.add');
Route::get('/questions/vote/delete', [PostController::class, 'removeVote'])->name('votes.delete');

//search
Route::get('/search', [HomeController::class, 'search'])->name('search');

//report
Route::post('/report', [PostController::class, 'report'])->name('report');
Route::get('/report', [PostController::class, 'removeReport'])->name('report.remove');
Route::get('/report/delete/{id}', [PostController::class, 'removeReportById'])->name('report.removeById');

//notification
Route::get('/notifications/count-not-check/{userId}', [NotificationController::class, 'countNotificationsNotCheckOfUser'])->name('notification.notCheck');
Route::get('/notifications/dropdown/{userId}', [NotificationController::class,'viewNotificationNotCheck']);
Route::get('/notifications/read/{id}', [NotificationController::class, 'setCheckNotification'])->name('notifications.read');
Route::get('/notifications/{userId}', [NotificationController::class, 'viewNotificationsList'])->name('notifications.list');
Route::post('/notifications', [NotificationController::class, 'createNotification'])->name('notifications.create');

//news
Route::get('/news/{type}', [NewsController::class, 'getList'])->name('news');
Route::get('/news/{type}/{id}', [NewsController::class, 'getDetail'])->name('news.detail');

//admin dashboard
Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'admin'])->name('admin.dashboard');
    Route::get('/admin/users-manager', [AdminController::class, 'usersManager'])->name('admin.users-manager');
    Route::get('/admin/tags-manager', [AdminController::class, 'tagsManager'])->name('admin.tags-manager');
    Route::get('/admin/posts-manager', [AdminController::class, 'postsManager'])->name('admin.posts-manager');
    Route::get('/admin/reports-manager', [AdminController::class, 'reportsManager'])->name('admin.reports-manager');
    Route::get('/admin/news-manager', [AdminController::class, 'newsManager'])->name('admin.news-manager');
    Route::get('/admin/news-manager/view/{id}', [AdminController::class, 'newsView'])->name('admin.news-manager.view');
    Route::get('/admin/news-manager/edit/{id}', [AdminController::class, 'newsEdit'])->name('admin.news-manager.edit');
    Route::post('/admin/news-manager', [AdminController::class, 'newsAdd'])->name('admin.news-manager.post');
    Route::post('/admin/news-manager/{id}', [AdminController::class, 'newsStore'])->name('admin.news-manager.store');
    Route::get('/admin/news-manager/delete/{id}', [AdminController::class, 'newsDelete'])->name('admin.news-manager.delete');
});

