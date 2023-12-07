<?php 
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: " . BASEURL . "/?url=login");
    exit();
}
?>

<section id="box">
    <div class="box hover:bg-blue-800">
        <h1>7</h1>
        <div class="teks">
            <p>Data Prestasi</p>
            <i class="ri-database-2-fill"></i>
        </div>
    </div>
    <div class="box1 hover:bg-green-700">
        <h1>5</h1>
        <div class="teks-1">
        <p>Data Keikutsertaan Kegiatan</p>
        <i class="ri-database-2-fill"></i>
        </div>
    </div>
    <div class="box2 hover:bg-orange-600">
        <h1>3</h1>
        <div class="teks-2">
        <p>Data Sertifikasi kompetensi</p>
        <i class="ri-database-2-fill"></i>
        </div>
    </div>
</section>