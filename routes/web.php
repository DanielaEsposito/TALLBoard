<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Project\ProjectPageComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/projects', ProjectPageComponent::class)
    ->middleware(['auth', 'verified'])
    ->name('projects');

Route::get('/notes', function () {
    return view('notes');
})->middleware(['auth', 'verified'])->name('notes');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
