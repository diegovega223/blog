@extends('layouts.login-register')

@section('content')
    <form method="post" action="{{ route('register.perform') }}" class="container w-50">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <h1 class="h3 mb-3 fw-normal">Registro</h1>

        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group form-floating">
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                        placeholder="Ej: Pepe Perez" required="required" autofocus>
                    <label for="floatingEmail">Nombre</label>
                    @error('name')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group form-floating">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                        placeholder="nombre@correo.com" required="required" autofocus>
                    <label for="floatingEmail">Correo</label>
                    @error('email')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group form-floating">
                    <input type="text" class="form-control" name="username" value="{{ old('username') }}"
                        placeholder="Usuario" required="required" autofocus>
                    <label for="floatingName">Usuario</label>
                    @error('username')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group form-floating">
                    <input type="password" class="form-control" name="password" value="{{ old('password') }}"
                        placeholder="Contraseña" required="required">
                    <label for="floatingPassword">Contraseña</label>
                    @error('password')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password_confirmation"
                value="{{ old('password_confirmation') }}" placeholder="Confirmar Contraseña" required="required">
            <label for="floatingConfirmPassword">Confirmar Contraseña</label>
            @error('password_confirmation')
                <div class="alert alert-warning">{{ $message }}</div>
            @enderror
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Registrarse</button>

        @include('auth.partials.copy')
    </form>

    <div class="text-center mt-3">
        ¿Ya tienes una cuenta? <a href="{{ route('auth.login') }}">Inicia sesión aquí</a>
    </div>
    <div class="margin-bottom-100"></div>
@endsection
