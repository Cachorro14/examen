<?php

namespace App\Http\Controllers;

use App\Models\AlumnoMaterium;
use Illuminate\Http\Request;

/**
 * Class AlumnoMateriumController
 * @package App\Http\Controllers
 */
class AlumnoMateriumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnoMateria = AlumnoMaterium::paginate();

        return view('alumno-materium.index', compact('alumnoMateria'))
            ->with('i', (request()->input('page', 1) - 1) * $alumnoMateria->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alumnoMaterium = new AlumnoMaterium();
        return view('alumno-materium.create', compact('alumnoMaterium'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(AlumnoMaterium::$rules);

        $alumnoMaterium = AlumnoMaterium::create($request->all());

        return redirect()->route('alumno-materium.index')
            ->with('success', 'AlumnoMaterium created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumnoMaterium = AlumnoMaterium::find($id);

        return view('alumno-materium.show', compact('alumnoMaterium'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumnoMaterium = AlumnoMaterium::find($id);

        return view('alumno-materium.edit', compact('alumnoMaterium'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  AlumnoMaterium $alumnoMaterium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AlumnoMaterium $alumnoMaterium)
    {
        request()->validate(AlumnoMaterium::$rules);

        $alumnoMaterium->update($request->all());

        return redirect()->route('alumno-materium.index')
            ->with('success', 'AlumnoMaterium updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $alumnoMaterium = AlumnoMaterium::find($id)->delete();

        return redirect()->route('alumno-materium.index')
            ->with('success', 'AlumnoMaterium deleted successfully');
    }
}
