<?php

namespace App\Http\Controllers;

use App\Models\JointCursoMaterium;
use Illuminate\Http\Request;

/**
 * Class JointCursoMateriumController
 * @package App\Http\Controllers
 */
class JointCursoMateriumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jointCursoMateria = JointCursoMaterium::paginate();

        return view('joint-curso-materium.index', compact('jointCursoMateria'))
            ->with('i', (request()->input('page', 1) - 1) * $jointCursoMateria->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jointCursoMaterium = new JointCursoMaterium();
        return view('joint-curso-materium.create', compact('jointCursoMaterium'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(JointCursoMaterium::$rules);

        $jointCursoMaterium = JointCursoMaterium::create($request->all());

        return redirect()->route('joint-curso-materia.index')
            ->with('success', 'JointCursoMaterium created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jointCursoMaterium = JointCursoMaterium::find($id);

        return view('joint-curso-materium.show', compact('jointCursoMaterium'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jointCursoMaterium = JointCursoMaterium::find($id);

        return view('joint-curso-materium.edit', compact('jointCursoMaterium'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  JointCursoMaterium $jointCursoMaterium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JointCursoMaterium $jointCursoMaterium)
    {
        request()->validate(JointCursoMaterium::$rules);

        $jointCursoMaterium->update($request->all());

        return redirect()->route('joint-curso-materia.index')
            ->with('success', 'JointCursoMaterium updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $jointCursoMaterium = JointCursoMaterium::find($id)->delete();

        return redirect()->route('joint-curso-materia.index')
            ->with('success', 'JointCursoMaterium deleted successfully');
    }
}
