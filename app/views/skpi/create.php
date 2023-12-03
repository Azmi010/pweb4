<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?= BASEURL ?>/css/output.css" />
    <link rel="stylesheet" href="<?= BASEURL ?>/css/style.css">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <title>Input Data SKPI</title>
  </head>

  <body class="bg-slate-200 my-5">
    <section class="bg-slate-50 px-20 pt-8 pb-16 w-4/5 m-auto shadow-xl rounded-2xl">
      <h1 class="text-2xl font-medium mb-4">Tambah Data SKPI</h1>
      <form action="<?= BASEURL ?>/?url=skpi" method="post" class="flex flex-col gap-1">
        <label for="judul">Judul</label>
        <input
          type="text"
          name="judul"
          id="judul"
          class="border-black border rounded focus:bg-slate-50 py-1 px-2"
        />

        <label for="tanggal">Tanggal Pelaksanaan</label>
        <input
          type="date"
          name="tanggal"
          id="tanggal"
          class="border-black border rounded focus:bg-slate-50 py-1 px-2"
        />

        <label for="tingkat">Level/Tingkat</label>
        <input
          type="text"
          name="tingkat"
          id="tingkat"
          class="border-black border rounded focus:bg-slate-50 py-1 px-2"
        />

        <label for="jenis">Jenis Kepesertaan</label>
        <input
          type="text"
          name="jenis"
          id="jenis"
          class="border-black border rounded focus:bg-slate-50 py-1 px-2"
        />

        <label for="juara">Juara</label>
        <input
          type="text"
          name="juara"
          id="juara"
          class="border-black border rounded focus:bg-slate-50 py-1 px-2"
        />

        <label for="peserta">Peserta</label>
        <input
          type="text"
          name="peserta"
          id="peserta"
          class="border-black border rounded focus:bg-slate-50 py-1 px-2"
        />

        <div class="mt-5">
          <button type="submit" name="submit" class="bg-green-600 text-gray-50 px-3 py-1 rounded w-min">
            Simpan
          </button>
          <a href="<?= BASEURL ?>/?url=skpi">
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
  </body>
</html>
