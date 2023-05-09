<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('home', 'menus/mainMenu');

//Rutas de alumnos y dependencias
Route::resource('alumnos', App\Http\Controllers\AlumnoController::class);
Route::get('alumnos/{alumno}/toDos', [App\Http\Controllers\AlumnoController::class, 'toDos']) ->name ('alumnos.toDos');
Route::post('alumnos/{alumno}/toDos', [App\Http\Controllers\AlumnoController::class, 'addPending']) ->name('alumnos.addPending');

//Rutas de exámenes
Route::resource('exams', App\Http\Controllers\ExamController::class);

//Rutas de materias
Route::resource('materias', App\Http\Controllers\MateriaController::class);

//Rutas de cursos
Route::resource('cursos', App\Http\Controllers\CursoController::class);

