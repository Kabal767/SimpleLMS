<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Curso;
use App\Models\Materia;
use App\Models\Alumno;
use App\Models\Mesa;
use App\Models\JointAlumnoMateria;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/**
 * Class ExamController
 * @package App\Http\Controllers
 */
class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exam = new Exam();
        $mesa = new Mesa();
        $exams = Exam::paginate();
        
        $materias = Materia::All();
        $cursos = Curso::All();

        return view('exam.index', compact('exam', 'exams', 'materias', 'cursos'))
            ->with('i', (request()->input('page', 1) - 1) * $exams->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materias = Materia::All();
        $cursos = Curso::All();

        $exam = new Exam();
        return view('exam.create', compact('exam', 'materias', 'cursos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exam = Exam::create(['condition' => $request->condition, 'materia_id' => $request->id_materia, 'curso_id' => $request->id_curso]);

        $mesa = $exam->mesas()->create(['Date' => $request->Date, 'Proffesor' => $request->Proffesor]);

        if($exam->condition == 'Final'){
            $alumnos = Alumno::where('id_curso', $exam->curso_id)->get();

            foreach($alumnos as $alumno){
                $exam->alumnos()->attach($alumno->id, ['mesa_id' => $mesa->id, 'boolOral' => true, 'boolWritten' => true]);
            }
        }

        return redirect()->route('exams.showMesas', ['exam' => $exam->id])
            ->with('success', 'Exam created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exam = Exam::find($id);

        return view('exam.show', compact('exam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exam = Exam::find($id);

        return view('exam.edit', compact('exam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Exam $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exam)
    {
        request()->validate(Exam::$rules);

        $exam->update($request->all());

        return redirect()->route('exams.index')
            ->with('success', 'Exam updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $exam = Exam::find($id)->delete();

        return redirect()->route('exams.index')
            ->with('success', 'Exam deleted successfully');
    }

    public function showMesas(Exam $exam)
    {
        if($exam->condition == 'Regular' || $exam->condition == 'Adeudada'){
            $relations = DB::table('alumno_materia')->where('materia_id', $exam->materia_id);

            $alumnos = Alumno::whereExists($relations)->get();
        }

        if($exam->condition == 'Final' || $exam->condition == 'Diciembre'){
            $relations = DB::table('alumno_materia')->where('materia_id', $exam->materia_id);

            $alumnos = Alumno::where('id_curso', $exam->curso_id)->whereExists($relations)->get();
        }

        return view('exam.showMesas', compact('exam', 'alumnos'));
    }

    public function addMesa(Request $request, Exam $exam)
    {
        $exam->mesas()->create($request->all());

        return redirect()->route('exams.showMesas', ['exam'=>$exam->id]);
    }

    public function eraseMesa(Exam $exam, $mesa)
    {
        $exam->mesas()->find($mesa)->delete();

        return redirect()->route('exams.showMesas', ['exam'=>$exam->id]);
    }

    public function addAlumno(Request $request, Exam $exam)
    {
        $exam->alumnos()->attach($request->alumno_id, ['mesa_id' => $request->mesa_id, 'boolOral' => true, 'boolWritten' => true]);        

        return redirect()->route('exams.showMesas', ['exam'=>$exam->id]);
    }

    public function eraseAlumno(Exam $exam, $alumno)
    {
        $exam->alumnos()->detach($alumno);
        
        return redirect()->route('exams.showMesas', ['exam'=>$exam->id]);
    }

    public function updateAlumno(Request $request, Exam $exam, $alumno)
    {
        $exam->alumnos()->updateExistingPivot($alumno, ['mesa_id' => $request->mesa_id, 'oral' => $request->oral, 
        'written' => $request->written, 'callification' => $request->callification]);

        return redirect()->route('exams.showMesas', ['exam'=>$exam->id]);
    }
}
