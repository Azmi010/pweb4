<div class="bg-gray-100">
    <div class="mt-20">
        <div class="w-full h-20 px-10 py-7 font-bold text-xl flex">
            <a href="<?= BASEURL ?>/?url=Validasi"><button class="bg-blue-400 mr-1 h-8 rounded hover:bg-blue-700"><img class="w-7 mx-1" src="<?= BASEURL ?>/images/chevron-left.png" alt=""></button></a>
            <h1>Validasi Informasi Tambahan pada SKPI</h1>
        </div>
        <div class="bg-white rounded-t-xl mx-7 p-5">
            <p class=" text-sm font-medium">Fitur untuk memvalidasi Prestasi, Keikutsertaan Kegiatan & Organisasi, dan Sertifikat Kompetensi</p>
        </div>
        <div class="bg-white mx-7 px-5 pb-3">
            <div class="flex justify-between">
                <h2 class="font-semibold text-lg">1. Prestasi/Penghargaan</h2>
                <div>
                    <?php 
                    $url = $_GET['url'];
                    $segments = explode('/', $url);
                    $nilai = end($segments);
                    ?>
                    <button class="bg-blue-400 px-3 py-1 rounded mr-2 mb-1 hover:bg-blue-600 text-white font-semibold" onclick="openPdfModal('<?= ROOTURL ?>/app/upload/<?= $nilai ?>')">PREVIEW</button>
                    <button class="simpanButton bg-green-400 px-3 py-1 rounded mb-1 mr-2 hover:bg-green-600 text-white font-semibold" data-mahasiswa-id="<?= $nilai ?>">SIMPAN</button>
                    <label id="labelPoin" for="">Total Poin : 0</label>
                    <?php 
                    $poin = $data['poin'];
                    ?>
                    <label> / <?= $poin ?></label>
                </div>
            </div>
            <table class="w-full">
                <tr class="bg-gray-800 text-white">
                    <th class="py-2 w-10">No.</th>
                    <th class="">Judul</th>
                    <th class="w-3/12">Aksi</th>
                </tr>
                <?php
                $count1 = 1;

                foreach ($data['mhs'] as $data_prestasi) :
                    if ($data_prestasi['id_kategori'] == 1) :
                        $id_item_skpi = $data_prestasi['id_item_skpi'];
                        ?>
                        <div id="mahasiswaId" data-mahasiswa-id="<?php echo $data_prestasi['id_mahasiswa']; ?>"></div>
                        <tr class="bg-gray-100">
                            <td class="text-center py-8"><?= $count1++ ?></td>
                            <td class="font-bold pl-3"><?= $data_prestasi['judul'] ?><br>
                                <div class="flex mt-2">
                                    <label for="" class="font-bold">
                                        Bukti Pendukung :
                                    </label>
                                    <?php foreach ($data['bukti'] as $bukti) : ?>
                                        <?php if ($bukti['id_item_skpi'] == $data_prestasi['id_item_skpi']) : ?>
                                            <div class="bg-blue-800 w-8 h-8 py-1.5 px-2 rounded-md ml-2 hover:cursor-pointer" onclick="openPdfModal('<?= ROOTURL ?>/app/upload/<?= $bukti['file_name'] ?>')">
                                                <img class="w-4" src="<?= BASEURL ?>/images/Vector.png" alt="" >
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </td>
                            <td id="container" class="flex justify-evenly py-5">
                                <?php if ($data_prestasi['validasi'] == 0) { ?>
                                    <button data-id="<?= $id_item_skpi; ?>" class="layakButton bg-blue-500 w-full h-12/12 m-2 rounded-lg py-1 px-5 text-white hover:bg-blue-700 sm:w-5/12 sm:h-1/6">Layak</button>
                                <?php } else { ?>
                                    <button class="bg-gray-300 w-full h-12/12 m-2 rounded-lg py-1 px-5 text-white sm:w-5/12 sm:h-1/6">Layak</button>
                                <?php } ?>
                                    <button data-id="<?= $id_item_skpi; ?>" class="tidakLayakButton bg-red-500 w-full m-2 rounded-lg py-1 px-5 text-white hover:bg-red-700 sm:w-5/12" type="button">Tidak Layak</button>
                            </td>
                        </tr>
                        <?php
                    endif;
                endforeach;
                ?>
            </table>
        </div>
        <div class="bg-white mx-7 px-5 pb-3">
            <div class="flex justify-between">
                <h2 class="font-semibold text-lg">2. Keikutsertaan dalam Kegiatan dan Organisasi</h2>
            </div>
            <table class="w-full">
                <tr class="bg-gray-800 text-white">
                    <th class="py-2 w-10">No.</th>
                    <th class="">Judul</th>
                    <th class="w-3/12">Aksi</th>
                </tr>
                <?php
                $count1 = 1;

                foreach ($data['mhs'] as $data_kegiatan) :
                    if ($data_kegiatan['id_kategori'] == 2) :
                        $id_item_skpi = $data_kegiatan['id_item_skpi'];
                        ?>
                        <div id="mahasiswaId" data-mahasiswa-id="<?php echo $data_kegiatan['id_mahasiswa']; ?>"></div>
                        <tr class="bg-gray-100">
                            <td class="text-center py-8"><?= $count1++ ?></td>
                            <td class="font-bold pl-3"><?= $data_kegiatan['judul'] ?><br>
                                <div class="flex mt-2">
                                    <label for="" class="font-bold">
                                        Bukti Pendukung :
                                    </label>
                                    <?php foreach ($data['bukti'] as $bukti) : ?>
                                        <?php if ($bukti['id_item_skpi'] == $data_kegiatan['id_item_skpi']) : ?>
                                            <div class="bg-blue-800 w-8 h-8 py-1.5 px-2 rounded-md ml-2 hover:cursor-pointer" onclick="openPdfModal('<?= ROOTURL ?>/app/upload/<?= $bukti['file_name'] ?>')">
                                                <img class="w-4" src="<?= BASEURL ?>/images/Vector.png" alt="" >
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </td>
                            <td id="container" class="flex justify-evenly py-5">
                                <?php if ($data_kegiatan['validasi'] == 0) { ?>
                                    <button data-id="<?= $id_item_skpi; ?>" class="layakButton bg-blue-500 w-full h-12/12 m-2 rounded-lg py-1 px-5 text-white hover:bg-blue-700 sm:w-5/12 sm:h-1/6">Layak</button>
                                <?php } else { ?>
                                    <button class="bg-gray-300 w-full h-12/12 m-2 rounded-lg py-1 px-5 text-white sm:w-5/12 sm:h-1/6">Layak</button>
                                <?php } ?>
                                    <button data-id="<?= $id_item_skpi; ?>" class="tidakLayakButton bg-red-500 w-full m-2 rounded-lg py-1 px-5 text-white hover:bg-red-700 sm:w-5/12" type="button">Tidak Layak</button>
                            </td>
                        </tr>
                        <?php
                    endif;
                endforeach;
                ?>
            </table>
        </div>
        <div class="bg-white mx-7 px-5 pb-3">
            <div class="flex justify-between">
                <h2 class="font-semibold text-lg">3. Sertifikasi Kompetensi</h2>
            </div>
            <table class="w-full">
                <tr class="bg-gray-800 text-white">
                    <th class="py-2 w-10">No.</th>
                    <th class="">Judul</th>
                    <th class="w-3/12">Aksi</th>
                </tr>
                <?php
                $count1 = 1;

                foreach ($data['mhs'] as $data_sertifikasi) :
                    if ($data_sertifikasi['id_kategori'] == 3) :
                        $id_item_skpi = $data_sertifikasi['id_item_skpi'];
                        ?>
                        <div id="mahasiswaId" data-mahasiswa-id="<?php echo $data_sertifikasi['id_mahasiswa']; ?>"></div>
                        <tr class="bg-gray-100">
                            <td class="text-center py-8"><?= $count1++ ?></td>
                            <td class="font-bold pl-3"><?= $data_sertifikasi['judul'] ?><br>
                                <div class="flex mt-2">
                                    <label for="" class="font-bold">
                                        Bukti Pendukung :
                                    </label>
                                    <?php foreach ($data['bukti'] as $bukti) : ?>
                                        <?php if ($bukti['id_item_skpi'] == $data_sertifikasi['id_item_skpi']) : ?>
                                            <div class="bg-blue-800 w-8 h-8 py-1.5 px-2 rounded-md ml-2 hover:cursor-pointer" onclick="openPdfModal('<?= ROOTURL ?>/app/upload/<?= $bukti['file_name'] ?>')">
                                                <img class="w-4" src="<?= BASEURL ?>/images/Vector.png" alt="" >
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </td>
                            <td id="container" class="flex justify-evenly py-5">
                                <?php if ($data_sertifikasi['validasi'] == 0) { ?>
                                    <button data-id="<?= $id_item_skpi; ?>" class="layakButton bg-blue-500 w-full h-12/12 m-2 rounded-lg py-1 px-5 text-white hover:bg-blue-700 sm:w-5/12 sm:h-1/6">Layak</button>
                                <?php } else { ?>
                                    <button class="bg-gray-300 w-full h-12/12 m-2 rounded-lg py-1 px-5 text-white sm:w-5/12 sm:h-1/6">Layak</button>
                                <?php } ?>
                                    <button data-id="<?= $id_item_skpi; ?>" class="tidakLayakButton bg-red-500 w-full m-2 rounded-lg py-1 px-5 text-white hover:bg-red-700 sm:w-5/12" type="button">Tidak Layak</button>
                            </td>
                        </tr>
                        <?php
                    endif;
                endforeach;
                ?>
            </table>
        </div>
        <div class="bg-white mx-7 px-5 pb-3">
            <div class="flex justify-between">
                <h2 class="font-semibold text-lg">4. Kegiatan MBKM</h2>
            </div>
            <table class="w-full">
                <tr class="bg-gray-800 text-white">
                    <th class="py-2 w-10">No.</th>
                    <th class="">Judul</th>
                    <th class="w-3/12">Aksi</th>
                </tr>
                <?php
                $count1 = 1;

                foreach ($data['mhs'] as $data_mbkm) :
                    if ($data_mbkm['id_kategori'] == 4) :
                        $id_item_skpi = $data_mbkm['id_item_skpi'];
                        ?>
                        <div id="mahasiswaId" data-mahasiswa-id="<?php echo $data_mbkm['id_mahasiswa']; ?>"></div>
                        <tr class="bg-gray-100">
                            <td class="text-center py-8"><?= $count1++ ?></td>
                            <td class="font-bold pl-3"><?= $data_mbkm['judul'] ?><br>
                                <div class="flex mt-2">
                                    <label for="" class="font-bold">
                                        Bukti Pendukung :
                                    </label>
                                    <?php foreach ($data['bukti'] as $bukti) : ?>
                                        <?php if ($bukti['id_item_skpi'] == $data_mbkm['id_item_skpi']) : ?>
                                            <div class="bg-blue-800 w-8 h-8 py-1.5 px-2 rounded-md ml-2 hover:cursor-pointer" onclick="openPdfModal('<?= ROOTURL ?>/app/upload/<?= $bukti['file_name'] ?>')">
                                                <img class="w-4" src="<?= BASEURL ?>/images/Vector.png" alt="" >
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </td>
                            <td id="container" class="flex justify-evenly py-5">
                                <?php if ($data_mbkm['validasi'] == 0) { ?>
                                    <button data-id="<?= $id_item_skpi; ?>" class="layakButton bg-blue-500 w-full h-12/12 m-2 rounded-lg py-1 px-5 text-white hover:bg-blue-700 sm:w-5/12 sm:h-1/6">Layak</button>
                                <?php } else { ?>
                                    <button class="bg-gray-300 w-full h-12/12 m-2 rounded-lg py-1 px-5 text-white sm:w-5/12 sm:h-1/6">Layak</button>
                                <?php } ?>
                                    <button data-id="<?= $id_item_skpi; ?>" class="tidakLayakButton bg-red-500 w-full m-2 rounded-lg py-1 px-5 text-white hover:bg-red-700 sm:w-5/12" type="button">Tidak Layak</button>
                            </td>
                        </tr>
                        <?php
                    endif;
                endforeach;
                ?>
            </table>
        </div>
    </div>  
</div>
<div class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden" id="pdfOverlay" onclick="closePdfModal()"></div>

<div class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 bg-gray-100 p-5 rounded-md shadow-lg max-w-screen-lg w-full h-full overflow-auto hidden" id="pdfContainer">
    <span class="absolute top-1 right-1 text-2xl cursor-pointer" onclick="closePdfModal()"> &times; </span>
    <iframe class="w-full h-full" id="pdfViewer" frameborder="0"></iframe>
</div>
<script src="<?= BASEURL ?>/js/detail_validasi.js"></script>
<script src="<?= BASEURL ?>/js/update_validasi.js"></script>