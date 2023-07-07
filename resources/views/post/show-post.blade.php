@extends('layouts.base')

@section('content')
<div class="d-flex">
    <a class="btn btn-dark rounded-circle mx-1 mt-2 py-1 px-2" href="{{ url()->previous() }}">
        <i class="bi bi-arrow-left"></i>
    </a>
</div>
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="bg-light p-5 rounded">
            <h2>{{ $post->titulo }}</h2>
            <p>{{ $post->cuerpo }}</p>
            <p>Publicado por: {{ $post->user->name }}</p>
            <p>Fecha de publicación: {{ $post->created_at }}</p>
        </div>
    </div>
</div>
@endsection