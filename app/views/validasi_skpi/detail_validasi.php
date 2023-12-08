<div class="bg-gray-100">
    <div class="mt-20">
        <div class="w-full h-20 px-20 py-5 font-bold text-xl">
            <h1>Validasi Informasi Tambahan pada SKPI</h1>
        </div>
        <div class="bg-white rounded-t-xl mx-7 p-5">
            <p class=" text-sm font-medium">Fitur untuk memvalidasi Prestasi, Keikutsertaan Kegiatan & Organisasi, dan Sertifikat Kompetensi</p>
        </div>
        <?php foreach ($data['mhs'] as $data) : ?>
            <?php if ($data['id_kategori'] == 1) : ?>
                <div class="bg-white mx-7 px-5 pb-3">
                    <h2 class="font-semibold text-lg">3.2.1 Prestasi/Penghargaan</h2>
                    <table class="w-full">
                        <tr class="bg-gray-800 text-white">
                            <th class="py-2">No.</th>
                            <th class="">Nama Prestasi</th>
                            <th class="w-3/12">Aksi</th>
                        </tr>
                        <tr class="bg-gray-100">
                            <td class="text-center py-10">1.</td>
                            <td class="font-bold"><?= $data['judul'] ?><br>
                                Juara 1 Dyah Kabupaten Magetan (Duta Pariwisata Kabupaten Magetan) <br>
                                <div class="flex">
                                    <label for="" class="font-bold">
                                        Bukti Pendukung : <?= $data['file_bukti'] ?>
                                    </label>
                                    <div class="btn-color w-12 h-8 py-1.5 px-4 rounded-md ml-2 hover:cursor-pointer">
                                        <img src="../../../public/images/Vector.png" alt="">
                                    </div>
                                </div>
                            </td>
                            <td class="flex justify-evenly">
                                <div class="border border-acc border-dashed w-5/12 m-2 rounded-lg p-1">
                                    <input class="" type="radio" name="" id=""> Layak
                                </div>
                                <div class="border border-cancel border-dashed w-5/12 m-2 rounded-lg p-1">
                                    <input type="radio" name="" id=""> Tidak Layak
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            <?php endif; ?>
            <?php if ($data['id_kategori'] == 2) : ?>
                <div class="bg-white mx-7 px-5 py-3">
                <h2 class="font-semibold text-lg">3.2.2 Keikutsertaan dalam Kegiatan dan Organisasi</h2>
                <table class="w-full">
                    <tr class="bg-gray-800 text-white">
                        <th class="py-2">No.</th>
                        <th class="">Judul</th>
                        <th class="w-3/12">Aksi</th>
                    </tr>
                    <tr class="bg-gray-100">
                        <td class="text-center py-10">1.</td>
                        <td class="font-bold"><?= $data['judul'] ?> <br>
                            Juara 1 Dyah Kabupaten Magetan (Duta Pariwisata Kabupaten Magetan) <br>
                            <div class="flex">
                                <label for="" class="font-bold">
                                    Bukti Pendukung : <?= $data['file_bukti'] ?>
                                </label>
                                <div class="btn-color w-12 h-8 py-1.5 px-4 rounded-md ml-2 hover:cursor-pointer">
                                    <img src="../../../public/images/Vector.png" alt="">
                                </div>
                            </div>
                        </td>
                        <td class="flex justify-evenly">
                            <div class="border border-acc border-dashed w-5/12 m-2 rounded-lg p-1">
                                <input class="" type="radio" name="" id=""> Layak
                            </div>
                            <div class="border border-cancel border-dashed w-5/12 m-2 rounded-lg p-1">
                                <input type="radio" name="" id=""> Tidak Layak
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <?php endif; ?>
            <?php if ($data['id_kategori'] == 3) : ?>
                <div class="bg-white mx-7 px-5 py-3 rounded-b-xl mb-5">
                <h2 class="font-semibold text-lg">3.2.3 Sertifikasi Kompetensi</h2>
                <table class="w-full">
                    <tr class="bg-gray-800 text-white">
                        <th class="py-2">No.</th>
                        <th class="">Nama Prestasi</th>
                        <th class="w-3/12">Aksi</th>
                    </tr>
                    <tr class="bg-gray-100">
                        <td class="text-center py-10">1.</td>
                        <td class="">Juara I - <span class="font-bold">Tingkat Kab/Kota</span> <br>
                            Juara 1 Dyah Kabupaten Magetan (Duta Pariwisata Kabupaten Magetan) <br>
                            <div class="flex">
                                <label for="" class="font-bold">
                                    Bukti Pendukung : 
                                </label>
                                <div class="btn-color w-12 h-8 py-1.5 px-4 rounded-md ml-2 hover:cursor-pointer">
                                    <img src="../../../public/images/Vector.png" alt="">
                                </div>
                            </div>
                        </td>
                        <td class="flex justify-evenly">
                            <div class="border border-acc border-dashed w-5/12 m-2 rounded-lg p-1">
                                <input class="" type="radio" name="" id=""> Layak
                            </div>
                            <div class="border border-cancel border-dashed w-5/12 m-2 rounded-lg p-1">
                                <input type="radio" name="" id=""> Tidak Layak
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>  
</div>