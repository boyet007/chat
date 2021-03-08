<?php

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


Route::get('/test', function() {
    $x = 1;
    $y = 2;
    return "test chat";
});
Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', [App\Http\Controllers\ChatController::class, 'index']);
    Route::get('messages', [App\Http\Controllers\ChatController::class, 'getMessages']);
    Route::post('messages', [App\Http\Controllers\ChatController::class, 'broadcastMessage']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
