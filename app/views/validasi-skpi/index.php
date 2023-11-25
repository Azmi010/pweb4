<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validasi Data</title>
    <link rel="stylesheet" href="../../../public/output.css">
</head>
<body class="bg-gray-100">

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
    <div class="w-9/12 mx-auto my-10 border border-gray-400 rounded ">
        <div class="bg-gray-200 p-3 rounded">
            <h1>Daftar Prestasi & Pengalaman Mahasiswa</h1>
        </div>
        <div class="bg-white rounded">
            <form action="">
                <label for="" class="ml-1">Fakultas :</label>
                <select name="" id="" class="bg-gray-200 p-1 m-2 rounded">
                    <option value="" disabled selected>Fakultas Ilmu Komputer</option>
                    <option value="">a</option>
                    <option value="">b</option>
                </select><br>
                <label for="" class="ml-1">Keterangan :</label>
                <input type="radio" name="" id=""> Belum Validasi
                <input type="radio" name="" id=""> Sudah Validasi <br>
                <label for="" class="ml-1">Show</label>
                <select name="" id="" class="border border-gray-200 w-2/12">
                    <option value="" disabled selected>1</option>
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                </select>
                <label for="">entries</label>
                <label for="">Search:</label>
                <input type="text" name="" id="" class="border border-gray-300 rounded">
            </form>
        </div>
        <div class="rounded bg-white mx-1 my-1">
            <table class="w-full rounded">
                <tr class="border-b-2 border-gray-500 bg-blue-800 h-10">
                    <th class=" rounded-tl">NO.</th>
                    <th class="">NIM</th>
                    <th class="">NAMA</th>
                    <th class="">PRODI</th>
                    <th class="">Verifikator</th>
                    <th class="">STATUS</th>
                    <th class=" rounded-tr">Aksi</th>
                </tr>
                <tr class="text-center border-b border-gray-300">
                    <td class="">1.</td>
                    <td>222410102068</td>
                    <td>ULUL 'AZMI</td>
                    <td>Teknologi Informasi</td>
                    <td></td>
                    <td></td>
                    <td><button>ya</button></td>
                </tr>
            </table>
        </div>
        <div class="flex justify-between my-3 mx-1">
            <p class="flex-1">Showing 1 to 4 of 4 entries</p>
            <a href="" class="mr-4">Previous</a>
            <label for="" class="border border-gray-400 px-2">1</label>
            <a href="" class="mr-1 ml-4">Next</a>
        </div>
    </div>
    
</body>
</html>