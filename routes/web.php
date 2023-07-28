<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\TechnologyController;

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


/*--------------------------------- Rotte controller Project--------------------------------------*/

Route::middleware(['auth'])->group(function () {

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
    Route::delete('project/destroy/{id}', [ProjectController::class, 'destroy'])->name('project-destroy');

    Route::delete('project/destroy/{id}/picture', [ProjectController::class, 'destroyPicture'])->name('project-destroy-picture');

    Route::get('mail-template/project{id}', [ProjectController::class, 'sendMail'])->name('send-mail');
});


/*--------------------------------- Rotte controller Type--------------------------------------*/
Route::middleware(['auth'])->group(function () {

    Route::get('type/showall', [TypeController::class, 'showall'])->name('type-showall');

    Route::get('type/create', [TypeController::class, 'create'])->name('type-create');

    Route::post('type/store', [TypeController::class, 'store'])->name('type-store');

    Route::get('type/show{id}', [TypeController::class, 'show'])->name('type-show');

    Route::get('type/edit{id}', [TypeController::class, 'edit'])->name('type-edit');

    Route::put('type/update/{id}', [TypeController::class, 'update'])->name('type-update');

    Route::delete('type/destroy/{id}', [TypeController::class, 'destroy'])->name('type-destroy');
});


/*--------------------------------- Rotte controller Technology--------------------------------------*/

Route::middleware(['auth'])->group(function () {

    Route::get('technology/showall', [TechnologyController::class, 'showall'])->name('technology-showall');

    Route::get('technology/create', [TechnologyController::class, 'create'])->name('technology-create');

    Route::post('technology/store', [TechnologyController::class, 'store'])->name('technology-store');

    Route::get('technology/show{id}', [TechnologyController::class, 'show'])->name('technology-show');

    Route::get('technology/edit{id}', [TechnologyController::class, 'edit'])->name('technology-edit');

    Route::put('technology/update/{id}', [TechnologyController::class, 'update'])->name('technology-update');

    Route::delete('technology/destroy/{id}', [TechnologyController::class, 'destroy'])->name('technology-destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
