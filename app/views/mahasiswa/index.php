<h1 class="m-5 text-2xl font-bold">Daftar Mahasiswa</h1>
<div class="m-5 p-3 border border-gray-800 rounded-xl w-4/12">
    <ul class="">
        <?php foreach( $data['mhs'] as $mhs ) : ?>
            <li class="my-3 flex justify-between">
                <?= $mhs['nama']; ?>
                <a class="bg-gray-800 text-white px-3 py-1 rounded-lg hover:bg-gray-400" href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id_mahasiswa']; ?>">detail</a>
            </li>
        <?php endforeach ?>    
    </ul>
</div>