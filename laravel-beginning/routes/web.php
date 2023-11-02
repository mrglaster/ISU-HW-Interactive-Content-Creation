<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ShowDataController;

Route::get('/', function () {
    return redirect('/hw/add-data');
});
Route::get('/hw/add-data', [FormController::class, 'index']);
Route::post('/hw/store-form', [FormController::class, 'store']);
Route::get('/hw/show-data', [ShowDataController::class, 'index']);
