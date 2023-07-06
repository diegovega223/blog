@extends('layouts.base')

@section('content')
        <div class="row mt-4">
            <div class="col-md-8 offset-md-2">
                <div class="bg-light p-5 rounded">
                    <h2>{{ $post->titulo }}</h2>
                    <p>{{ $post->cuerpo }}</p>
                    <p>Publicado por: {{ $post->user->name }}</p>
                    <p>Fecha de publicación: {{ $post->created_at }}</p>
                </div>
            </div>
        </div>
    <br>
@endsection
