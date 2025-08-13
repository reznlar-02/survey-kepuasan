@extends('layout.elearning')

@section('title', 'Pengumuman')

@push('styles')
<style>
    .container { margin-top: 96px; }
    .table-container { margin-top: 30px; background-color: #f9f9f9; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); }
    .table thead { background-color: #054b96; color: white; }
</style>
@endpush

@section('content')
<div class="container">
    <h1 class="h4 mb-3">Pengumuman</h1>

    <div class="row mb-3 g-2">
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

    <div class="d-flex justify-content-center mt-3">
        {{ $pengumuman->links() }}
    </div>
</div>
@endsection

@push('scripts')
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
@endpush