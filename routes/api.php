<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\QuestionsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Route::get('/estudiantes/all', [EstudianteController::class, 'index']);
Route::post('/estudiantes/register', [EstudianteController::class, 'register']);
Route::post('/questions/get',[QuestionsController::class, 'get']);