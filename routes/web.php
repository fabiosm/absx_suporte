<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
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
Route::resource('/',TicketController::class);

/*
Route::get('user/registrar', 'App\Http\Controllers\UserController@registrar');
Route::post('user/registrar', 'App\Http\Controllers\UserController@store');
*/

Route::resource('/user',UserController::class)->middleware('auth');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function (){
    return view('dashboard');
})->name('dashboard');