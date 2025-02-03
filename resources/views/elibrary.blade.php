{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* CSS Sesuai Desain Anda */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
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

        .menu-item {
            color: white;
            text-transform: uppercase;
            padding: 10px 20px;
            margin: 5px;
            border: 2px solid transparent;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .menu-item:hover, .menu-item.active {
            background-color: white;
            color: #054b96;
            border-color: #054b96;
        }

        .search-bar {
            margin: 30px auto;
            max-width: 600px;
            display: flex;
        }

        .search-bar input {
            flex-grow: 1;
            padding: 10px;
            border: 2px solid #054b96;
            border-radius: 5px 0 0 5px;
        }

        .search-bar button {
            background-color: #054b96;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .gallery-item img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex justify-content-center">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/images/Group 1.png') }}" alt="" width="60" height="60">
                DISDIKAL
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
                <div class="navbar-nav text-center">
                    <a class="nav-link menu-item" href="{{ route('landing') }}">Home</a>
                    <a class="nav-link menu-item" href="{{ route('struktur_organisasi') }}">Struktur Organisasi</a>
                    <a class="nav-link menu-item" href="/questioner">Questioner</a>
                    <a class="nav-link menu-item active" href="elibrary">E-Library</a>
                    <a class="nav-link menu-item" href="{{ route('pengumuman') }}">Pengumuman</a>
                    <div> <a class="nav-link menu-item" href="/admin/login">Admin</a>
                </div>
            </div>
        </div>
        </div>
    </nav>

    <!-- Search Bar -->
    <div class="search-bar">
        <form action="{{ route('elibrary.search') }}" method="GET">
            @csrf
            <input type="text" name="query" placeholder="Search for books...">
            <button type="submit">Search</button>
        </form>
    </div>

    <!-- Category Section -->
    <div class="container mt-4">
        <div class="category-section">
            <h2>Pilihlah Buku Yang Anda Cari</h2>
            <div class="gallery-grid">
                @foreach($books as $book)
                    <div class="gallery-item" onclick="openPopup('{{ asset($book->file_path) }}', '{{ $book->title }}', '{{ $book->description }}')">
                        <img src="{{ asset($book->cover_image) }}" alt="{{ $book->title }}">
                        <p>{{ $book->title }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Pop-up -->
    <div class="popup-overlay" id="popupOverlay">
        <div class="popup-content">
            <span class="close-popup" onclick="closePopup()">&times;</span>
            <img src="" alt="Popup Image" id="popupImage">
            <h3 id="popupTitle"></h3>
            <p id="popupSynopsis"></p>
        </div>
    </div>

    <script>
        function openPopup(imageSrc, title, synopsis) {
            document.getElementById('popupImage').src = imageSrc;
            document.getElementById('popupTitle').textContent = title;
            document.getElementById('popupSynopsis').textContent = synopsis;
            document.getElementById('popupOverlay').classList.add('active');
        }

        function closePopup() {
            document.getElementById('popupOverlay').classList.remove('active');
        }
    </script>
    <form action="{{ route('e_library.search') }}" method="GET">
        <!-- Your form fields -->
    </form>    
</body>
</html> --}}