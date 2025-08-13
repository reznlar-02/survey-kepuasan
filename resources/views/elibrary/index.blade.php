@extends('layout.elearning')

@section('title', 'E-Library')

@push('styles')
<style>
    .container{ margin-top: 96px; position: relative; }
    .search-bar-container{ position: absolute; top: -8px; right: 0; display:flex; gap:10px; }
    .search-bar-container input{ padding:10px; border:2px solid #054b96; border-radius:30px; font-size:1rem; width:300px; }
    .search-bar-container button{ background-color:#054b96; color:#fff; border:none; padding:10px 20px; border-radius:30px; cursor:pointer; font-size:1rem; transition:all .3s ease; }
    .search-bar-container button:hover{ background-color:#043b78; }
    .gallery-grid{ display:grid; grid-template-columns: repeat(auto-fill, minmax(250px,1fr)); gap:20px; margin-top: 30px; }
    .gallery-item{ position:relative; overflow:hidden; border-radius:15px; box-shadow:0 4px 8px rgba(0,0,0,.15); transition: transform .3s ease, box-shadow .3s ease; cursor:pointer; }
    .gallery-item:hover{ transform:scale(1.03); box-shadow:0 8px 16px rgba(0,0,0,.25); }
    .gallery-item img{ width:100%; height:100%; object-fit:cover; }
    .title-overlay{ position:absolute; bottom:0; left:0; right:0; background:rgba(0,0,0,.7); color:#fff; padding:10px; text-align:center; font-weight:600; }
    body { background: url('{{ asset('assets/images/kapal.jpg') }}') center/cover fixed no-repeat; }
</style>
@endpush

@section('content')
<div class="container">
    <div class="search-bar-container">
        <input type="text" id="bookSearch" class="form-control" placeholder="Cari Buku..." onkeyup="searchBooks()">
        <button class="btn btn-primary" onclick="searchBooks()">Cari</button>
    </div>

    <h2 class="text-center mb-4">Daftar Buku</h2>

    <div class="gallery-grid" id="bookGallery">
        @foreach($books as $book)
            <div class="gallery-item" data-title="{{ $book->title }}" data-author="{{ $book->author }}" data-bs-toggle="modal" data-bs-target="#bookModal-{{ $book->id }}">
                <img src="{{ asset($book->cover_image) }}" alt="{{ $book->title }}">
                <div class="title-overlay">{{ $book->title }}</div>
            </div>

            <div class="modal fade" id="bookModal-{{ $book->id }}" tabindex="-1" aria-labelledby="bookModalLabel-{{ $book->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="bookModalLabel-{{ $book->id }}">{{ $book->title }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img src="{{ asset($book->cover_image) }}" class="img-fluid mb-3" alt="{{ $book->title }}" style="max-width: 80%; height: auto;">
                            <p><strong>Deskripsi:</strong> {{ $book->synopsis }}</p>
                            <p><strong>Pengarang:</strong> {{ $book->author }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4 d-flex justify-content-center">
        {{ $books->links() }}
    </div>
</div>
@endsection

@push('scripts')
<script>
function searchBooks(){
  const input = document.getElementById('bookSearch');
  const filter = input.value.toLowerCase();
  const items = document.querySelectorAll('.gallery-item');
  items.forEach(item => {
    const title = item.getAttribute('data-title').toLowerCase();
    const author = item.getAttribute('data-author').toLowerCase();
    item.style.display = (title.includes(filter) || author.includes(filter)) ? '' : 'none';
  });
}
</script>
@endpush