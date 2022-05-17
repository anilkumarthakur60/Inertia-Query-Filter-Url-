<?php

use App\Http\Controllers\FrontEndController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});


Route::get('filter', [FrontEndController::class, 'filter'])->name('filter');
Route::get('newfilter', [FrontEndController::class, 'newfilter'])->name('newfilter');
Route::get('category', [FrontEndController::class, 'category'])->name('category');
Route::get('dependent-dropdown', [FrontEndController::class, 'dependentFirst'])->name('dependentFirst');

Route::get('get-second/{first}', [FrontEndController::class, 'getSecondFromFirst'])->name('getSecondFromFirst');
Route::get('get-third/{second}', [FrontEndController::class, 'getThirdFromSecond'])->name('getThirdFromSecond');
Route::get('get-fourth/{third}', [FrontEndController::class, 'getFourthFromThird'])->name('getFourthFromThird');
