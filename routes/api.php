<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ApiProjectController;

// Rotta con tutti i progetti
Route::get('projects', [ApiProjectController::class, 'apiIndex']);

// Rotta per dettaglio progetti
Route::get('project-show/{id}', [ApiProjectController::class, 'apiShow']);
