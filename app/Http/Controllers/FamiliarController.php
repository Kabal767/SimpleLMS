<?php

namespace App\Http\Controllers;

use App\Models\Familiar;
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
        $familiars = Familiar::paginate();

        return view('familiar.index', compact('familiars'))
            ->with('i', (request()->input('page', 1) - 1) * $familiars->perPage());
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

        return redirect()->route('familiar.index')
            ->with('success', 'Familiar añadido al sistema exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Familiar $id)
    {
        return view('familiar.show', compact('familiar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Familiar $id)
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
        request()->validate(Familiar::$familiar);

        $familiar->update($request->all());

        return redirect()->route('familiar.index')
            ->with('success', 'Materia updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Familiar $id)
    {
        $familiar = Familiar::find($id)->delete();

        return redirect()->route('familiar.index')
            ->with('success', 'Materia deleted successfully');
    }
}