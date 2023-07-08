@extends('layouts.base')

@section('content')
    <div class="row align-items-center mb-3">
        <div class="col-auto">
            @include('layouts.partials.back-Button')
        </div>
        <div class="col">
            <h1 class="mt-3">Historial de Cambios de la Publicación #{{ $post->id }}</h1>
            <hr>
        </div>
    </div>
    <div class="mb-3">
        <p><strong><i class="bi bi-calendar-fill"></i> Hora de Publicación:</strong> {{ $post->created_at }}</p>
    </div>

    @if ($cambiosData)
        <ul class="list-group">
            @foreach ($cambiosData as $cambio)
                <li class="list-group-item">
                    <p>
                        <strong>
                            <i class="bi bi-clock-history"></i> Se realizó un cambio:
                        </strong>
                        <span class="text-primary">{{ $cambio['fecha'] }}</span>
                    </p>
                    @if ($cambio['titulo'])
                        <p><i class="bi bi-check-circle-fill text-primary"></i> Se modificó el título.</p>
                    @endif
                    @if ($cambio['cuerpo'])
                        <p><i class="bi bi-check-circle-fill text-primary"></i> Se modificó el cuerpo.</p>
                    @endif
                </li>
            @endforeach
        </ul>
    @else
        <div class="margin-bottom-200">
            <p>No hay cambios registrados para esta publicación.</p>
        </div>
    @endif
    </div>
@endsection
