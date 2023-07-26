<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProjectController;

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

// Rotta index accessibile a tutti
Route::get('/', [GuestController::class, 'index'])->name('index');

// Rotta per la pagina create
Route::get('project/create', [ProjectController::class, 'create'])->name('project-create');

// Rotta per il salvataggio del nuovo progetto
Route::post('project/store', [ProjectController::class, 'store'])->name('project-store');

// Rotta per vedere dati
Route::get('/project/show/{id}', [ProjectController::class, 'show'])
    // ->middleware(['auth'])
    ->name('project-show');


// Rotta per editare progetto
Route::get('project/edit{id}', [ProjectController::class, 'edit'])->name('project-edit');

// Rotta senza pagina per update
Route::put('project/update/{id}', [ProjectController::class, 'update'])->name('project-update');

// Rotta per eliminare elemento
Route::delete('destroy/{id}', [ProjectController::class, 'destroy'])->name('project-destroy');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
