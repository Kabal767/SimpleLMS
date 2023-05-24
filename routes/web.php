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
    Route::put('alumnos/{alumno}/{materia}', [App\Http\Controllers\AlumnoController::class, 'updateMateria']) ->name('alumnos.updateMateria');
Route::get('alumnos/{alumno}/family', [App\Http\Controllers\AlumnoController::class, 'family']) ->name ('alumnos.family');
    Route::post('alumnos/{alumno}/family', [App\Http\Controllers\AlumnoController::class, 'addFamiliar']) ->name ('alumnos.addFamiliar');

//Rutas de exámenes
Route::resource('exams', App\Http\Controllers\ExamController::class);
Route::get('exams/{exam}/mesas', [App\Http\Controllers\ExamController::class, 'showMesas']) -> name('exams.showMesas');
    Route::post('exams/{exam}/mesas', [App\Http\Controllers\ExamController::class, 'addMesa']) -> name('exams.addMesa');    
    Route::delete('exams/{exam}/{mesa}', [App\Http\Controllers\ExamController::class, 'eraseMesa']) -> name('exams.eraseMesa');
    Route::post('exams/{exam}/alumnos', [App\Http\Controllers\ExamController::class, 'addAlumno']) -> name('exams.addAlumno');
    Route::put('exams/{exam}/{alumno}', [App\Http\Controllers\ExamController::class, 'updateAlumno']) -> name('exams.updateAlumno');
    Route::delete('exams/{exam}/{alumno}', [App\Http\Controllers\ExamController::class, 'eraseAlumno']) -> name('exams.eraseAlumno');


//Rutas de materias
Route::resource('materias', App\Http\Controllers\MateriaController::class);

//Rutas de cursos
Route::resource('cursos', App\Http\Controllers\CursoController::class);

//Rutas de familiares
Route::resource('familiars', App\Http\Controllers\FamiliarController::class);
    Route::post('familiars/{familiar}', [App\Http\Controllers\FamiliarController::class, 'attachAlumno']) -> name ('familiars.attachAlumno');
    Route::put('familiars/{familiar}/{alumno}', [App\Http\Controllers\FamiliarController::class, 'updateAlumno']) -> name ('familiars.updateAlumno');
    Route::delete('familiars/{familiar}/{alumno}', [App\Http\Controllers\FamiliarController::class, 'detachAlumno']) -> name('familiars.detachAlumno');

