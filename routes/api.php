<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/check-luck/{hash}', [UserController::class, 'checkLuck'])->name('check-user-luck');
Route::get('/luck-history/{hash}', [UserController::class, 'getLuckHistory'])->name('get-user-luck-history');
