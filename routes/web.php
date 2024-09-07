<?php

use App\Http\Controllers\ChurchController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LeaderController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('churches', ChurchController::class);
    Route::resource('leaders', LeaderController::class);
    Route::resource('members', MemberController::class);
    Route::resource('events', EventController::class);
    Route::resource('news', NewsController::class);


    // Route::get('/events', [EventController::class, 'index'])->name('events.index');
    // Route::post('/events', [EventController::class, 'store'])->name('events.store');
    // Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
