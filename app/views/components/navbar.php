<div class="bg-gray-800 w-full h-20 flex justify-between fixed top-0 shadow-xl">
  <div class="flex items-center ml-64">
      <div class="flex flex-col text-white mr-2">
          <p class="font-bold">
              SURAT KETERANGAN PENDAMPING IJAZAH
          </p>
          <p class="text-right text-xs">
              FAKULTAS ILMU KOMPUTER
          </p>
      </div>
      <!-- <img class="w-12" src="<?= BASEURL ?> . /images/Logo_UNEJ-removebg-preview.png" alt=""> -->
  </div>
  <div class="flex items-center mr-24">
      <img class="w-12" src="<?= BASEURL ?> . /images/user.png" alt="">
      <div class="flex-col text-white ml-2">
            <h3 class="font-medium">
                <?= $username ?>
            </h3>
            <h4 class="text-xs">
                <?= $nim ?>
            </h4>
      </div>
      <form action="<?= BASEURL ?>/?url=Login/logout" method="post">
          <button type="submit" class="ml-10 bg-red-600 px-2.5 py-1 rounded text-white hover:bg-red-800">Logout</button>
      </form>
  </div>
</div>