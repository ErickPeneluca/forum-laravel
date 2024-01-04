<?php

use App\Http\Controllers\Admin\{SupportController};
use Illuminate\Support\Facades\Route;

Route::get('/supports', [SupportController::class, 'index'])->name('supports.index');
Route::get('/supports/create', [SupportController::class, 'create'])->name('supports.create');

Route::post('/supports', [SupportController::class, 'store'])->name('supports.store');
