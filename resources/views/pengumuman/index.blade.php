<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <style>
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

        .container {
            margin-top: 80px;
        }

        .table-container {
            margin-top: 30px;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table thead {
            background-color: #054b96;
            color: white;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #054b96; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding: 0.5rem 1rem;">
        <div class="container-fluid d-flex justify-content-center">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/images/Group 1.png') }}" alt="" width="60" height="60">
                DISDIKAL
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
                <div class="navbar-nav text-center">
                    <a class="nav-link fw-bold menu-item" aria-current="page" href="{{ route('landing') }}">Home</a>
                    <a class="nav-link fw-bold menu-item" href="{{ route('struktur_organisasi') }}">Struktur Organisasi</a>
                    <a class="nav-link fw-bold menu-item" href="{{ route('questioner.form') }}">Questioner</a>
                    <a class="nav-link fw-bold menu-item" href="/elibrary">E-Library</a>
                    <a class="nav-link fw-bold active menu-item" href="{{ route('pengumuman.index') }}">Pengumuman</a>
                    <div> 
                        <a class="nav-link menu-item" href="/admin/login">Admin</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Konten -->
    <div class="container">
        <h1>Pengumuman</h1>

        <!-- Filter dan Pencarian -->
        <div class="row mb-3">
            <div class="col-md-6">
                <select class="form-select" id="strataDropdown" onchange="filterPengumuman()">
                    <option value="">-- Pilih Strata --</option>
                    @foreach($strata as $s)
                    <option value="{{ $s->id }}">{{ $s->nama_strata }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" id="searchInput" placeholder="Cari pengumuman..." onkeyup="searchPengumuman()">
            </div>
        </div>

        <!-- Tabel Pengumuman -->
        <div class="table-container">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Strata</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody id="pengumumanTable">
                    @foreach($pengumuman as $p)
                    <tr>
                        <td>{{ $p->content }}</td>
                        <td>{{ $p->strata->nama_strata ?? 'Perwira','Bintara','Tamtama' }}</td>
                        <td>{{ $p->created_at ? $p->created_at->format('d M Y') : 'Tidak ada tanggal' }}</td>
                    </tr>
                    @endforeach
                </tbody>                
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-3">
            {{ $pengumuman->links() }}
        </div>
    </div>

    <script>
        function filterPengumuman() {
            const strataId = document.getElementById('strataDropdown').value;
            fetch(`/pengumuman/filter/${strataId}`)
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById('pengumumanTable');
                    tableBody.innerHTML = '';
                    if (data.length > 0) {
                        data.forEach(item => {
                            tableBody.innerHTML += `
                                <tr>
                                    <td>${item.content}</td>
                                    <td>${item.strata ? item.strata.name : 'Perwira','Bintara','Tamtama'}</td>
                                    <td>${new Date(item.created_at).toLocaleDateString('id-ID')}</td>
                                </tr>
                            `;
                        });
                    } else {
                        tableBody.innerHTML = '<tr><td colspan="3" class="text-center">Tidak ada pengumuman</td></tr>';
                    }
                });
        }

        function searchPengumuman() {
            const searchQuery = document.getElementById('searchInput').value.toLowerCase();
            const tableRows = document.querySelectorAll('#pengumumanTable tr');
            tableRows.forEach(row => {
                const cells = Array.from(row.cells);
                const match = cells.some(cell => cell.textContent.toLowerCase().includes(searchQuery));
                row.style.display = match ? '' : 'none';
            });
        }
    </script>
</body>
</html>