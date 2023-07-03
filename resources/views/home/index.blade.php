@extends('layouts.base')
@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        {{ auth()->user()->username }}
        <h1>Inicio</h1>
        <p class="lead">Solo los usuarios autenticados pueden acceder a esta sección.</p>
        @endauth

        @guest
        <h1>Inicio</h1>
        <p class="lead">Estás viendo la página de inicio. Inicie sesión para ver los datos restringidos.</p>
        @endguest
    </div>
@endsection
