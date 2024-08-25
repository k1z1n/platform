<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

// Маршрут для получения содержимого файла code.txt
Route::get('/', [MainController::class, 'pageMain'])->name('page.main');
Route::get('/get', [MainController::class, 'pageGet'])->name('page.get');
Route::get('/student', [StudentController::class, 'showMain'])->name('student.main');
Route::get('/app/code.txt', [MainController::class, 'getCode']);
Route::get('/study', [MainController::class, 'pageStudy'])->name('page.study');

// Маршрут для выполнения PHP кода и возврата результата
Route::post('/app/execute-php', [MainController::class, 'executePhp']);

// Маршрут для тестовой страницы
//Route::get('/', [MainController::class, 'testPage']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::get('/confirm', [AuthController::class, 'showConfirm'])->name('confirm');


Route::get('/student/courses', [StudentController::class, 'showCourses'])->name('student.courses');
Route::get('/student/setting', [StudentController::class, 'showSetting'])->name('student.setting');
Route::get('/student/courses/course', [StudentController::class, 'showOneCourse'])->name('student.one.course');
Route::get('/student/courses/course/module', [StudentController::class, 'showOneModule'])->name('student.one.module');

Route::get('/teacher', [TeacherController::class, 'showMain'])->name('teacher.main');
Route::get('/teacher/requests', [TeacherController::class, 'showRequest'])->name('teacher.request');
Route::get('/teacher/groups', [TeacherController::class, 'showGroups'])->name('teacher.groups');
Route::get('/teacher/groups/group', [TeacherController::class, 'showOneGroup'])->name('teacher.one.group');
Route::get('/teacher/setting', [TeacherController::class, 'showSetting'])->name('teacher.setting');


Route::get('/upload', function () {
    return view('upload');
});
Route::middleware('web')->group(function () {
    Route::post('/upload-files', [FileUploadController::class, 'upload']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/', [AdminController::class, 'showMain'])->name('admin.main');
    Route::get('/generate', [AdminController::class, 'showGenerate'])->name('admin.generate');
    Route::post('/generate', [AdminController::class, 'createUser'])->name('admin.generate.store');
    Route::get('/list', [AdminController::class, 'showList'])->name('admin.list');
});

Route::get('test-api', [\App\Http\Controllers\SeparateTaskController::class, 'test'])->name('api.test');
Route::post('api', [\App\Http\Controllers\SeparateTaskController::class, 'register'])->name('api.register');
