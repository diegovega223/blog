@extends('layouts.base')

@section('content')
<div class="p-5">
    <div class="d-flex">
        <a class="btn btn-dark rounded-circle mx-1 mt-2 py-1 px-2" href="{{ url()->previous() }}">
            <i class="bi bi-arrow-left"></i>
        </a>
    </div>

    <div class="mb-3">
        <h1 class="mb-5 mt-4">Historial de Cambios de la Publicación #{{ $post->id }}</h1>
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