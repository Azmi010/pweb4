<?php
    $files = $data['file_bukti'];
    var_dump($files);
?>

<section class="file_sect mt-16">
    <h1 class='text-2xl font-medium mb-8'>File Bukti</h1>

    <?php
    foreach ($files as $file_bukti) {
        $id_file_bukti = $file_bukti['id_file_bukti'];
        $file = $file_bukti['file_name'];
        $file_name_only = preg_split('/\d+_/', $file)[1];
    ?>

    <div class="mb-10">
    <embed src="../app/upload/<?= $file ?>">
    <span class="uploaded_file"><?= $file_name_only; ?></span>
    </div>
    
    <?php
    }
    ?>
</section>