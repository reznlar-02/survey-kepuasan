<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: /admin/admin_login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pertanyaan</title>
</head>
<body>
    <h1>Kelola Pertanyaan</h1>
    <!-- Form Tambah Pertanyaan -->
    <form method="POST" action="add_question.php">
        <label for="question">Pertanyaan Baru:</label>
        <input type="text" name="question" id="question" required>
        <button type="submit">Tambah</button>
    </form>
    
    <!-- Tampilkan Pertanyaan -->
    <h2>Daftar Pertanyaan</h2>
    <ul>
        <?php
        // Contoh baca pertanyaan dari database (gunakan database asli dalam implementasi)
        $questions = ['Apa pendapat Anda tentang layanan kami?', 'Bagaimana pengalaman Anda?'];
        foreach ($questions as $q) {
            echo "<li>$q</li>";
        }
        ?>
    </ul>
</body>
</html>