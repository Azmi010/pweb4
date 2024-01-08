<?php
    $kategori = $_SESSION['item'];
    $judul_kategori = ($kategori == 'mbkm') ? strtoupper($kategori) : ucfirst($kategori);

?>

  <body class="bg-slate-200 my-5">
    <section class="bg-slate-50 px-20 pt-8 pb-16 w-4/5 m-auto shadow-xl rounded-2xl mt-24">
      <h1 class="text-2xl font-medium mb-4">Tambah Data <?= $judul_kategori; ?></h1>
      <form id="prestasi-form" method="post" enctype="multipart/form-data" action="<?= BASEURL ?>/?url=skpi/addprestasi/" class="flex flex-col gap-1">
        <label for="judul">Judul</label>
        <input 
          required
          type="text"
          name="judul"
          id="judul"
          class="border-black border rounded focus:bg-slate-50 py-1 px-2"
        />

        <label for="tanggal_pelaksanaan">Tanggal Pelaksanaan</label>
        <input 
          required
          type="date"
          name="tanggal_pelaksanaan"
          id="tanggal_pelaksanaan"
          class="border-black border rounded focus:bg-slate-50 py-1 px-2"
        />
        <label for="tanggal_berakhir">Tanggal Berakhir</label>
        <input 
          disabled
          type="date"
          name="tanggal_berakhir"
          id="tanggal_berakhir"
          class="border-black border rounded focus:bg-slate-50 py-1 px-2"
        />
        <div>
          <label for="checkbox_enddate">Lebih dari satu hari</label>
          <input type="checkbox" name="checkbox_enddate" id="checkbox_enddate">
        </div>
<?php
  $is_mbkm = $_SESSION['item'] == 'mbkm';
?>
        <label for="unsur">Unsur</label>
        <select required name="unsur" id="unsur" class="border-black border rounded focus:bg-slate-50 py-1 px-2">
        </select>
        
        <label for="butir">Butir</label>
        <select required name="butir" id="butir" class="border-black border rounded focus:bg-slate-50 py-1 px-2">
        </select>

        <label for="sub_butir">Sub Butir</label>
        <select required name="sub_butir" id="sub_butir" class="border-black border rounded focus:bg-slate-50 py-1 px-2">
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
              class="border-black border rounded focus:bg-slate-50 py-1 px-2"
              />
              <button type="button" id="add_peserta" class="bg-green-600 text-gray-50 px-3 py-1 rounded w-min">Tambah</button>
            </div>
          </section>

          <section class="file_sect">
            <label>File Bukti</label>
            <div>
              <input required type='file' accept='image/*,.pdf' name='file_bukti[]' id='file_bukti' class="file_bukti border border-black rounded py-1 px-2">
              <button type="button" id="add_file" class="bg-green-600 text-gray-50 px-3 py-1 rounded w-min">Tambah</button>
            </div>
          </section>

        <div class="mt-5">
          <button type="submit" name="submit" class="bg-green-600 text-gray-50 px-3 py-1 rounded w-min">
            Simpan
          </button>
          <a href="<?= BASEURL ?>/?url=skpi/index/<?= $_SESSION['item']; ?>">
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
  <script src="<?= BASEURL; ?>/js/options.js"></script>
  <script src="<?= BASEURL; ?>/js/add-skpi.js"></script>
  </body>
</html>
