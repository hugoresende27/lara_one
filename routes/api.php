<?php

use App\Http\Controllers\API\HomeAPIController;
use App\Http\Controllers\API\TextDataAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('about', [HomeAPIController::class, 'aboutMe'])->name('home.aboutme');

Route::resource('textdata', TextDataAPIController::class);
//Route::post('textdata', [TextDataAPIController::class, 'store']);
