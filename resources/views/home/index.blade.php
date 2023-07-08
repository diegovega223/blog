@extends('layouts.base')
@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-8 offset-md-2">
                <div>
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    @endif

                    @auth
                        <div class="row mt-4 card bg-dark mb-3">
                            <div class="col-md-8 offset-md-2">
                                <div class="month-links">
                                    @foreach ($months as $m)
                                        @if ($m['publications'])
                                            <a href="{{ route('post.post-for-month', ['month' => $m['name']]) }}"
                                                class="month-link">{{ $m['name'] }}</a>
                                        @else
                                            <span class="month-disabled">{{ $m['name'] }}</span>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @include('layouts.partials.post-list')
                    </div>
                    @if ($posts->count() >= 1)
                        @include('layouts.partials.pagination', ['pagination' => $posts])
                    @endif
                @endauth
                @guest
                    <h1>Inicio</h1>
                    <p class="lead margin-bottom-200">Estás viendo la página de inicio. Inicie sesión para ver los datos
                        restringidos.</p>
                @endguest
            </div>
        </div>
    </div>
    </div>
@endsection
