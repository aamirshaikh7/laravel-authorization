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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/discussions', 'App\Http\Controllers\DiscussionController@index')->name('discussions.index');
Route::middleware(['auth:sanctum', 'verified'])->get('/discussions/{discussion}', 'App\Http\Controllers\DiscussionController@show')->name('discussions.show');
Route::middleware(['auth:sanctum', 'verified'])->post('/discussions', 'App\Http\Controllers\DiscussionController@store')->name('discussions.store');