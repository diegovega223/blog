@extends('layouts.base')

@section('content')
    <div class="row align-items-center mb-3">
        <div class="col-auto">
            @include('layouts.partials.back-Button')
        </div>
        <div class="col">
            <h1 class="mt-3">Modificar Publicación</h1>
            <hr>
        </div>
    </div>
    <div class="bg-light p-3 rounded">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modificar post</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('post.modify-post', ['id' => $post->id]) }}">
                            @csrf

                            <div class="form-group">
                                <label for="titulo">Título</label>
                                <input id="titulo" type="text"
                                    class="form-control @error('titulo') is-invalid @enderror" name="titulo"
                                    value="{{ $post->titulo }}" required autofocus>
                                @error('titulo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="cuerpo">Cuerpo</label>
                                <textarea id="cuerpo" class="form-control @error('cuerpo') is-invalid @enderror" name="cuerpo" required>{{ $post->cuerpo }}</textarea>
                                @error('cuerpo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @csrf
                            <button class="btn btn-primary" type="submit">
                                <i class="bi bi-pencil-fill"></i><span class="text-uppercase"> Guardar cambios</span>
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="row justify-content-center container">
            @if (session('success'))
                <div class="col-md-8 alert alert-success alert-dismissible fade show post-alert-success" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            @endif
        </div>
    </div>
    <div class="margin-bottom-100"></div>
@endsection
