<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;

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


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [CountryController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/edit/{id}', [CountryController::class, 'showOne'])->name('dashboard.edit');
    Route::post('/dashboard', [CountryController::class, 'create'])->name('dashboard.create');
    Route::put('/dashboard/update/{id}', [CountryController::class, 'update'])->name('dashboard.update');
    Route::delete('/dashboard/{id}', [CountryController::class, 'delete'])->name('dashboard.delete');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
