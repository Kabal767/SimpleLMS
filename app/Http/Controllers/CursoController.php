<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Materia;
use App\Models\Alumno;
use Illuminate\Http\Request;
Use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Traits\changeTrait;  

/**
 * Class CursoController
 * @package App\Http\Controllers
 */
class CursoController extends Controller
{
    use changeTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::all();
        $materias = Materia::all();

        return view('curso.index', compact('cursos','materias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materias = Materia::all();

        $curso = new Curso();

        
        return view('curso.create', compact('curso'), compact('materias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Curso::$rules);

        $curso = Curso::create($request->all());
        $curso->materias()->sync($request->materias);

        $this->registerChange($curso->id, 'Nuevo curso');

        return redirect()->route('cursos.index')
            ->with('success', 'Curso created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $curso = Curso::find($id);
        $years = $curso->alumnos()->distinct()->select('year')->pluck('year');

        //$years = $curso->alumnos()->selectRaw("distinct('year')")->get();

        return view('curso.show', compact('curso','years'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso = Curso::findOrFail($id);
        $materias = Materia::all();

        return view('curso.edit', compact('curso','materias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Curso $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curso $curso)
    {
        $alumnos = Alumno::where('id_curso',$curso->id)->get();
        $year = Carbon::now();
        $date = date('y', strtotime($year));

        foreach($alumnos as $alumno){
            //Here we take the relations to remove from the student
            $relations = DB::table('alumno_materia')->where('origin',$curso->id);
            $toRemove = $alumno->materias()->whereExists($relations)->select('id')->get();

            $alumno->materias()->detach($toRemove);
            
            $alumno->materias()->syncWithPivotValues($request->materias, ['origin' => $curso->id, 'year' => $date]);
        }

        $curso->materias()->sync($request->materias);

        return redirect()->route('cursos.index')
            ->with('success', 'Curso actualizado exitósamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $curso = Curso::find($id)->delete();

        return redirect()->route('cursos.index')
            ->with('success', 'Curso deleted successfully');
    }
}
