@extends('layouts.base')

@section('content')
    <div class="bg-light p-5 rounded">
        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @endif

        @auth
            <h1>Inicio</h1>
            <p class="lead">Solo los usuarios autenticados pueden acceder a esta sección.</p>
        @endauth

        @guest
            <h1>Inicio</h1>
            <p class="lead">Estás viendo la página de inicio. Inicie sesión para ver los datos restringidos.</p>
        @endguest
    </div>
@endsection
