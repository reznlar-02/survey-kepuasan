<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

    <style>
        .container {
            margin-top: 80px;
            position: relative;
        }
        .navbar {
            background-color: #054b96;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
        }
        .navbar-nav .nav-link {
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            background-color: white;
            color: #054b96;
        }
        .menu-box {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }
        .menu-item {
            display: inline-block;
            padding: 12px 20px;
            background-color: #054b96;
            color: white;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 10px;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .menu-item:hover {
            background-color: #043b78;
        }
        .search-bar-container {
            position: absolute;
            top: 0;
            right: 0;
            display: flex;
            gap: 10px;
        }
        .search-bar-container input {
            padding: 10px;
            border: 2px solid #054b96;
            border-radius: 30px;
            font-size: 1rem;
            width: 300px;
        }
        .search-bar-container button {
            background-color: #054b96;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 30px;
            cursor: pointer;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        .search-bar-container button:hover {
            background-color: #043b78;
        }
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 30px;
            padding: 0 10px;
        }
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }
        .gallery-item:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        .gallery-item:hover img {
            transform: scale(1.1);
        }
        .gallery-item .title-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            text-align: center;
            padding: 10px;
            font-size: 1.1rem;
            font-weight: bold;
            border-radius: 0 0 15px 15px;
        }
        body {
            padding-top: 80px;
            background: url('assets/images/kapal.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .modal-body {
        display: flex; /* Tata letak berdampingan */
        align-items: flex-start; /* Menyusun elemen dari atas */
        gap: 20px; /* Jarak antara cover dan teks */
    }

    .modal-body img {
        max-width: 200px; /* Batas ukuran gambar */
        max-height: 300px;
        object-fit: contain; /* Menjaga proporsi */
        border-radius: 10px; /* Sudut gambar melengkung */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Bayangan gambar */
    }

    .modal-body .details {
        display: flex; /* Tata letak horizontal */
        flex-wrap: wrap; /* Supaya elemen turun ke bawah jika tidak muat */
        gap: 20px; /* Jarak antar elemen teks */
        align-items: flex-start; /* Rata atas elemen */
    }

    .modal-body .details div {
        display: flex;
        flex-direction: column; /* Susun label dan konten secara vertikal */
    }

    .modal-body .details div strong {
        font-weight: bold;
        margin-bottom: 5px; /* Jarak antara label dan konten */
    }

    .modal-body .details div p {
        margin: 0;
    }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid d-flex justify-content-center">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/images/Group 1.png') }}" alt="" width="60" height="60">
                E-LIBRARY DISDIKAL
            </a>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
                <div class="navbar-nav text-center">
                    <a class="nav-link fw-bold active menu-item" href="/elibrary">Home</a>
                    <a class="nav-link fw-bold menu-item" href="{{ route('struktur_organisasi') }}">Struktur Organisasi</a>
                    <a class="nav-link fw-bold menu-item" href="{{ route('questioner.form') }}">Questioner</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Daftar Buku -->
    <div class="container">
        <div class="search-bar-container">
            <input type="text" id="bookSearch" class="form-control" placeholder="Cari Buku..." onkeyup="searchBooks()">
            <button class="btn btn-primary">Cari</button>
        </div>
        <h2 class="text-center mb-4">Daftar Buku</h2>
        <div class="gallery-grid" id="bookGallery">
            @foreach($books as $book)
                <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#bookModal-{{ $book->id }}" data-title="{{ $book->title }}" data-author="{{ $book->author }}">
                    <img src="{{ asset($book->cover_image) }}" alt="{{ $book->title }}">
                    <div class="title-overlay">{{ $book->title }}</div>
                </div>

                <!-- Modal for Book Details -->
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

        <!-- Pagination -->
        <div class="mt-4 d-flex justify-content-center">
            {{ $books->links() }}
        </div>
    </div>

    <script>
        function searchBooks() {
            const input = document.getElementById('bookSearch');
            const filter = input.value.toLowerCase();
            const galleryItems = document.querySelectorAll('.gallery-item');

            galleryItems.forEach(item => {
                const title = item.getAttribute('data-title').toLowerCase();
                const author = item.getAttribute('data-author').toLowerCase();
                if (title.includes(filter) || author.includes(filter)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        }
    </script>
</body>
</html>