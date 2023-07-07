@extends('layouts.base')

@section('content')

<h1 class="mb-5 mt-5">Mis Publicaciones</h1>
@if($posts->count() > 0)
<ul class="list-group">
    @foreach($posts as $post)
    <li class="list-group-item d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">#{{ $post->id }}
            <span class="text-dark">{{ " - ".Str::limit($post->titulo, 40) }}</span>
        </h2>
        <div>
            <div class="btn-group" role="group">
                <a href="{{ route('post.show-post', ['id' => $post->id]) }}" class="btn btn-primary btn-post-list">
                    <i class="bi bi-eye"></i> Ver
                </a>
                <a href="{{ route('post.modify-post', ['id' => $post->id]) }}" class="btn btn-primary btn-post-list">
                    <i class="bi bi-pencil-square text-white"></i> Modificar
                </a>
                <form action="{{ route('post.soft-delete-post', $post->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-dark btn-post-list">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>

            </div>
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
@endsection