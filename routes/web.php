<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackCategoryController;
use App\Http\Controllers\FeedbackController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('feedback_category',FeedbackCategoryController::class);
Route::resource('feedback',FeedbackController::class);
Route::get('/vote/feedback', [App\Http\Controllers\FeedbackController::class, 'voteFeedback']);
