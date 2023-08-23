<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ApiProjectController;

// Rotta con tutti i progetti
Route::get('projects', [ApiProjectController::class, 'apiIndex']);

// Rotta per dettaglio progetti
Route::get('project-show/{id}', [ApiProjectController::class, 'apiShow']);

// Rotta per tutte le tipologie
Route::get('types', [ApiProjectController::class, 'getTypes']);

// Rotte per tutte le tecnologie
Route::get('technologies', [ApiProjectController::class, 'getTechnologies']);

// Rotta per store
Route::post('store', [ApiProjectController::class, 'storeProject']);
