<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Materia;
use Illuminate\Http\Request;

/**
 * Class CursoController
 * @package App\Http\Controllers
 */
class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::all();

        return view('curso.index', compact('cursos'));
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
        $years = $curso->alumnos()->selectRaw("distinct('year')")->get();

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
        $curso = Curso::find($id);

        return view('curso.edit', compact('curso'));
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
        request()->validate(Curso::$rules);

        $curso->update($request->all());

        return redirect()->route('cursos.index')
            ->with('success', 'Curso updated successfully');
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
