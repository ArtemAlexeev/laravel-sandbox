<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\SignUpController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('sign-up');
})->name('home');

Route::post('/sign-up', SignUpController::class)->name('sign-up');

Route::get('/dashboard/{hash}', DashboardController::class)
    ->missing(function () {
        return redirect()->route('home');
    })->name('dashboard');

Route::post('/generate-new-link/{hash}', [LinkController::class, 'generateNewLink'])
    ->missing(function () {
        return redirect()->route('home');
    })->name('generate-new-link');

Route::post('/deactivate-link/{hash}', [LinkController::class, 'deactivateLink'])
    ->missing(function () {
        return redirect()->route('home');
    })->name('deactivate-link');
