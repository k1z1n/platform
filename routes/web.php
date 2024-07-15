<?php
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

// Маршрут для получения содержимого файла code.txt
//Route::get('/', [MainController::class, 'pageMain'])->name('page.main');
Route::get('/get', [MainController::class, 'pageGet'])->name('page.get');
Route::get('/training-system', [MainController::class, 'pageTrainingSystem'])->name('page.training.system');
Route::get('/app/code.txt', [MainController::class, 'getCode']);

// Маршрут для выполнения PHP кода и возврата результата
Route::post('/app/execute-php', [MainController::class, 'executePhp']);

// Маршрут для тестовой страницы
//Route::get('/', [MainController::class, 'testPage']);
