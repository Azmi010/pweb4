<?php
  var_dump($data);
  var_dump($_FILES);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="<?= BASEURL ?>/css/style.css"> -->
    <script src="<?= BASEURL ?>/js/tailwind_3.3.5.js"></script>
    <script src="<?= BASEURL; ?>/js/jquery-3.7.1.js"></script>
    <script>
      const idKategori = 1;
      const idUnsur = 1;
    </script>
    <title>Edit Data SKPI</title>
  </head>

  <body class="bg-slate-200 my-5">
    <section class="bg-slate-50 px-20 pt-8 pb-16 w-4/5 m-auto shadow-xl rounded-2xl">
      <h1 class="text-2xl font-medium mb-4">Tambah Data SKPI</h1>
      <form id="prestasi-form" method="post" enctype="multipart/form-data" action="<?= BASEURL ?>/?url=skpi/editprestasi/" class="flex flex-col gap-1">
        <input type="hidden" name="id_item_skpi" value="<?= $data['id_item_skpi'] ?>">
        <input type="hidden" name="kategori" value="1">
        <input type="hidden" name="unsur" value="1">
        <label for="judul">Judul</label>
        <input 
        value="<?= $data['judul']; ?>"
          required
          type="text"
          name="judul"
          id="judul"
          class="border-black border rounded focus:bg-slate-50 py-1 px-2"
        />

        <label for="tanggal_pelaksanaan">Tanggal Pelaksanaan</label>
        <input 
        value="<?= $data['tanggal_pelaksanaan']; ?>"
          required
          type="date"
          name="tanggal_pelaksanaan"
          id="tanggal_pelaksanaan"
          class="border-black border rounded focus:bg-slate-50 py-1 px-2"
        />

        <label for="butir">Juara</label>
        <select required name="butir" id="butir" class="border-black border rounded focus:bg-slate-50 py-1 px-2">
          <?php foreach ($data['butir'] as $butir) { ?>
            <option value="<?= $butir['id_butir'] ?>"><?= $butir['nama_butir'] ?></option>
          <?php } ?>
        </select>

        <label for="sub_butir">Level/Tingkat</label>
        <select required name="sub_butir" id="sub_butir" class="border-black border rounded focus:bg-slate-50 py-1 px-2">
          <?php foreach ($data['sub_butir'] as $sub_butir) { ?>
            <option value="<?= $sub_butir['id_sub_butir'] ?>"><?= $sub_butir['nama_sub_butir'] ?></option>
          <?php } ?>
        </select>

        <label for='file_bukti'>File Bukti</label>
        <input type='file' accept='.pdf' name='file_bukti' id='file_bukti'>


        <div class="mt-5">
          <button type="submit" name="submit" class="bg-green-600 text-gray-50 px-3 py-1 rounded w-min">
            Simpan
          </button>
          <a href="<?= BASEURL ?>/?url=skpi/prestasi/">
            <button
              type="button"
              class="bg-red-600 text-gray-50 px-3 py-1 rounded w-min"
            >
              Batal
            </button>
          </a>
        </div>
      </form>
    </section>

  <script src="<?= BASEURL; ?>/js/index.js"></script>
  <!-- <script src="<?= BASEURL; ?>/js/edit-skpi.js"></script> -->
  </body>
</html>
