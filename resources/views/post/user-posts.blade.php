@extends('layouts.base')

@section('content')
<div class="container">
    <h1 class="mb-4">Mis Posts</h1>
    @if($posts->count() > 0)
    <ul class="list-group">
        @foreach($posts as $post)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <h2 class="text-primary">#{{ $post->id }}
                <span class="text-dark">{{ " - ".Str::limit($post->titulo, 60) }}</span>
            </h2>
            <div>
                <div class="btn-group" role="group">
                    <a href="{{ route('post.show-post', ['id' => $post->id]) }}" class="btn btn-primary btn-post-list">Ver</a>
                    <form action="{{ route('post.soft-delete-post', $post->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-post-list">X</button>
                    </form>
                </div>
            </div>
        </li>
        <br>
        @endforeach
    </ul>
    @else
    <p>No tienes ningún post.</p>
    @endif
</div>
@endsection