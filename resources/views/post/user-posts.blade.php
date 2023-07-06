@extends('layouts.base')
@php
    use Illuminate\Support\Str;
@endphp

@section('content')
    <div class="container">
        <h1 class="mb-4">Mis Posts</h1>
        @if($posts->count() > 0)
            <ul class="list-group">
                @foreach($posts as $post)
                    <li class="list-group-item">
                        <h2 class="text-primary">#{{ $post->id }} 
                            <span class="text-dark">{{ " - ".Str::limit($post->titulo, 60) }}</span></h2>
                    </li>
                    <li class="list-group-item"> <a href="{{ route('post.show-post', ['id' => $post->id]) }}" class="btn btn-primary">Ver Post</a></li>
                    <br>
                @endforeach
            </ul>
        @else
            <p>No tienes ningún post.</p>
        @endif
    </div>
@endsection
