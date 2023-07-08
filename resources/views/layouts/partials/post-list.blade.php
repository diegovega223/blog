<div class="row margin-bottom-50">
    @forelse($posts as $post)
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title text-uppercase text-center text-primary ">
                        {{ Str::limit($post->titulo, 30) }}</h5>
                    <hr>
                    <p class="card-text m-0">Autor: <i class="bi bi-person-fill text-primary"></i>
                        {{ $post->user->name }}</p>
                    <p class="card-text">Publicado : <i class="bi bi-calendar text-primary"></i>
                        {{ $post->created_at }}</p>
                    <div class="d-grid">
                        <a href="{{ route('post.show-post', ['id' => $post->id]) }}"
                            class="btn btn-primary btn-post-list">
                            <i class="bi bi-eye"></i> Ver Publicación
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-md-4 margin-bottom-100">
            <p>Todavía no hay publicaciones.</p>
        </div>
    @endforelse
    @if ($posts->count() >= 1)
        @include('layouts.partials.pagination', ['pagination' => $posts])
    @endif
