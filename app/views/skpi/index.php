<?php
$judul = isset($data['judul']) ? $data['judul'] : NULL;
$tanggal = isset($data['tanggal']) ? $data['tanggal'] : NULL;
$tingkat = isset($data['tingkat']) ? $data['tingkat'] : NULL;
$jenis = isset($data['jenis']) ? $data['jenis'] : NULL;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="<?= BASEURL ?>/css/output.css" /> -->
    <link rel="stylesheet" href="<?= BASEURL ?>/css/style.css">
    <script src="<?= BASEURL ?>/js/tailwind_3.3.5.js"></script>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <title>Data SKPI</title>
  </head>
  <body class="bg-slate-100">
    <section class="p-4">
      <div class="flex justify-between px-8">
        <h1 class="text-4xl font-medium">Daftar Prestasi</h1>
        <a href="<?= BASEURL ?>/?url=skpi/create/" type="button" class="bg-green-600 text-white px-3 py-2 rounded-lg">Tambah Data</a>
      </div>

      <table class=" w-full border-collapse table-auto mt-4 shadow-lg">
        <thead class="text-blue-50">
          <tr class="bg-blue-800">
            <th class="rounded-tl-lg">Nama Prestasi</th>
            <th>Tanggal Pelaksanaan</th>
            <th>Keterangan</th>
            <th>Approval</th>
            <th class="rounded-tr-lg">Aksi</th>
          </tr>
        </thead>
        <tbody class="rounded-b-xl border-white bg-white">
          <?php
            if (isset($data)) {
          ?>
          <tr>
            <td><?= $judul ?></td>
            <td><?= $tanggal ?></td>
            <td>
              <ul>
                <li class="flex">
                  <h4 class="font-medium">Level/Tingkat: </h4> <?= " ". $tingkat; ?>
                </li>
                <li class="flex">
                  <h4 class="font-medium">Jenis Kepesertaan: </h4> <?= " ". $jenis; ?>
                </li>
              </ul>
            </td>
            <td class="bg-yellow-400">Belum Disetujui</td>
            <td>
              <button class="bg-orange-400 px-3 py-1 rounded">Edit</button>
              <button class="bg-red-600 px-3 py-1 rounded">Hapus</button>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    
      <div class="flex gap-3 justify-end items-center mt-4 px-4 py-1">
        <a href="#" class="px-2 py-1 bg-slate-300 rounded">Previous</a>
        <p>1</p>
        <a href="#" class="px-2 py-1 bg-slate-300 rounded">Next</a>
      </div>
    </section>
  </body>
</html>
