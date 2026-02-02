<?php

use App\Http\Controllers\AnalyticController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Api\ProjectApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/analytics', [AnalyticController::class, 'store'])->name('analytics.store')->withoutMiddleware('VerifyCsrfToken');
Route::get('/analytics/stats', [AnalyticController::class, 'stats'])->name('analytics.stats');

// API Routes pour les projets
Route::prefix('projects')->group(function () {
    // GET tous les projets
    Route::get('/', [ProjectApiController::class, 'index'])->name('api.projects.index');

    // POST créer un nouveau projet
    Route::post('/', [ProjectApiController::class, 'store'])->name('api.projects.store');

    // GET un projet par ID ou slug
    Route::get('/{id}', [ProjectApiController::class, 'show'])->name('api.projects.show');

    // PUT/PATCH modifier un projet
    Route::put('/{id}', [ProjectApiController::class, 'update'])->name('api.projects.update');
    Route::patch('/{id}', [ProjectApiController::class, 'update']);

    // DELETE supprimer un projet
    Route::delete('/{id}', [ProjectApiController::class, 'destroy'])->name('api.projects.destroy');
});

// Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
