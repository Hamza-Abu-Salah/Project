<?php

use App\Http\Controllers\AdminControllers\EmployersController;
use App\Http\Controllers\AdminControllers\IndexController;
use App\Http\Controllers\AdminControllers\ProjectsController;
use App\Http\Controllers\AdminControllers\TasksController;
use App\Http\Controllers\AdminControllers\UsersController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('', 'login');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'login_post']);
Route::get('admin/login', [AuthController::class, 'admin_login']);
Route::post('admin/login', [AuthController::class, 'admin_login_post']);
Route::get('leader/login', [AuthController::class, 'leader_login']);
Route::post('leader/login', [AuthController::class, 'leader_login_post']);

Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'auth:admin']], function () {
    Route::get('', [IndexController::class, 'index']);
    Route::get('logout', [IndexController::class, 'logout']);
    Route::group(['prefix' => 'employer'], function () {
        Route::get('', [EmployersController::class, 'index']);
        Route::get('create', [EmployersController::class, 'create']);
        Route::post('store', [EmployersController::class, 'store']);
        Route::get('edit/{id}', [EmployersController::class, 'edit']);
        Route::post('update/{id}', [EmployersController::class, 'update']);
        Route::get('delete/{id}', [EmployersController::class, 'delete']);
    });
    Route::group(['prefix' => 'users'], function () {
        Route::get('', [UsersController::class, 'index']);
        Route::get('create', [UsersController::class, 'create']);
        Route::post('store', [UsersController::class, 'store']);
        Route::get('edit/{id}', [UsersController::class, 'edit']);
        Route::post('update/{id}', [UsersController::class, 'update']);
        Route::get('delete/{id}', [UsersController::class, 'delete']);
    });
    Route::group(['prefix' => 'projects'], function () {
        Route::get('', [ProjectsController::class, 'index']);
        Route::get('create', [ProjectsController::class, 'create']);
        Route::post('store', [ProjectsController::class, 'store']);
        Route::get('edit/{id}', [ProjectsController::class, 'edit']);
        Route::post('update/{id}', [ProjectsController::class, 'update']);
        Route::get('delete/{id}', [ProjectsController::class, 'delete']);
    });
    Route::group(['prefix' => 'tasks'], function () {
        Route::get('', [TasksController::class, 'index']);
        Route::get('users', [TasksController::class, 'users_tasks']);
        Route::get('create', [TasksController::class, 'create']);
        Route::post('store', [TasksController::class, 'store']);
        Route::get('edit/{id}', [TasksController::class, 'edit']);
        Route::post('update/{id}', [TasksController::class, 'update']);
        Route::get('delete/{id}', [TasksController::class, 'delete']);
    });
});

Route::group(['prefix' => 'leader', 'middleware' => ['leader', 'auth:leader']], function () {
    Route::get('', [\App\Http\Controllers\TeamLeaderControllers\IndexController::class, 'index']);
    Route::get('logout', [\App\Http\Controllers\TeamLeaderControllers\IndexController::class, 'logout']);
    Route::group(['prefix' => 'users'], function () {
        Route::get('', [\App\Http\Controllers\TeamLeaderControllers\UsersController::class, 'index']);
        Route::get('create', [\App\Http\Controllers\TeamLeaderControllers\UsersController::class, 'create']);
        Route::post('store', [\App\Http\Controllers\TeamLeaderControllers\UsersController::class, 'store']);
        Route::get('edit/{id}', [\App\Http\Controllers\TeamLeaderControllers\UsersController::class, 'edit']);
        Route::post('update/{id}', [\App\Http\Controllers\TeamLeaderControllers\UsersController::class, 'update']);
        Route::get('delete/{id}', [\App\Http\Controllers\TeamLeaderControllers\UsersController::class, 'delete']);
    });
    Route::group(['prefix' => 'projects'], function () {
        Route::get('', [\App\Http\Controllers\TeamLeaderControllers\ProjectsController::class, 'index']);
        Route::get('create', [\App\Http\Controllers\TeamLeaderControllers\ProjectsController::class, 'create']);
        Route::post('store', [\App\Http\Controllers\TeamLeaderControllers\ProjectsController::class, 'store']);
        Route::get('edit/{id}', [\App\Http\Controllers\TeamLeaderControllers\ProjectsController::class, 'edit']);
        Route::post('update/{id}', [\App\Http\Controllers\TeamLeaderControllers\ProjectsController::class, 'update']);
        Route::get('delete/{id}', [\App\Http\Controllers\TeamLeaderControllers\ProjectsController::class, 'delete']);
    });
    Route::group(['prefix' => 'tasks'], function () {
        Route::get('', [\App\Http\Controllers\TeamLeaderControllers\TasksController::class, 'index']);
        Route::get('users', [\App\Http\Controllers\TeamLeaderControllers\TasksController::class, 'users_tasks']);
        Route::get('create', [\App\Http\Controllers\TeamLeaderControllers\TasksController::class, 'create']);
        Route::post('store', [\App\Http\Controllers\TeamLeaderControllers\TasksController::class, 'store']);
        Route::get('edit/{id}', [\App\Http\Controllers\TeamLeaderControllers\TasksController::class, 'edit']);
        Route::post('update/{id}', [\App\Http\Controllers\TeamLeaderControllers\TasksController::class, 'update']);
        Route::get('delete/{id}', [\App\Http\Controllers\TeamLeaderControllers\TasksController::class, 'delete']);
    });
});

Route::group(['prefix' => 'user', 'middleware' => ['user', 'auth']], function () {
    Route::get('', [\App\Http\Controllers\UserControllers\IndexController::class, 'index']);
    Route::get('logout', [\App\Http\Controllers\UserControllers\IndexController::class, 'logout']);
    Route::group(['prefix' => 'projects'], function () {
        Route::get('', [\App\Http\Controllers\UserControllers\ProjectsController::class, 'index']);
    });
    Route::group(['prefix' => 'tasks'], function () {
        Route::get('to-do', [\App\Http\Controllers\UserControllers\TasksController::class, 'to_do']);
        Route::get('doing', [\App\Http\Controllers\UserControllers\TasksController::class, 'doing']);
        Route::get('done', [\App\Http\Controllers\UserControllers\TasksController::class, 'done']);
        Route::get('cancelled', [\App\Http\Controllers\UserControllers\TasksController::class, 'cancelled']);
        Route::get('start/{id}', [\App\Http\Controllers\UserControllers\TasksController::class, 'start']);
        Route::get('complete/{id}/{user_task_id}', [\App\Http\Controllers\UserControllers\TasksController::class, 'complete']);
        Route::get('cancel/{id}/{user_task_id}', [\App\Http\Controllers\UserControllers\TasksController::class, 'cancel']);
    });
});
