<?php

use App\Http\Controllers\DirectionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});





Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DirectionController::class, 'index']);
    Route::get('/options', [DirectionController::class, 'options'])->name("options");
    Route::post('/option_store', [DirectionController::class, 'option_store'])->name("option_store");
    Route::put('/option/update', [DirectionController::class, 'option_update'])->name('option_update');
    Route::delete('/option/destroy', [DirectionController::class, 'option_destroy'])->name('option_destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
