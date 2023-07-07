<div class="container-pagination">
    <div class="pagination custom-pagination">
        <a href="{{ $pagination->previousPageUrl() }}" class="pagination-link pagination-btn btn btn-primary{{ $pagination->currentPage() > 1 ? '' : ' disabled' }}">
            <i class="bi bi-caret-left"></i>
        </a>
        @for ($i = 1; $i <= $pagination->lastPage(); $i++)
            <a href="{{ $pagination->url($i) }}" class="pagination-link custom-pagination-num {{ $i == $pagination->currentPage() ? 'active' : '' }}">{{ $i }}</a>
            @endfor
            <a href="{{ $pagination->nextPageUrl() }}" class="pagination-link pagination-btn btn btn-primary{{ $pagination->currentPage() < $pagination->lastPage() ? '' : ' disabled' }}">
                <i class="bi bi-caret-right"></i></a>
    </div>
</div>
</div>