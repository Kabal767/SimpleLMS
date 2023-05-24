<?php

namespace App\Http\Controllers;

use App\Models\Familiar;
use App\Models\Alumno;
use Illuminate\Http\Request;

/**
 * Class MateriaController
 * @package App\Http\Controllers
 */
class FamiliarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $familiars = Familiar::all();

        return view('familiar.index', compact('familiars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $familiar = new Familiar();
        return view('familiar.create', compact('familiar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Familiar::$rules);

        $familiar = Familiar::create($request->all());

        return redirect()->route('familiars.index')
            ->with('success', 'Familiar añadido al sistema exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Familiar $familiar)
    {
        $alumnos = Alumno::all();

        return view('familiar.show', compact('familiar','alumnos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Familiar $familiar)
    {
        return view('familiar.edit', compact('familiar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Familiar $familiar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Familiar $familiar)
    {
        request()->validate(Familiar::$rules);

        $familiar->update($request->all());

        return redirect()->route('familiars.index')
            ->with('success', 'Familiar ' . $familiar->DNI . ' modificado exitosamente!');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $familiar = Familiar::find($id)->delete();

        return redirect()->route('familiars.index')
            ->with('success', 'Familiar eliminado exitosamente');
    }

    public function attachAlumno(Request $request, Familiar $familiar){
        $familiar->alumnos()->attach($request->alumno, ['relation' => $request->relation]);

        return redirect()->route('familiars.show', ['familiar'=>$familiar->id]);
    }

    public function updateAlumno(Request $request, Familiar $familiar, Alumno $alumno){
        $familiar->alumnos()->updateExistingPivot($alumno, ['relation' => $request->relation]);

        return redirect()->route('familiars.show', ['familiar'=>$familiar->id]);
    }

    public function detachAlumno(Familiar $familiar, $alumno){
        $familiar->alumnos()->detach($alumno);
        
        return redirect()->route('familiars.show', ['familiar'=>$familiar->id]);
    }
}