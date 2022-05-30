@extends('layouts.app')

@section('template_title')
    {{ $alumnoMaterium->name ?? 'Show Alumno Materium' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Alumno Materium</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('alumno_materium.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Alumno Id:</strong>
                            {{ $alumnoMaterium->alumno_id }}
                        </div>
                        <div class="form-group">
                            <strong>Materia Id:</strong>
                            {{ $alumnoMaterium->materia_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
