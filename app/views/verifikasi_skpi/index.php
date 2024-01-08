<?php
// session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: " . BASEURL . "/?url=login");
    exit();
}

if ($_SESSION['role'] != 2) {
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
                        <th class=" rounded-tl px-2">Nama Prestasi</th>
                        <th class="">Tanggal Pelaksanaan</th>
                        <th class="font-sans">Keterangan</th>
                        <th class="">Status</th>
                        <th class="">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data['verif'] as $mhs) :
                    ?>
                    <tr class=" border-b border-gray-300">
                        <td><?= $mhs['judul'] ?></td>
                        <td class="text-center"><?= $mhs['tanggal_pelaksanaan'] ?></td>
                        <td>
                            <label for="">Level/Tingkat : <?= $mhs['nama_butir'] ?></label><br>
                            <label for="">Juara : <?= $mhs['nama_sub_butir'] ?> </label><br>
                            <label for="peserta">Peserta : <br>
                                <ul>
                                    <?php foreach ($data['peserta'] as $peserta) : ?>
                                        <?php if ($peserta['id_item_skpi'] == $mhs['id_item_skpi']) : ?>
                                            <li><?= $peserta['nim_peserta'] ?> / <?= $peserta['nama'] ?></li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </label>
                        </td>
                        <td class="status text-center <?= $mhs['verifikasi'] ? 'bg-green-500' : 'bg-red-500'; ?>">
                            <?= $mhs['verifikasi'] ? 'Sudah Disetujui' : 'Belum Disetujui'; ?>
                        </td>
                        <td class="flex justify-center pt-2 gap-2">
                            <a href="<?= BASEURL ?>/?url=verifikasi/filebukti/<?= $mhs['id_item_skpi'] ?>" class="bg-yellow-400 p-1 rounded">
                                <img class="w-6" src="<?= BASEURL ?>/images/info.png" alt="">
                            </a href="<?= $mhs['id_item_skpi'] ?>">
                            <?php if ($mhs['verifikasi'] == 0) { ?>
                                <button data-id="<?= $mhs['id_item_skpi'] ?>" class="accButton bg-green-500 p-1 rounded">
                                    <img class="w-6" src="<?= BASEURL ?>/images/Done_round.png" alt="">
                                </button>
                            <?php } else { ?>
                                <button class="bg-gray-400 p-1 rounded">
                                    <img class="w-6" src="<?= BASEURL ?>/images/Done_round.png" alt="">
                                </button>
                            <?php }?>
                            <button data-id = "<?= $mhs['id_item_skpi'] ?>" class="cancelButton bg-red-500 p-1 rounded">
                                <img class="w-6" src="<?= BASEURL ?>/images/Close_round_light.png" alt="">
                            </button>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden" id="pdfOverlay" onclick="closePdfModal()"></div>

<div class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 bg-gray-100 p-5 rounded-md shadow-lg max-w-screen-lg w-full h-full overflow-auto hidden" id="pdfContainer">
    <span class="absolute top-1 right-1 text-2xl cursor-pointer" onclick="closePdfModal()"> &times; </span>
    <iframe class="w-full h-full" id="pdfViewer" frameborder="0"></iframe>
</div>
<script src="<?= BASEURL ?>/js/pagination.js"></script>
<script src="<?= BASEURL ?>/js/detail_validasi.js"></script>
<script src="<?= BASEURL ?>/js/update_verifikasi.js"></script>