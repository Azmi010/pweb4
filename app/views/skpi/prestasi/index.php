<?php
    setlocale (LC_TIME, 'id_ID');
    // setlocale (LC_ALL, 'INDONESIA');
    // $fmt = datefmt_create('id_ID', IntlDateFormatter::LONG, IntlDateFormatter::LONG);
    $item_skpi = $data['item_skpi'];
    $kategori = $_SESSION['item'];
    $judul_kategori = ($kategori == 'mbkm') ? strtoupper($kategori) : ucfirst($kategori);
?>
    <section class="p-4 mt-12">
      <div class="flex justify-between px-8 mt-10 mb-4">
        <h1 class="text-4xl font-medium">Daftar <?= $judul_kategori; ?></h1>
        <a href="<?= BASEURL ?>/?url=skpi/add/<?= $_SESSION['item']; ?>" type="button" class="bg-green-600 text-white px-3 py-2 rounded-lg">Tambah Data</a>
      </div>

      <table id="item-table" class="w-full border-collapse table-auto mb-14 pt-4 shadow-lg">
        <thead class="text-blue-50">
          <tr class="bg-gray-800">
            <th class="rounded-tl-lg">Nama <?= $judul_kategori ?></th>
            <th>Tanggal Pelaksanaan</th>
            <th>Keterangan</th>
            <th>Approval</th>
            <th class="rounded-tr-lg">Aksi</th>
          </tr>
        </thead>
        <tbody class="rounded-b-xl border-white bg-white">
          <?php
            if (isset($item_skpi)) {
              foreach ($item_skpi as $skpi) {
                $id_poin = $skpi['id_poin'];
                $id_poin = preg_split("/[a-z]/", $id_poin);
                $id_unsur = $id_poin[2] - 1;
                $id_butir = $id_poin[3] - 1;
                $id_sub_butir = $id_poin[4] - 1;
                $tanggal_berakhir = isset($skpi['tanggal_berakhir']) ? $skpi['tanggal_berakhir'] : NULL;
                $tanggal_pelaksanaan_fmt = strtotime($skpi['tanggal_pelaksanaan']);
                $tanggal_pelaksanaan_fmt = strftime( "%e %b %Y", $tanggal_pelaksanaan_fmt);
                // $tanggal_pelaksanaan_fmt = datefmt_format($tanggal_pelaksanaan_fmt, $fmt);
            ?>
            <tr class="item_row">
              <td>
              <?php 
                $judul = $skpi['judul'];
                $max_len = 48;
                if(strlen($judul) > $max_len)
                  $judul = substr($judul, 0, $max_len) . '...';
                echo $judul; 
              ?>
              </td>
              <td><?= $tanggal_pelaksanaan_fmt ?>
              <?php
                if (isset($tanggal_berakhir)) {
                  $tanggal_berakhir_fmt = strtotime($skpi['tanggal_berakhir']);
                  $tanggal_berakhir_fmt = strftime( "%e %b %Y", $tanggal_berakhir_fmt);
                  echo "<br> s.d. <br>" . $tanggal_berakhir_fmt;
                }
              ?>
              </td>
              <td>
                <ul>
                  <li class="flex">
                    <h4 class="font-medium">Unsur: </h4> 
                    <?php 
                    $nama_unsur = isset($data['unsur'][$id_unsur]) ? $data['unsur'][$id_unsur]['nama_unsur'] : " - ";
                    echo " $nama_unsur";
                    ?>
                  </li>
                  <li class="flex">
                    <h4 class="font-medium">Butir: </h4> 
                    <?php 
                    $nama_butir = isset($data['butir'][$id_butir]) ? $data['butir'][$id_butir]['nama_butir'] : " - ";
                    echo " $nama_butir";
                    ?>
                  </li>
                  <li class="flex">
                    <h4 class="font-medium">Sub Butir: </h4> 
                    <?php 
                    $nama_sub_butir = isset($data['sub_butir'][$id_sub_butir]) ? $data['sub_butir'][$id_sub_butir]['nama_sub_butir'] : " - "; 
                    echo " $nama_sub_butir";
                    ?>
                  </li>
                </ul>
              </td>
              <?php if ($skpi['validasi'] == 0) { ?>
              <td class="bg-yellow-400">Belum Disetujui</td>
              <?php } else { ?>
              <td class="bg-green-400">Disetujui</td> 
              <?php } ?>
              <td>
                <a href="<?= BASEURL; ?>/?url=skpi/edit/<?= $_SESSION['item']; ?>/<?= $skpi['id_item_skpi']; ?>">
                  <button class="bg-orange-400 px-3 py-1 rounded">Edit</button>
                </a>
                <!-- <a onclick="deleteConfirm()" href="<?= BASEURL; ?>/?url=Skpi/delete/<?= $skpi['id_item_skpi']; ?>"></a> -->
                <button type="button" data-id="<?= $skpi['id_item_skpi']; ?>" class="bg-red-600 px-3 py-1 rounded delete_item">Hapus</button>
              </td>
            </tr>
          <?php
              } 
            }
          ?>
        </tbody>
      </table>

  </section> 

  <?php
    // var_dump($item_skpi);
  ?>
  <script src="<?= BASEURL; ?>/js/swals.js"></script>
  <script src="<?= BASEURL; ?>/js/pagination.js"></script>
  </body>
</html>
