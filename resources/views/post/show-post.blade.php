@extends('layouts.base')

@section('content')
        <div class="row align-items-center">
            <div class="col-auto">
                @include('layouts.partials.back-Button')
            </div>
            <div class="col">
                <h1 class="mt-3">{{ $post->titulo }}</h1>
                <hr>
            </div>
        </div>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="bg-light p-4 rounded">
                <p>{{ $post->cuerpo }}</p>
                <p>Publicado por: {{ $post->user->name }}</p>
                <p>Fecha de publicación: {{ $post->created_at }}</p>
            </div>
        </div>
    </div>
@endsection
