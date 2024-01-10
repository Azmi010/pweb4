<aside class="fixed top-0 left-0 w-64 h-screen" aria-label="Sidebar">
   <div class="sidebar hidden h-full px-3 py-6 overflow-y-auto bg-gray-800 dark:bg-gray-800 transition-transform duration-500 transform -translate-x-full md:translate-x-0">
      <button class="mb-10" onclick="closeSidebar()"><img class="w-8 ml-48" src="<?= BASEURL ?>/images/Close_round_light.png"></button>
      <ul class="space-y-2 font-medium">
         <li>
            <a href="<?= BASEURL ?>/?url=Skpi/index/" class="flex items-center p-2 text-white hover:text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <span class="ms-3">Home</span>
            </a>
         </li>
         <li>
            <a href="<?= BASEURL ?>/?url=Skpi/index/prestasi/" class="flex items-center p-2 text-white hover:text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <span class="ms-3">Prestasi</span>
            </a>
         </li>
         <li>
            <a href="<?= BASEURL ?>/?url=Skpi/index/kegiatan/" class="flex items-center p-2 text-white hover:text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <span class="flex-1 ms-3 whitespace-nowrap">Keikutsertaan Kegiatan</span>
            </a>
         </li>
         <li>
            <a href="<?= BASEURL ?>/?url=Skpi/index/sertifikasi/" class="flex items-center p-2 text-white hover:text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <span class="flex-1 ms-3 whitespace-nowrap">Sertifikasi kompetensi</span>
            </a>
         </li>
         <li>
            <a href="<?= BASEURL ?>/?url=Skpi/index/mbkm/" class="flex items-center p-2 text-white hover:text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <span class="flex-1 ms-3 whitespace-nowrap">MBKM</span>
            </a>
         </li>
      </ul>
   </div>
</aside>