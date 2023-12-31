@extends('layouts.login-register')

@section('content')
    <form method="post" action="{{ route('login.perform') }}" class="container w-25">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />


        <h1 class="h3 mb-3 fw-normal">Login</h1>

        @include('layouts.partials.messages')

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Usuario"
                required="required" autofocus>
            <label for="floatingName">Correo o Usuario</label>
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}"
                placeholder="Contraseña" required="required">
            <label for="floatingPassword">Contraseña</label>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar sesión</button>

        @include('auth.partials.copy')
    </form>

    <div class="text-center">
        ¿No tienes una cuenta? <a href="/register">Regístrate aquí</a>
    </div>
@endsection
