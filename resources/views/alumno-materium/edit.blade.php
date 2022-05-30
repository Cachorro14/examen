@extends('layouts.app')

@section('template_title')
    Update Alumno Materium
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Alumno Materium</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('alumno_materium.update', $alumnoMaterium->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('alumno_materium.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
