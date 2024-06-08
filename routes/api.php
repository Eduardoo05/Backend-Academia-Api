<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/estudiantes/all', [EstudianteController::class, 'index']);
Route::post('/estudiantes/register', [EstudianteController::class, 'register']);