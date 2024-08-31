<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::get('/confirm', [AuthController::class, 'showConfirm'])->name('confirm');

// Доступ для всех авторизованных пользователей
Route::middleware('auth')->group(function () {
    Route::get('/', [MainController::class, 'pageMain'])->name('page.main');
    Route::get('/get', [MainController::class, 'pageGet'])->name('page.get');
    Route::get('/app/code.txt', [MainController::class, 'getCode']);
    Route::get('/study', [MainController::class, 'pageStudy'])->name('page.study');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Маршруты для студентов
    Route::prefix('student')->middleware(['student'])->group(function () {
        Route::get('/', [StudentController::class, 'showMain'])->name('student.main');
        Route::get('/courses', [StudentController::class, 'showCourses'])->name('student.courses');
        Route::get('/setting', [StudentController::class, 'showSetting'])->name('student.setting');
        Route::get('/courses/course/{id}', [StudentController::class, 'showOneCourse'])->name('student.one.course');
        Route::get('/courses/course/module/{id}', [StudentController::class, 'showOneModule'])->name('student.one.module');

        Route::post('/courses/course/{id}/request', [RequestController::class, 'record'])->name('student.request.record');

        Route::post('/content/store', [ContentController::class, 'store'])->name('student.content.store');
        Route::post('/upload_image', [ContentController::class, 'uploadImage'])->name('student.froala.upload');
        Route::get('/content/list', [ContentController::class, 'list'])->name('student.student.list');
    });

    // Маршруты для преподавателей
    Route::middleware(['teacher'])->group(function () {
        Route::get('/teacher', [TeacherController::class, 'showMain'])->name('teacher.main');
        Route::get('/teacher/requests', [TeacherController::class, 'showRequest'])->name('teacher.request');
        Route::get('/teacher/groups', [TeacherController::class, 'showGroups'])->name('teacher.groups');
        Route::get('/teacher/groups/group', [TeacherController::class, 'showOneGroup'])->name('teacher.one.group');
        Route::get('/teacher/setting', [TeacherController::class, 'showSetting'])->name('teacher.setting');
    });

    // Маршруты для администраторов
    Route::prefix('admin')->middleware(['admin'])->group(function () {
        Route::get('/', [AdminController::class, 'showMain'])->name('admin.main');
        Route::get('/generate', [AdminController::class, 'showGenerate'])->name('admin.generate');
        Route::post('/generate', [AdminController::class, 'createUser'])->name('admin.generate.store');
        Route::get('/list', [AdminController::class, 'showList'])->name('admin.list');

        Route::get('/requests', [AdminController::class, 'showRequests'])->name('admin.requests');
        Route::put('/request/update/{id}', [AdminController::class, 'updateRequest'])->name('admin.request.update');

        Route::get('/courses', [AdminController::class, 'showCourses'])->name('admin.courses');

        Route::get('/courses/course/{id}', [AdminController::class, 'showOneCourse'])->name('admin.show.course');

        Route::post('/courses/module/destroy/{id}', [AdminController::class, 'destroyModule'])->name('admin.module.delete');

        Route::get('/courses/add/module/{id}', [AdminController::class, 'showAddModule'])->name('admin.add.module');
        Route::post('/courses/add/module/store', [AdminController::class, 'storeModule'])->name('admin.store.module');

        Route::get('/add/groups', [AdminController::class, 'showGroups'])->name('admin.groups');
        Route::get('/add/group', [AdminController::class, 'showAddGroup'])->name('admin.add.group');
        Route::post('/add/group', [AdminController::class, 'storeGroup'])->name('admin.store.group');
        Route::put('/group/update/{id}', [AdminController::class, 'updateGroup'])->name('admin.group.update');
        Route::post('/group/delete/{id}', [AdminController::class, 'deleteGroup'])->name('admin.group.delete');

        Route::get('/add/course', [AdminController::class, 'showAddCourse'])->name('admin.add.course');
        Route::post('/add/course', [AdminController::class, 'storeCourse'])->name('admin.store.course');


    });
});

// Маршруты для неавторизованных пользователей
Route::get('test-api', [\App\Http\Controllers\SeparateTaskController::class, 'test'])->name('api.test');
Route::post('api', [\App\Http\Controllers\SeparateTaskController::class, 'register'])->name('api.register');

Route::get('get', [\App\Http\Controllers\SeparateTaskController::class, 'get'])->name('get.test');
Route::post('get', [\App\Http\Controllers\SeparateTaskController::class, 'getStore'])->name('get.register');
