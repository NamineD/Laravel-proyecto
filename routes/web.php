<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonasController;

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
    return view('auth.login');
});

/*
Route::get('/personas', function () {
    return view('personas.index');
});

Route::get('/personas/create', [PersonasController::class,'create']);
*/

Route::resource('personas', PersonasController::class)->middleware('auth');

Auth::routes(['register'=>false,'reset'=>false]);

Route::get('/home', [PersonasController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/', [PersonasController::class, 'index'])->name('home');
});
