<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Resources\UserResource;
use App\Http\Resources\TaskResource;
use App\Http\Resources\ProjectResource;
use App\Models\Task;
use App\Models\User;
use App\Models\Project;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/projects/store', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');


Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks/store', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');

Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');


Route::get('/users/{id}', function (string $id) {
    return new UserResource(User::findOrFail($id));
});

Route::get('/projects/{id}', function (string $id) {
    return new ProjectResource(Project::findOrFail($id));
});

Route::get('/tasks/{id}', function (string $id) {
    return new TaskResource(Task::findOrFail($id));
});



Route::get('/users/{user}/soft-delete', [UserController::class, 'softDelete'])->name('users.soft-delete');
Route::get('/projects/{project}/soft-delete', [ProjectController::class, 'softDelete'])->name('projects.soft-delete');
Route::get('/tasks/{task}/soft-delete', [TaskController::class, 'softDelete'])->name('tasks.soft-delete');


Route::get('/dbcheck', function () {
    return view('dbconn');
});
