<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

//Route::get('/', [MainController::class, 'pageMain'])->name('page.main');
Route::get('/test', [MainController::class, 'pageTest'])->name('page.test');
Route::get('/cycle', [MainController::class, 'pageCycle'])->name('page.cycle');
