<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\public\MainController;
use App\Http\Controllers\LoggedController;

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
Route::get('/', [MainController::class, 'index'])->name('index');

// Rotta per la pagina create
Route::get('profile/create', [LoggedController::class, 'create'])->name('create');

// Rotta per il salvataggio del nuovo progetto
Route::post('profile/store', [LoggedController::class, 'store'])->name('store');

// Rotta per vedere dati
Route::get('/profile/show/{id}', [LoggedController::class, 'show'])
    // ->middleware(['auth'])
    ->name('show');


// Rotta per editare progetto
Route::get('profile/edit{id}', [LoggedController::class, 'edit'])->name('edit');

// Rotta senza pagina per update
Route::put('profile/update/{id}', [LoggedController::class, 'update'])->name('update');

// Rotta per eliminare elemento
Route::delete('destroy/{id}', [LoggedController::class, 'destroy'])->name('destroy');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
