<?php

use App\Http\Controllers\DeputyController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    Route::get('/', [DeputyController::class, 'index'])->name('deputies.index');
    Route::get('/{id}', [DeputyController::class, 'show'])->name('deputies.show');
    Route::get('/deputy/search', [DeputyController::class, 'search'])->name('deputies.search');
});
