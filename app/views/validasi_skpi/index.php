<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: " . BASEURL . "/?url=login");
    exit();
}

if ($_SESSION['role'] != 3) {
    header("Location: " . BASEURL . "/?url=login");
    session_destroy();
}
?>
<div class="bg-gray-100 mb-10">
    <div class="w-8/12 ml-80 mt-20 border border-gray-200 rounded-md shadow-md">
        <div class="bg-gray-100 px-4 py-3 h-auto rounded font-medium text-lg">
            <h1>Daftar Prestasi & Pengalaman Mahasiswa</h1> 
        </div>
        <div class="bg-white px-3">
            <form action="">
                <div class="pt-3">
                    <label for="" class="ml-1">Fakultas :</label>
                    <label for="">Ilmu Komputer</label>
                </div>
                <div>
                    <label for="" class="ml-1 mr-1">Keterangan :</label>
                    <input type="radio" name="" id=""> Belum Validasi
                    <input type="radio" name="" id=""> Sudah Validasi <br>
                </div>
            </form>
        </div>
        <div class="rounded bg-white px-3 pt-5 pb-1">
            <table class="pagging w-full rounded shadow-md mb-3">
                <thead>
                    <tr class="border-b-2 border-gray-500 bg-gray-800 h-10 text-white">
                        <th class=" rounded-tl px-2">NO.</th>
                        <th class="">NIM</th>
                        <th class="font-sans">NAMA</th>
                        <th class="">PRODI</th>
                        <th class="">STATUS</th>
                        <th class=" rounded-tr px-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $count = 1;
                    foreach ($data['mhs'] as $mhs) :
                    ?>
                        <tr class="text-center border-b border-gray-300">
                        <td class="py-2"><?= $count++; ?></td>
                        <td><?= $mhs['nim'] ?></td>
                        <td><?= $mhs['nama'] ?></td>
                        <td><?= $mhs['nama_prodi'] ?></td>
                        <?php if ($mhs['validasi'] == 0) { ?>
                        <td class="bg-red-500">Belum Validasi</td>
                        <?php } else { ?>
                        <td class="bg-green-400">Divalidasi</td> 
                        <?php } ?>
                        <td class="flex justify-center pt-2"><a href="<?= BASEURL ?>/?url=validasi/detail_validasi/<?= $mhs['id_mahasiswa']; ?>"><img class="w-6 item-center" src="<?= BASEURL ?>/images/checklist.png" alt=""></a></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="<?= BASEURL ?>/js/pagination.js"></script>