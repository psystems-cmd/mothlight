<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatternController;
use App\Http\Controllers\DreamController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\DashboardController;
/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('userzone.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/
Route::get('/', [WelcomeController::class, 'index'])
    ->name('home'); //gives an internal nickname to reference from now on for this speific route


//fmi.Everything in this is only for logged-in users. Everybody else gets kicked or bumped. 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/dreams/create', [App\Http\Controllers\DreamController::class, 'create'])->name('dreams.create');
    Route::post('/dreams', [App\Http\Controllers\DreamController::class, 'store'])->name('dreams.store');

    Route::get('/dreams/{dreamID}/edit', [DreamController::class, 'edit'])->name('dreams.edit');
    Route::put('/dreams/{dreamID}', [DreamController::class, 'update'])->name('dreams.update');
    Route::delete('/dreams/{dreamID}', [DreamController::class, 'destroy'])->name('dreams.destroy');
});



Route::get('/patterns', [PatternController::class, 'index'])
    ->name('patterns.index'); //gives an internal nickname to reference from now on for this speific route

Route::get('/patterns/{patternID}', [PatternController::class, 'show'])
    ->name('patterns.show'); 


Route::get('/dreams', [DreamController::class, 'index'])
    ->name('dreams.index'); //gives an internal nickname to reference from now on for this speific route

Route::get('/dreams/{dreamID}', [DreamController::class, 'show'])->name('dreams.show');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__.'/auth.php';
