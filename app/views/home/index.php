
<?php 
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    // Jika belum, redirect ke halaman login atau tampilkan pesan
    header("Location: " . BASEURL . "/login");
    exit();
}
?>

<h1 class="text-3xl">Selamat Datang di Website Saya</h1>
<p>Halo, nama saya <?= $_SESSION['username']; ?></p>