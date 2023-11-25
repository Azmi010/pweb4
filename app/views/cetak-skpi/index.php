<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Dokumen SKPI</title>
    <link rel="stylesheet" href="../../../public/output.css">
</head>
<body class="bg-slate-100">
    
    <div class="w-full h-20 bg-blue-950 text-white flex justify-between">
        <div class="ml-20 flex gap-5 mt-4">
            <div>
                <h1>SISTEM INFORMASI AKADEMIK</h1>
                <h3 class="text-sm">UNIVERSITAS JEMBER</h3>
            </div>
            <div>
                <img src="logoweb.png" alt="" class="w-10">
            </div>
        </div>
        <div class="mr-20 flex gap-3 mt-4">
            <div>
                <img src="logoweb.png" alt="" class="w-10">
            </div>
            <div>
                <p>Ulul 'Azmi</p>
                <p class="text-xs">222410102068</p>
            </div>
        </div>
    </div>
    <div class="mx-auto my-10 w-9/12 border border-slate-300 rounded-xl bg-slate-200 p-2">
        <h1 class="text-center mb-2">
            PEMERIKSAAN BERKAS WISUDA
        </h1>
        <div class=" flex flex-row">
            <div class="flex-auto w-0.5 mr-2">
                <table>
                    <tr>
                        <td>Nama Mahasiswa</td>
                        <td>: Ulul 'Azmi</td>
                    </tr>
                    <tr>
                        <td>Nim</td>
                        <td>: 222410102068</td>
                    </tr>
                </table>
                <div class="bg-white p-1 rounded">
                    <table class="w-full rounded-t text-white bg-blue-950 mb-3">
                        <tr>
                            <th colspan="4" class="">TOEFL</th>
                        </tr>
                        <tr>
                            <td class="border border-white">#</td>
                            <td class="border border-white">Nilai</td>
                            <td class="border border-white">Sertifikat</td>
                            <td class="border border-white">Keterangan</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="bg-white flex-auto w-0.5 flex-row ml-2 mr-10 rounded">
                <div class="border border-gray-500 mx-7 mt-7">
                    <img class="mx-auto" src="logoweb.png" alt="">
                </div>
                <button class="border border-black rounded bg-slate-100 px-1.5 ml-7 mt-1">
                    Choose file
                </button>
                <div class="border border-gray-500 mx-7 mt-1">
                    <img class="mx-auto" src="logoweb.png" alt="">
                </div>
                <button class="border border-black rounded bg-slate-100 px-1.5 ml-7 my-1">
                    Choose file
                </button>
                <button class="border border-black rounded px-1.5 float-right mr-7 my-1">
                    upload
                </button>
            </div>
        </div><hr class="my-4 border-t-2 border-blue-200">
        <div class="flex flex-row">
            <form action="" class="leading-10 flex-auto">
                <label for="">KELENGKAPAN WISUDA</label><br>
                <label for="">Form Pendaftaran*</label>
                <input type="checkbox" name="" id=""><br>
                <label for="">Scan Pas Foto*</label>
                <input type="checkbox" name="" id=""><br>
                <label for="">Scan Ijasah Terakhir*</label>
                <input type="checkbox" name="" id=""><br>
                <label for="">Bukti Bebas Tanggungan (Perpustakaan)*</label>
                <input type="checkbox" name="" id=""><br>
                <label for="">
                    Sudah Menyerahkan Skripsi (Perpustakaan)
                    <input type="radio" name="" id="">Sudah<br>
                    <input type="radio" name="" id="">Belum
                </label><br>
                <label for="">Tanggungan Lainnya (Perpustakaan)</label>
                <textarea name="" id=""></textarea><br>
                <label for="">Bukti Bebas Tanggungan (Fakultas)*</label>
                <input type="checkbox" name="" id=""><br>
                <label for="">
                    Sudah Menyerahkan Skripsi (Fakultas)*
                    <input type="radio" name="" id="">Sudah<br>
                    <input type="radio" name="" id="">Belum
                </label><br>
                <label for="">Tanggungan Lainnya</label>
                <textarea name="" id=""></textarea><br>
                <label for="">Pemeriksaan Transkrip*</label>
                <input type="checkbox" name="" id="">
                <label for="">Jumlah Sks / Ipk / Pp</label>
                <label for="">3.92 / 146</label><br>
                <label for="">Nomor Ijazah Nasional (NIN)</label>
                <input type="text" name="" id="" class="h-6"><br>
                <label for="">No Transkrip*</label>
                <input type="text" name="" id="" class="h-6"><br>
                <label for="">No SK Yudisium*</label>
                <input type="text" name="" id="" class="h-6"><br>
                <label for="">No SKPI</label>
                <input type="text" name="" id="" class="h-6"><br>
                <label for="">Tgl SK Yudisium*</label>
                <input type="text" name="" id="" class="h-6"><br>
                <label for="">Konsentrasi</label>
                <select name="" id="">
                    <option value="" disabled selected>Pilih Konsentrasi</option>
                    <option value="">a</option>
                    <option value="">b</option>
                </select><br>
                <button class="bg-blue-700 rounded px-3 hover:bg-blue-500">Simpan >></button>
            </form>
            <div class="flex-auto">
                <button class="bg-blue-900 rounded px-3 py-1 text-white">Update Biodata</button><br><br>
                <a href="" class="text-blue-800">Download Ijasah Terakhir</a>
            </div>
        </div>
    </div>
    
</body>
</html>