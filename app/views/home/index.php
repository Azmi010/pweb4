<?php

if (!isset($_SESSION['user_id'])) {
    header("Location: " . BASEURL . "/?url=login");
    exit();
}

if ($_SESSION['role'] != 1) {
    header("Location: " . BASEURL . "/?url=login");
    session_destroy();
}

?>

<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
   <span class="sr-only">Open sidebar</span>
   <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
   <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
   </svg>
</button>

<section id="box">
    <a class="box hover:bg-blue-800" href="<?= BASEURL ?>/?url=skpi/prestasi/">
        <h1>7</h1>
        <div class="teks">
            <p>Data Prestasi</p>
            <i class="ri-database-2-fill"></i>
        </div>
</a>
    <a class="box1 hover:bg-green-700">
        <h1>5</h1>
        <div class="teks-1">
        <p>Data Keikutsertaan Kegiatan</p>
        <i class="ri-database-2-fill"></i>
        </div>
</a>
    <a class="box2 hover:bg-orange-600">
        <h1>3</h1>
        <div class="teks-2">
        <p>Data Sertifikasi kompetensi</p>
        <i class="ri-database-2-fill"></i>
        </div>
</a>
</section>