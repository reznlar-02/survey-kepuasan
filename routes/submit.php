<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$database = "exam_application";

$conn = new mysqli($servername, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari formulir
$nama = $_POST['nama'];
$nrp = $_POST['nrp'];
$email = $_POST['email'];
$strata = $_POST['strata'];
$pendidikan = $_POST['pendidikan'];

// Cari atau tambahkan ID strata
$strataQuery = $conn->prepare("SELECT id FROM strata WHERE nama_strata = ?");
$strataQuery->bind_param("s", $strata);
$strataQuery->execute();
$result = $strataQuery->get_result();

if ($result->num_rows > 0) {
    $strata_id = $result->fetch_assoc()['id'];
} else {
    $insertStrata = $conn->prepare("INSERT INTO strata (nama_strata) VALUES (?)");
    $insertStrata->bind_param("s", $strata);
    $insertStrata->execute();
    $strata_id = $conn->insert_id;
}

// Cari atau tambahkan ID pendidikan
$pendidikanQuery = $conn->prepare("SELECT id FROM pendidikan WHERE nama_pendidikan = ?");
$pendidikanQuery->bind_param("s", $pendidikan);
$pendidikanQuery->execute();
$result = $pendidikanQuery->get_result();

if ($result->num_rows > 0) {
    $pendidikan_id = $result->fetch_assoc()['id'];
} else {
    $insertPendidikan = $conn->prepare("INSERT INTO pendidikan (nama_pendidikan) VALUES (?)");
    $insertPendidikan->bind_param("s", $pendidikan);
    $insertPendidikan->execute();
    $pendidikan_id = $conn->insert_id;
}

// Masukkan data ke form_datadiri
$insertDataDiri = $conn->prepare("INSERT INTO form_datadiri (nama, nrp, email, strata_id, pendidikan_id) VALUES (?, ?, ?, ?, ?)");
$insertDataDiri->bind_param("sssii", $nama, $nrp, $email, $strata_id, $pendidikan_id);

if ($insertDataDiri->execute()) {
    echo "Data berhasil disimpan.";
} else {
    echo "Terjadi kesalahan: " . $conn->error;
}

// Tutup koneksi
$conn->close();
?>