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
//route pour option
    Route::get('/options', [DirectionController::class, 'options'])->name("options");
    Route::post('/option_store', [DirectionController::class, 'option_store'])->name("option_store");
    Route::put('/option/update', [DirectionController::class, 'option_update'])->name('option_update');
    Route::delete('/option/destroy', [DirectionController::class, 'option_destroy'])->name('option_destroy');
//route pour classe
    Route::get('/classes', [DirectionController::class, 'classe'])->name("classe");
    Route::post('/classe_store', [DirectionController::class, 'classe_store'])->name("classe_store");
    Route::put('/classe/update', [DirectionController::class, 'classe_update'])->name('classe_update');
    Route::delete('/classe/destroy', [DirectionController::class, 'classe_destroy'])->name('classe_destroy');

   //route pour branche
   Route::get('/branch', [DirectionController::class, 'branch'])->name("branch");
   Route::post('/branch_store', [DirectionController::class, 'branch_store'])->name("branch_store");
   Route::put('/branch/update', [DirectionController::class, 'branch_update'])->name('branch_update');
   Route::delete('/branch/destroy', [DirectionController::class, 'branch_destroy'])->name('branch_destroy');

 //route pour cours
 Route::get('/cours', [DirectionController::class, 'cours'])->name("branch");
 Route::post('/cours_store', [DirectionController::class, 'cours_store'])->name("cours_store");
 Route::put('/cours/update', [DirectionController::class, 'cours_update'])->name('cours_update');
 Route::delete('/cours/destroy', [DirectionController::class, 'cours_destroy'])->name('cours_destroy');
//Eleves
Route::get('/eleves', [DirectionController::class, 'eleves'])->name("eleves");
Route::post('/eleves_store', [DirectionController::class, 'eleves_store'])->name("eleves_store");
Route::put('/eleves/update', [DirectionController::class, 'eleves_update'])->name('eleves_update');
Route::delete('/eleves/destroy', [DirectionController::class, 'eleves_destroy'])->name('eleves_destroy');
//profils
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
