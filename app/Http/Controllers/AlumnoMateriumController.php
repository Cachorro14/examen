<?php

namespace App\Http\Controllers;

use App\Models\AlumnoMaterium;
use App\Models\Alumno;
use App\Models\Materia;
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
        $alumnos = Alumno::pluck('nombre','id');
        $materias = Materia::pluck('nombre','id');
        return view('alumno-materium.index', compact('alumnoMateria','alumnos','materias'))
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
        $alumnos = Alumno::pluck('nombre','id');
        $materias = Materia::pluck('nombre','id');
        return view('alumno-materium.create', compact('alumnoMaterium','alumnos','materias'));
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

        return redirect()->route('alumno_materium.index')
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
        $alumnos = Alumno::pluck('nombre','id');
        $materias = Materia::pluck('nombre','id');

        return view('alumno_materium.show', compact('alumnoMaterium','alumnos','materias'));
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
        $alumnos = Alumno::pluck('nombre','id');
        $materias = Materia::pluck('nombre','id');

        return view('alumno_materium.edit', compact('alumnoMaterium','alumnos','materias'));
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
        $alumnos = Alumno::pluck('nombre','id');
        $libros = Materia::pluck('nombre','id');

        return redirect()->route('alumno_materium.index')
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

        return redirect()->route('alumno_materium.index')
            ->with('success', 'AlumnoMaterium deleted successfully');
    }
}
