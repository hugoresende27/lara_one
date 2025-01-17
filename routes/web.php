<?php

use App\Http\Controllers\TextDataController;
use App\Http\Controllers\HomeController;
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


/*
Route::get('/', function () {
    dd('aui');
});
*/


Route::get('/ai', [HomeController::class,'indexAI'])->name('ai.index');


Route::get('/', [HomeController::class,'home'])->name('home');

//DASHBOARD
Route::get('/dashboard', [HomeController::class,'dashboard'])->name('dashboard');

//CAM
Route::get('/cam', [HomeController::class,'cam'])->name('cam');
Route::post('/cam', [HomeController::class,'storeImage'])->name('cam.store');


Route::get('textdata', [TextDataController::class, 'index'])->name('textdata.all');

