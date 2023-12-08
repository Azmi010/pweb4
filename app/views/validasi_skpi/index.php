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
                <div class="mt-5 flex justify-between">
                    <div class="flex">
                        <label for="" class="ml-1">Show</label>
                        <select name="" id="" class="border border-gray-200 w-48 mx-2 rounded">
                            <option value="" disabled selected>1</option>
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                        </select>
                        <label for="">entries</label>
                    </div>
                    <div>
                        <label for="">Search:</label>
                        <input type="text" name="" id="" class="border border-gray-300 rounded">
                    </div>
                </div>
            </form>
        </div>
        <div class="rounded bg-white px-3 pt-5 pb-1">
            <table class="w-full rounded shadow-md mb-3">
                <tr class="border-b-2 border-gray-500 bg-gray-800 h-10 text-white">
                    <th class=" rounded-tl px-2">NO.</th>
                    <th class="">NIM</th>
                    <th class="font-sans">NAMA</th>
                    <th class="">PRODI</th>
                    <th class="">STATUS</th>
                    <th class=" rounded-tr px-2">Aksi</th>
                </tr>
                <?php 
                $count = 1;
                foreach ($data['mhs'] as $mhs) :
                ?>
                    <tr class="text-center border-b border-gray-300">
                    <td class="py-2"><?= $count++; ?></td>
                    <td><?= $mhs['nim'] ?></td>
                    <td><a class=" hover:text-purple-800 hover:underline" href="<?= BASEURL ?>/?url=validasi/detail_validasi/<?= $mhs['id_mahasiswa']; ?>"><?= $mhs['nama'] ?></a></td>
                    <td><?= $mhs['nama_prodi'] ?></td>
                    <td></td>
                    <td><button>ya</button></td>
                </tr>
                <?php endforeach ?>
            </table>
        </div>
        <div class="flex justify-between pb-3 px-3 bg-white rounded-md">
            <p class="flex-1">Showing 1 to 4 of 4 entries</p>
            <a href="" class="mr-4">Previous</a>
            <label for="" class="border border-gray-400 px-2">1</label>
            <a href="" class="mr-1 ml-4">Next</a>
        </div>
    </div>
</div>