<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginWithGoogleController;
use App\Http\Controllers\SubQuestionController;
use App\Http\Controllers\UserPanel\PanelController;
use Illuminate\Support\Facades\Route;

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

Route::get('login/google', [LoginWithGoogleController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [LoginWithGoogleController::class, 'handleGoogleCallback']);

Route::get('profile/@{profile}',[PanelController::class,'index'])->name('profile');
Route::group(['middleware'=>'auth'],function (){
Route::post('@{profile}/image',[ImageController::class,'saveUserStory'])->name('user.images');
Route::delete('@{profile}/images/{image}',[ImageController::class,'deleteUserStory'])->name('user.delete.story');
});

Route::get('/',[IndexController::class,'index']);
Route::get('/log',fn() => auth()->logout());

Route::group(['prefix'=>'admin/dashboard',['as'=>'admin']],function (){
    Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard');

    Route::resource('/questions',\App\Http\Controllers\QuestionController::class);

    // sub question
    Route::get('/questions/{question}/create',[SubQuestionController::class,'create'])->name('sub_question.create');
    Route::post('/questions/{question}/store',[SubQuestionController::class,'store'])->name('sub_question.store');
    Route::delete('/subQuestion/{sub_question}',[SubQuestionController::class,'destroy'])->name('sub_question.destroy');
    Route::get('/subQuestion/{sub_question}/edit',[SubQuestionController::class,'edit'])->name('sub_question.edit');
    Route::put('/subQuestion/{sub_question}',[SubQuestionController::class,'update'])->name('sub_question.update');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
