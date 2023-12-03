<div class="bg-gray-100">
    <div class="w-9/12 mx-auto mt-36 border border-gray-200 rounded-md shadow-md">
        <div class="bg-gray-100 px-4 py-3 h-auto rounded font-medium text-lg">
            <h1>Daftar Persetujuan Wakil Dekan III</h1>
        </div>
        <div class="bg-white px-3">
            <form action="">
                <div class="pt-3">
                    <label for="" class="ml-1 mr-1">Status :</label>
                    <input type="radio" name="" id=""> Belum Persetujuan
                    <input type="radio" name="" id=""> Sudah Persetujuan <br>
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
                    <th class=" rounded-tl font-sans">NO.</th>
                    <th class="">NIM</th>
                    <th class="font-sans">NAMA</th>
                    <th class="">PROGRAM STUDI</th>
                    <th class="">Verifikator</th>
                    <th class="">DETAIL</th>
                </tr>
                <tr class="text-center border-b border-gray-300">
                    <td class="py-2">1.</td>
                    <td>222410102068</td>
                    <td><a class=" hover:text-purple-800 hover:underline" href="<?= BASEURL ?>/persetujuan/draft_skpi">ULUL 'AZMI</a></td>
                    <td>Teknologi Informasi</td>
                    <td>Dr. Agustina Dewi Setyari, S.S., M.Hum.</td>
                    <td>
                        <div class="flex items-center justify-center">
                            <a href="../draft-skpi/"><img class="w-5 hover:cursor-pointer" src="../../../public/images/dotpoints-01.png" alt=""></a>
                        </div>
                    </td>
                </tr>
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