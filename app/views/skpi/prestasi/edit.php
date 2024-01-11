<?php
  $item_skpi = $data['item_skpi'];
  $id_poin = $item_skpi['id_poin'];
  $id_poin = preg_split("/[a-z]/", $id_poin);
  $id_unsur = $item_skpi['id_unsur'];
  $id_butir = $item_skpi['id_butir'];
  $id_sub_butir = $item_skpi['id_sub_butir'];
  $kategori = $_SESSION['item'];
  $judul_kategori = ($kategori == 'mbkm') ? strtoupper($kategori) : ucfirst($kategori);
  $tanggal_berakhir = isset($item_skpi['tanggal_berakhir']) ? $item_skpi['tanggal_berakhir'] : NULL;
?>

  <!-- <body class="bg-slate-200 my-5"> -->
    <section class="bg-slate-50 px-20 pt-8 pb-16 w-4/5 m-auto shadow-xl rounded-2xl mt-24">
      <h1 class="text-2xl font-medium mb-4">Edit Data <?= $judul_kategori; ?></h1>
      <form id="prestasi-form" method="post" enctype="multipart/form-data" action="<?= BASEURL ?>/?url=Skpi/editprestasi/" class="flex flex-col gap-1">
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
        <label for="tanggal_berakhir">Tanggal Berakhir</label>
        <input 
          <?php
            if (isset($tanggal_berakhir)) {
              echo " required ";
              echo " value='" . $tanggal_berakhir ."' ";
            }
            else {
              echo " disabled ";
            }
          ?>
          type="date"
          name="tanggal_berakhir"
          id="tanggal_berakhir"
          class="border-black border rounded focus:bg-slate-50 py-1 px-2"
        />
        <div>
          <label for="checkbox_enddate">Lebih dari satu hari</label>
          <input <?php
            if (isset($tanggal_berakhir)) echo ' checked ';
          ?> type="checkbox" name="checkbox_enddate" id="checkbox_enddate">
        </div>

        <label for="unsur">Unsur</label>
        <select required name="unsur" id="unsur" class="border-black border rounded focus:bg-slate-50 py-1 px-2">
        <?php foreach ($data['unsur']['options'] as $id => $text) { ?>
          <option value="u<?= $id; ?>" <?php if ($id == $id_unsur) echo 'selected'; ?>><?= $text; ?></option>
        <?php } ?>
        </select>

        <label for="butir">Butir</label>
        <select required name="butir" id="butir" class="border-black border rounded focus:bg-slate-50 py-1 px-2">
        <?php foreach ($data['butir']['options'] as $id => $text) { ?>
          <option value="b<?= $id; ?>" <?php if ($id == $id_butir) echo 'selected'; ?>><?= $text; ?></option>
        <?php } ?>
        </select>

        <label for="sub_butir">Sub Butir</label>
        <select required name="sub_butir" id="sub_butir" class="border-black border rounded focus:bg-slate-50 py-1 px-2">
        <?php foreach ($data['sub_butir']['options'] as $id => $text) { ?>
          <option value="s<?= $id; ?>" <?php if ($id == $id_sub_butir) echo 'selected'; ?>><?= $text; ?></option>
        <?php } ?>
        </select>

        <section class="peserta_sect">
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
        
        <section class="file_sect mt-3">
          <label for='file_bukti' >File Bukti</label>
          <button type="button" id="add_file" class="bg-green-600 text-gray-50 px-3 py-1 rounded w-min">Tambah</button>

          <?php
            foreach ($data['file_bukti'] as $file_bukti) {
              $id_file_bukti = $file_bukti['id_file_bukti'];
              $file = $file_bukti['file_name'];
              $file_name_only = preg_split('/\d+_/', $file)[1];
          ?>

          <div class="mt-1">
            <embed src="<?= ROOTURL; ?>/app/upload/<?= $file ?>">
            <span class="uploaded_file"><?= $file_name_only; ?></span>
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
          <a href="<?= BASEURL ?>/?url=Skpi/index/<?= $_SESSION['item']; ?>">
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

  <script>
    const idKategori = <?php
      switch ($kategori) {
        case 'prestasi':
          echo "'k1'";
          break;
        case 'kegiatan':
          echo "'k2'";
          break;
        case 'sertifikasi':
          echo "'k3'";
          break;
        case 'mbkm':
          echo "'k4'";
          break;
      }?>;
  </script>
  <script src="<?= BASEURL; ?>/js/index.js"></script>
  <script src="<?= BASEURL; ?>/js/swals.js"></script>
  <script src="<?= BASEURL; ?>/js/options.js"></script>
  <script src="<?= BASEURL; ?>/js/edit-skpi.js"></script>
  </body>
</html>
