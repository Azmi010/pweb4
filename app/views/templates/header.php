<?php 
// session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: " . BASEURL . "/?url=Login");
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
<?php
    $poin = isset($data['poin']) ? $data['poin'] : 0;
    $poin_minimal = isset($data['poin_minimal']) ? $data['poin_minimal'] : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <title>Halaman <?= $data['head_title']; ?></title>
    <script src="<?= BASEURL ?>/js/sweetalert2.js"></script>
    <link rel="stylesheet" href="<?= BASEURL ?>/css/homepage.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet"> -->
    <script src="<?= BASEURL ?>/js/jquery-3.7.1.js"></script>
    <script src="<?= BASEURL ?>/js/tailwind_3.3.5.js"></script>
    <script src="<?= BASEURL ?>/js/datatables.js"></script>
    <script src="<?= BASEURL ?>/js/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="<?= BASEURL ?>/css/datatables.css"></script>
    <link rel="stylesheet" href="<?= BASEURL ?>/css/style.css">
</head>
<body class="bg-gray-100">

<div class="bg-gray-800 w-full h-20 flex justify-between fixed z-50 top-0 shadow-xl">
  <div class="flex items-center ml-4">
   <button class="toggle-btn mx-4 bg-gray-400 rounded p-1 hover:bg-white" onclick="toggleSidebar()"><img class="w-6" src="<?= BASEURL ?>/images/Hamburger_icon.svg.png" alt=""></button>
      <div class="flex flex-col text-white mr-2">
          <p class="font-bold">
            SISTEM INFORMASI FASILKOM CREDIT POINT
          </p>
          <p class="text-right text-xs">
            (SI-FCP)
          </p>
      </div>
  </div>
  <div class="profil flex items-center mr-24">
      <img class="w-12" src="<?= BASEURL ?>/images/user.png" alt="">
      <div class="flex-col text-white ml-2">
            <h3 class="font-medium">
                <?= $username ?>
            </h3>
            <h4 class="text-xs">
                <?= $nim ?>
            </h4>
            <?php
                if ($role == 1) {
            ?>
            <h4 class="text-xs">
                Poin: <?= $poin . '/' . $poin_minimal  ?>
            </h4>
            <?php
                }
            ?>
      </div>
      <form action="<?= BASEURL ?>/?url=Login/logout" method="post">
          <button type="submit" class="ml-10 bg-red-600 px-2.5 py-1 rounded text-white hover:bg-red-800">Logout</button>
      </form>
  </div>
</div>