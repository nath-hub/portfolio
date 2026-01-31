<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AnalyticController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/projects', [HomeController::class, 'projects'])->name('projects');
Route::get('/skills', [HomeController::class, 'skills'])->name('skills');
Route::get('/education', [HomeController::class, 'education'])->name('education');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'sendContact'])->name('contact.send');

// Route protégée pour le dashboard admin (optionnel)
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/analytics', [AnalyticController::class, 'dashboard'])->name('analytics.dashboard');
});


// Route::middleware('api')->group(function () {
//     Route::post('/analytics', [AnalyticController::class, 'store'])->name('analytics.store')->withoutMiddleware('VerifyCsrfToken');
//     Route::get('/analytics/stats', [AnalyticController::class, 'stats'])->name('analytics.stats');
// });

// Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/a-propos', [AboutController::class, 'index'])->name('about');
// Route::get('/projets', [ProjectController::class, 'index'])->name('projects');
// Route::get('/projets/{slug}', [ProjectController::class, 'show'])->name('projects.show');
// Route::get('/parcours', [EducationController::class, 'index'])->name('education');
// Route::get('/contact', [ContactController::class, 'index'])->name('contact');
// Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');


Route::get('/debug-clear-all', function() {
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');

    // Tentative de suppression du fichier hot s'il est caché
    $hotPath = public_path('hot');
    if (file_exists($hotPath)) {
        unlink($hotPath);
        return "Fichier HOT supprimé et caches vidés !";
    }

    return "Caches vidés ! (Le fichier HOT n'a pas été trouvé)";
});
