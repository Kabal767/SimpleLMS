<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Materia;
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
        $alumno = Alumno::find($id);

        return view('alumno.show', compact('alumno'));
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
        $year = Carbon::Now();
        $date = date('y-m-d', strtotime($year));

        return view('alumno.toDos', compact('alumno', 'materias', 'year', 'date'));
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
        $alumno->materias()->attach($request->materia_id, ['year' => $request->date, 'condition' => 'pending']);

        //return redirect()->route('alumnos.index')
        return redirect()->route('alumnos.toDos', ['alumno'=>$alumno->id])
            ->with('success', 'Materia pendiente añadida correctamente');
    }
}
