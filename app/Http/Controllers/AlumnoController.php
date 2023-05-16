<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Materia;
use App\Models\Familiar;
use Illuminate\Http\Request;
Use Carbon\Carbon;

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
        $alumnos = Alumno::paginate();

        return view('alumno.index', compact('alumnos'))
            ->with('i', (request()->input('page', 1) - 1) * $alumnos->perPage());
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
    public function store(Request $request)
    {
        request()->validate(Alumno::$rules);

        $alumno = Alumno::create($request->all());
        $curso = Curso::findOrFail($request->id_Curso);

        //Get present year
        $year = Carbon::Now();
        $date = date('y', strtotime($year));

        //Attach curso to student
        $alumno->cursos()->attach($curso, ['condition' => 'cursando']);

        //Attach curso materias to student
        foreach($curso->materias as $materia){
            $alumno->materias()->attach($materia->id, ['year' => $date, 'condition' => 'Cursando', 'origin' => $request->id_Curso]);
        }

        //return redirect()->route('alumnos.index')
        return redirect()->route('alumnos.toDos', ['alumno'=>$alumno->id])
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
    public function update(Request $request, Alumno $alumno)
    {
        request()->validate(Alumno::$rules);

        $alumno->update($request->all());

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
        $alumno->materias()->attach($request->materia_id, ['year' => $request->date, 'condition' => 'Pendiente', 'origin' => 'pending']);

        //return redirect()->route('alumnos.index')
        return redirect()->route('alumnos.toDos', ['alumno'=>$alumno->id])
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
        $alumno->familiares()->attach($request->familiar_id, ['relation' => $request->relation]);

        return redirect()->route('alumnos.family', ['alumno'=>$alumno->id])
        ->with('succes', 'Relación con familiar creada exitósamente');
    }
}
