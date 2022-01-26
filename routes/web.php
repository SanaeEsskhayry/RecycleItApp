<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BongesteController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ChallengeController;

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
Route::resource('/users', UsersController::class);
Route::resource('/categorie', CategorieController::class)->middleware(['auth']);
Route::resource('/postes', PostController::class);
Route::put('updatestatut/{id}','App\Http\Controllers\PosteController@updatestatut')->middleware(['auth']);
Route::resource('/challenges', ChallengeController::class)->middleware(['auth']);
Route::resource('/bongestes', BongesteController::class)->middleware(['auth']);
