<?php 
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: " . BASEURL . "/?url=login");
    exit();
}

$role = $_SESSION['role'];

// Inisialisasi variabel username dan nim
$username = '';
$nim = '';

// Menyesuaikan variabel username dan nim berdasarkan role
switch ($role) {
    case 1:
        $username = $_SESSION['mahasiswa'];
        $nim = $_SESSION['nim'];
        break;
    case 3:
        $username = $_SESSION['tim_skpi'];
        $nim = $_SESSION['nip_tim_skpi'];
        break;
    case 4:
        $username = $_SESSION['dekan'];
        $nim = $_SESSION['nip_dekan'];
        break;
    case 2:
        $username = $_SESSION['operator_akademik'];
        $nim = $_SESSION['nip_operator_akademik'];
        break;
    default:
        // Handle jika role tidak dikenali
        echo "Role tidak valid.";
        exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link rel="stylesheet" href="<?= BASEURL ?>/css/homepage.css">
    <script src="<?= BASEURL ?>/js/tailwind_3.3.5.js"></script>
    <title>Halaman <?= $data['head_title']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="<?= BASEURL ?>/js/tailwind_3.3.5.js"></script>
</head>
<body class="bg-gray-100">

<div class="bg-gray-800 w-full h-20 flex justify-between fixed top-0 shadow-xl">
  <div class="flex items-center ml-64">
      <div class="flex flex-col text-white mr-2">
          <p class="font-bold">
              SURAT KETERANGAN PENDAMPING IJAZAH
          </p>
          <p class="text-right text-xs">
              FAKULTAS ILMU KOMPUTER
          </p>
      </div>
      <!-- <img class="w-12" src="<?= BASEURL ?> . /images/Logo_UNEJ-removebg-preview.png" alt=""> -->
  </div>
  <div class="flex items-center mr-24">
      <img class="w-12" src="<?= BASEURL ?> . /images/user.png" alt="">
      <div class="flex-col text-white ml-2">
            <h3 class="font-medium">
                <?= $username ?>
            </h3>
            <h4 class="text-xs">
                <?= $nim ?>
            </h4>
      </div>
      <form action="<?= BASEURL ?>/?url=login/logout" method="post">
          <button type="submit" class="ml-10 bg-red-600 px-2.5 py-1 rounded text-white hover:bg-red-800">Logout</button>
      </form>
  </div>
</div>