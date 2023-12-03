<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Halaman <?= $data['judul']; ?></title>
    <link rel="stylesheet" href="<?= BASEURL ?>/output.css">
</head>
<body class="bg-gray-100">

<div class="bg-gray-800 w-full h-20 flex justify-between fixed top-0">
  <div class="flex items-center ml-24">
      <div class="flex flex-col text-white mr-2">
          <p class="font-bold">
              SISTEM INFORMASI AKADEMIK
          </p>
          <p class="text-right text-xs">
              UNIVERSITAS JEMBER
          </p>
      </div>
      <img class="w-16" src="<?= BASEURL ?> . /images/Logo_UNEJ-removebg-preview.png" alt="">
  </div>
  <div class="flex items-center mr-24">
      <img class="w-16" src="<?= BASEURL ?> . /images/toga-asset.webp" alt="">
      <div class="flex-col text-white ml-2">
          <h3 class="font-medium">
              Nama
          </h3>
          <h4 class="text-xs">
              Nim/Nip
          </h4>
      </div>
  </div>
</div>