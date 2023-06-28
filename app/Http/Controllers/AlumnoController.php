<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Materia;
use App\Models\Familiar;
use App\Models\Evento;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
Use Carbon\Carbon;
use App\Http\Requests\AlumnoFormRequest;

/**
 * Class AlumnoController
 * @package App\Http\Controllers
 */
class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::all();
        $cursos = Curso::all();

        return view('alumno.index', compact('alumnos', 'cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materias = Materia::all();
        $cursos = Curso::all();

        $alumno = new Alumno();
        return view('alumno.create', compact('alumno'), compact('materias','cursos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlumnoFormRequest $request)
    {
        $request = $request->validated();

        $alumno = Alumno::create($request);
        $curso = Curso::findOrFail($request['id_curso']);

        //Get present year
        $year = Carbon::Now()->format('Y');

        //Attach curso to student
        $alumno->cursos()->attach($curso, ['condition' => 'cursando', 'year' => $year]);

        //Attach curso materias to student
        foreach($curso->materias as $materia){
            $alumno->materias()->attach($materia->id, ['year' => $year, 'condition' => 'Cursando', 'origin' => $request['id_curso']]);
        }

        return redirect()->route('alumnos.toDos', ['alumno'=>$alumno->DNI])
            ->with('success', 'Alumno created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumno = Alumno::findOrFail($id);
        $curso = Curso::findOrFail($alumno->id_curso);
        $materias = $alumno->materias()->where('origin', $alumno->id_curso)->get();

        $this->CalculateAverage($curso,$alumno);

        return view('alumno.show', compact('alumno', 'curso', 'materias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumno = Alumno::find($id);

        return view('alumno.edit', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Alumno $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(AlumnoFormRequest $request, Alumno $alumno)
    {
        $request = $request->validated();

        $alumno->update($request);

        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $alumno = Alumno::find($id)->delete();

        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno deleted successfully');
    }

    public function toDos($alumno)
    {
        $alumno = Alumno::findOrFail($alumno);
        $materias = Materia::All();
        $curso = Curso::findorFail($alumno->id_curso);

        $year = Carbon::Now();
        $date = date('y', strtotime($year));

        //Exam querys
        //$finalQuery = DB::('alumno_exam')->where('')

        return view('alumno.toDos', compact('alumno', 'materias', 'year', 'date', 'curso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Alumno $alumno
     * @return \Illuminate\Http\Response
     */
    public function addPending(Request $request, Alumno $alumno)
    {
        $alumno->materias()->syncWithoutDetaching([$request->materia_id => ['year' => $request->date, 'condition' => 'Pendiente', 'origin' => 'pending']]);
        
        return redirect()->route('alumnos.toDos', ['alumno'=>$alumno->DNI])
            ->with('success', 'Materia pendiente añadida correctamente');
    }

    public function family(Alumno $alumno){
        $curso = Curso::findOrFail($alumno->id_curso);
        $familiars = Familiar::All();

        return view('alumno.family', compact('alumno', 'curso', 'familiars'));
    }

    /**
     * Crear relación con un familiar
     * 
     * @param \Illuminate\Http\Request $request
     * @param Alumno $alumno
     * @return \Illuminate\Http\Response
     */
    public function addFamiliar(Request $request, Alumno $alumno)
    {
        $alumno->familiares()->attach($request->familiar_DNI, ['relation' => $request->relation]);

        return redirect()->route('alumnos.family', ['alumno'=>$alumno->DNI])
        ->with('succes', 'Relación con familiar creada exitósamente');
    }

    public function updateMateria(Request $request, Alumno $alumno, $materia){
        $average = ($request->q1 + $request->q2 + $request->q3) / 3;

        $alumno->materias()->updateExistingPivot($materia, ['quarter1' => $request->q1, 'quarter2' => $request->q2, 'quarter3' => $request->q3, 
        'average' => $average, 'callification' => $request->callification]);

        $curso = Curso::findOrFail($alumno->materias->find($materia)->pivot->origin);

        $this->CalculateAverage($curso, $alumno);

        return redirect()->route('alumnos.toDos', ['alumno'=>$alumno->DNI]);
    }

    public function addEvento(Request $request, Alumno $alumno){

        $newEvento = $request->all();
        $newInasistencias = 0;
        $curso = $alumno->cursos()->where('curso_id',$alumno->id_curso)->first();

        if($request->type == 'Inasistencia'){
            $newInasistencias = $curso->pivot->inasistencias + 1;

            $alumno->cursos()->updateExistingPivot($alumno->id_curso,['inasistencias' => $newInasistencias]);
        }

        if($request->hasFile('file')){
            $newEvento['file']=$request->file('file')->store('uploads','public');
        }
        $alumno->eventos()->create($newEvento);

        
        return redirect()->route('alumnos.show', ['alumno' => $alumno->DNI])
            ->with('success', 'Evento registrado exitósamente');
    }

    public function updateEvento(Request $request, $alumno,$evento){
        Evento::findOrFail($evento)->update($request->all());
        
        return redirect()->route('alumnos.show', ['alumno' => $alumno]);
    }

    public function eraseEvento(Alumno $alumno, $evento){
        $toDelete = Evento::findOrFail($evento);
        $newInasistencias = 0;
        $curso = $alumno->cursos()->where('curso_id',$alumno->id_curso)->first();

        if($toDelete->type == 'Inasistencia'){
            $newInasistencias = $curso->pivot->inasistencias -1;
            $alumno->cursos()->updateExistingPivot($alumno->id_curso,['inasistencias' => $newInasistencias]);
        }

        $toDelete->delete();

        return redirect()->route('alumnos.show', ['alumno' => $alumno->DNI]);
    }

    public function CalculateAverage(Curso $curso, Alumno $alumno){

        //$relations = DB::table('alumno_materia')->where('origin',$curso->id);

        $materias = $alumno->materias()->where('origin',$curso->id)->pluck('average');

        $average = 0;

        foreach($materias as $materia){
            $average = $average + $materia;
        }

        $average = intdiv($average,$materias->count());

        $alumno->cursos()->updateExistingPivot($curso->id,['average' => $average]);
    }

    public function promotion(Alumno $alumno){

        $cursos = Curso::where('curso',$alumno->curso->curso+1)->get();
        
        return view('alumno.promote', compact('alumno', 'cursos'));
    }

    public function promoteAlumno(Request $request, Alumno $alumno){

        $alumno->update(['id_curso' => $request->curso]);

        $this->closeMaterias($alumno, $request->neededNote);

        $this->openMaterias($alumno, $request->curso);

        return redirect()->route('alumnos.toDos', ['alumno'=>$alumno->DNI])
            ->with('success', 'Alumno promocionado exitósamente.');
    }

    public function repeatAlumno(Alumno $alumno){

        $materias = $alumno->materias()->where('condition','Cursando')->get();

        $year = Carbon::Now()->format('Y');

        foreach($materias as $materia){
            $alumno->materias()->updateExistingPivot($materia->id,['quarter1' => 0, 'quarter2' => 0, 'quarter3' => 0, 'average' => 0, 'callification' => 0]);
        }
        
        $alumno->cursos()->updateExistingPivot($alumno->id_curso,['inasistencias' => 0, 'average' => 0, 'year' => $year]);

        return redirect()->route('alumnos.toDos', ['alumno' => $alumno->DNI]);
    }

    public function egressAlumno(Request $request, Alumno $alumno){

        $this->closeMaterias($alumno, $request->neededNote);

    }

    public function closeMaterias(Alumno $alumno, $neededNote){

        $materias = $alumno->materias()->where('condition', 'Cursando')->get();

        foreach($materias as $materia){
            if($materia->pivot->average >= $neededNote){
                $alumno->materias()->updateExistingPivot($materia->id, ['condition' => 'Aprobada', 'callification' => $materia->pivot->average]);
            }
            else{
                $alumno->materias()->updateExistingPivot($materia->id, ['condition' => 'Pendiente']);
            }
        }

    }

    public function openMaterias(Alumno $alumno, $curso){
        
        $curso = Curso::findOrFail($curso);

        $year = Carbon::Now()->format('Y');
        
        $alumno->cursos()->attach($curso, ['condition' => 'cursando', 'year' => $year]);

        foreach($curso->materias as $materia){
            $alumno->materias()->attach($materia->id, ['year' => $year, 'condition' => 'Cursando', 'origin' => $curso->id]);
        }

    }
} 
