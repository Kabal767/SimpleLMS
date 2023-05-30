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
    return view('auth.login');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('home', 'menus/mainMenu') ->middleware('auth');

//Rutas de alumnos y dependencias
Route::resource('alumnos', App\Http\Controllers\AlumnoController::class) ->middleware('auth');
Route::get('alumnos/{alumno}/toDos', [App\Http\Controllers\AlumnoController::class, 'toDos']) ->name ('alumnos.toDos') ->middleware('auth');
    Route::post('alumnos/{alumno}/toDos', [App\Http\Controllers\AlumnoController::class, 'addPending']) ->name('alumnos.addPending') ->middleware('auth');
    Route::put('alumnos/{alumno}/{materia}', [App\Http\Controllers\AlumnoController::class, 'updateMateria']) ->name('alumnos.updateMateria') ->middleware('auth');
Route::get('alumnos/{alumno}/family', [App\Http\Controllers\AlumnoController::class, 'family']) ->name ('alumnos.family') ->middleware('auth');
    Route::post('alumnos/{alumno}/family', [App\Http\Controllers\AlumnoController::class, 'addFamiliar']) ->name ('alumnos.addFamiliar') ->middleware('auth');

//Rutas de exámenes
Route::resource('exams', App\Http\Controllers\ExamController::class);
Route::get('exams/{exam}/mesas', [App\Http\Controllers\ExamController::class, 'showMesas']) -> name('exams.showMesas') ->middleware('auth');
    Route::post('exams/{exam}/mesas', [App\Http\Controllers\ExamController::class, 'addMesa']) -> name('exams.addMesa') ->middleware('auth');    
    Route::delete('exams/{exam}/mesas/{mesa}', [App\Http\Controllers\ExamController::class, 'eraseMesa']) -> name('exams.eraseMesa') ->middleware('auth');
    Route::post('exams/{exam}/alumnos', [App\Http\Controllers\ExamController::class, 'addAlumno']) -> name('exams.addAlumno') ->middleware('auth');
    Route::put('exams/{exam}/{alumno}', [App\Http\Controllers\ExamController::class, 'updateAlumno']) -> name('exams.updateAlumno') ->middleware('auth');
    Route::delete('exams/{exam}/alumnos/{alumno}', [App\Http\Controllers\ExamController::class, 'eraseAlumno']) -> name('exams.eraseAlumno') ->middleware('auth');


//Rutas de materias
Route::resource('materias', App\Http\Controllers\MateriaController::class) ->middleware('auth');

//Rutas de cursos
Route::resource('cursos', App\Http\Controllers\CursoController::class) ->middleware('auth');

//Rutas de familiares
Route::resource('familiars', App\Http\Controllers\FamiliarController::class);
    Route::post('familiars/{familiar}', [App\Http\Controllers\FamiliarController::class, 'attachAlumno']) -> name ('familiars.attachAlumno') ->middleware('auth');
    Route::put('familiars/{familiar}/{alumno}', [App\Http\Controllers\FamiliarController::class, 'updateAlumno']) -> name ('familiars.updateAlumno') ->middleware('auth');
    Route::delete('familiars/{familiar}/{alumno}', [App\Http\Controllers\FamiliarController::class, 'detachAlumno']) -> name('familiars.detachAlumno') ->middleware('auth');

