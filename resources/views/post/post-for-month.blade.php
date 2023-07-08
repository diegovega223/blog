@extends('layouts.base')
@section('content')
    <div class="container">
        <div class="row align-items-center">
            <div class="col-auto">
                @include('layouts.partials.back-Button')
            </div>
            <div class="col">
                <h1 class="mb-2 mt-2">Publicaciones por mes</h1>
                <hr>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-8 offset-md-2">
                @include('layouts.partials.post-list')
            </div>
        </div>
    @endsection