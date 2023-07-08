@extends('layouts.base')

@section('content')

    <div class="row align-items-center mb-3">
        <div class="col-auto">
            @include('layouts.partials.back-Button')
        </div>
        <div class="col">
            <h1 class="mt-3">Mis Publicaciones</h1>
        </div>
    </div>
    @if ($posts->count() > 0)
        <ul class="list-group">
            @foreach ($posts as $post)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <h3 class="text-primary">#{{ $post->id }}
                        <span class="text-dark">{{ ' - ' . Str::limit($post->titulo, 40) }}</span>
                    </h3>
                    <div class="button-container">
                        <a href="{{ route('post.show-post', ['id' => $post->id]) }}" class="btn btn-primary btn-post-list">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('post.modify-post', ['id' => $post->id]) }}"
                            class="btn btn-primary btn-post-list">
                            <i class="bi bi-pencil-square text-white"></i>
                        </a>
                        <a href="{{ route('post.cambios-post', $post->id) }}" class="btn btn-primary btn-post-list">
                            <i class="bi bi-clock"></i>
                        </a>
                        <form action="{{ route('post.soft-delete-post', $post->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-dark btn-post-list">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </li>
                <br>
            @endforeach
        </ul>
    @else
        <div class="margin-bottom-200">
            <p>No tienes ningún post.</p>
        </div>
    @endif
    @include('layouts.partials.pagination', ['pagination' => $posts])
@endsection
