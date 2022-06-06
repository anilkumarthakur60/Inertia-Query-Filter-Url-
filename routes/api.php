<?php

use App\Http\Controllers\FilterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

Route::get('mr', function () {
    Artisan::call('migrate:fresh ');
    return 'done';
});

Route::get('blogs', [FilterController::class, 'blogs']);
Route::get('users', [FilterController::class, 'users']);
Route::get('tags', [FilterController::class, 'tags']);
Route::get('subcategories', [FilterController::class, 'subcategories']);
