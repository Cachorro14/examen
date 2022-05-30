@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Inicio') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>Bienvenido a la actividad del examen</h3>
                    <h4>En la parte de arriba podra elegir que quiere hacer</h4>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
