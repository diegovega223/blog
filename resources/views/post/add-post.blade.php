@extends('layouts.base')

@section('content')
<div class="bg-light p-5 rounded">
    <h1>Nueva Publicación</h1>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear nuevo post</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('post.add-post') }}">
                            @csrf

                            <div class="form-group">
                                <label for="titulo">Título</label>
                                <input id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{ old('titulo') }}" required autofocus>
                                @error('titulo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="cuerpo">Cuerpo</label>
                                <textarea id="cuerpo" class="form-control @error('cuerpo') is-invalid @enderror" name="cuerpo" required>{{ old('cuerpo') }}</textarea>
                                @error('cuerpo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group from-btn">
                                <button type="submit" class="btn btn-primary">Crear post</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="row justify-content-center container">
            @if(session('success'))
            <div class="col-md-8 alert alert-success alert-dismissible fade show post-alert-success"  role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                </button>
            </div>
            @endif
            </ div>
        </div>
    </div>
    @endsection