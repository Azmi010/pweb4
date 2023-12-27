<?php
  $item_skpi = $data['item_skpi'];
  $id_poin = $item_skpi['id_poin'];
  $id_poin = preg_split("/[a-z]/", $id_poin);
  $id_butir = $id_poin[3];
  $id_sub_butir = $id_poin[4];
  
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
      const idKategori = 'k1';
      const idUnsur = 'u1';
    </script>
    <title>Edit Data SKPI</title>
  </head>

  <body class="bg-slate-200 my-5">
    <section class="bg-slate-50 px-20 pt-8 pb-16 w-4/5 m-auto shadow-xl rounded-2xl mt-24">
      <h1 class="text-2xl font-medium mb-4">Tambah Data SKPI</h1>
      <form id="prestasi-form" method="post" enctype="multipart/form-data" action="<?= BASEURL ?>/?url=skpi/editprestasi/" class="flex flex-col gap-1">
        <input type="hidden" name="id_item_skpi" value="<?= $item_skpi['id_item_skpi'] ?>">
        <!-- <input type="hidden" name="kategori" value="1">
        <input type="hidden" name="unsur" value="1"> -->
        <label for="judul">Judul</label>
        <input 
        value="<?= $item_skpi['judul']; ?>"
          required
          type="text"
          name="judul"
          id="judul"
          class="border-black border rounded focus:bg-slate-50 py-1 px-2"
        />

        <label for="tanggal_pelaksanaan">Tanggal Pelaksanaan</label>
        <input 
        value="<?= $item_skpi['tanggal_pelaksanaan']; ?>"
          required
          type="date"
          name="tanggal_pelaksanaan"
          id="tanggal_pelaksanaan"
          class="border-black border rounded focus:bg-slate-50 py-1 px-2"
        />

        <label for="butir">Juara</label>
        <select required name="butir" id="butir" class="border-black border rounded focus:bg-slate-50 py-1 px-2">
          <?php foreach ($data['butir'] as $butir) { ?>
            <option value="b<?= $butir['id_butir'] ?>" <?php if ($butir['id_butir'] == $id_butir) echo 'selected'; ?> ><?= $butir['nama_butir'] ?></option>
          <?php } ?>
        </select>

        <label for="sub_butir">Level/Tingkat</label>
        <select required name="sub_butir" id="sub_butir" class="border-black border rounded focus:bg-slate-50 py-1 px-2">
          <?php foreach ($data['sub_butir'] as $sub_butir) { ?>
            <option value="s<?= $sub_butir['id_sub_butir'] ?>" <?php if ($sub_butir['id_sub_butir'] == $id_sub_butir) echo 'selected'; ?> ><?= $sub_butir['nama_sub_butir'] ?></option>
          <?php } ?>
        </select>

        <section class="peserta_sect">
          <?php
            
          ?>
          <label>Peserta</label>
          
          <div>
            <input 
            required
            readonly
            value="<?= $data['nim']; ?>"
            type="text"
            name="peserta[]"
            class="peserta_input border-black border rounded bg-neutral-300 py-1 px-2"
            />
            <button type="button" id="add_peserta" class="bg-green-600 text-gray-50 px-3 py-1 rounded w-min">Tambah</button>
          </div>

          <?php
            foreach ($data['peserta'] as $peserta) {
              $nim = $peserta['nim_peserta'];
              if ($nim == $data['nim']) continue;
              $id_peserta_item = $peserta['id_peserta_item'];
          ?>
          <div class="mt-1">
            <input required type="number" name="peserta[]" class="peserta_input border-black border rounded focus:bg-slate-50 py-1 px-2" value="<?= $nim; ?>"/>
            <button type='button' class="remove_peserta bg-red-600 text-gray-50 px-3 py-1 rounded w-min" data-idpi="<?= $id_peserta_item; ?>">Hapus</button>
          </div>
          <?php
            }
            ?>
        </section>
        
        <section class="file_sect">
          <label for='file_bukti'>File Bukti</label>
          <button type="button" id="add_file" class="bg-green-600 text-gray-50 px-3 py-1 rounded w-min">Tambah</button>

          <?php
            foreach ($data['file_bukti'] as $file_bukti) {
              $id_file_bukti = $file_bukti['id_file_bukti'];
              $file = $file_bukti['file_name'];
              $file_name_only = preg_split('/\d+_/', $file)[1];
          ?>

          <div class="mt-1">
            <embed src="../app/upload/<?= $file ?>">
            <span><?= $file_name_only; ?></span>
            <!-- <input required type='file' accept='image/*,.pdf' name='file_bukti[]' class="file_bukti border border-black rounded py-1 px-2"> -->
            <button type="button" class="remove_file bg-red-600 text-gray-50 px-3 py-1 rounded w-min" data-idfb="<?= $id_file_bukti; ?>">Hapus</button>
          </div>
          
          <?php
            }
          ?>
        </section>


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
  <script src="<?= BASEURL; ?>/js/edit-skpi.js"></script>
  </body>
</html>
