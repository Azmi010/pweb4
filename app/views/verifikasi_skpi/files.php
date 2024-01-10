<?php
    $files = $data['file_bukti'];
    var_dump($files);
?>

<section class="file_sect mt-16 px-8">
    <h1 class='text-2xl font-medium mb-8'>File Bukti</h1>

    <?php
    foreach ($files as $file_bukti) {
        $id_file_bukti = $file_bukti['id_file_bukti'];
        $file = $file_bukti['file_name'];
        $file_name_only = preg_split('/\d+_/', $file)[1];
    ?>

    <div class="mb-4">
    <!-- <embed src="../app/upload/<?= $file ?>"> -->
    <span class="uploaded_file"><?= $file_name_only; ?></span>
    <button class="bg-green-600 text-gray-50 px-3 py-1 rounded w-min" type="button" onclick="openPdfModal('../app/upload/<?= $file ?>')">Buka</button>
    </div>
    
    <?php
    }
    ?>
</section>
<div class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 bg-gray-100 p-5 rounded-md shadow-lg max-w-screen-lg w-full h-full overflow-auto hidden" id="pdfContainer">
    <span class="absolute top-1 right-1 text-2xl cursor-pointer" onclick="closePdfModal()"> &times; </span>
    <iframe class="w-full h-full" id="pdfViewer" frameborder="0"></iframe>
</div>

<script src="<?= BASEURL ?>/js/detail_validasi.js"></script>
</body>
</html>