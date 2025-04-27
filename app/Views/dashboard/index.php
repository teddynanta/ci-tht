<?php

require_once(APPPATH . 'Views/components/icons.php');
$photoUrl = session()->get('photo');
//membedah url apakah berisi null atau tidak
$photo = explode('/', $photoUrl);
$photo = $photo[4];
//store balance

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
  <nav class="bg-white shadow-md">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
      <div class="relative flex h-16 items-center justify-between">
        <div class="flex flex-1 items-baseline justify-center px-5 sm:items-stretch sm:justify-between">
          <div class="flex shrink-0 items-center">
            <img class="h-8 w-auto" src="<?= base_url('/images/logo.png') ?>" alt="HIS PPOB - Teddy Nanta">
            <span class="font-black ms-3">HIS PPOB - Teddy Nanta</span>
          </div>
          <div class="hidden sm:ml-6 sm:block">
            <div class="flex align-self-end space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-red-500 hover:text-white">Top Up</a>
              <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-red-500 hover:text-white">Transaksi</a>
              <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-red-500 hover:text-white">Akun</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-14 py-5">
    <div class="flex flex-row">
      <div class="w-1/2">
        <img src="<?= $photo == 'null' ? base_url('/images/Profile Photo.png') : $photoUrl ?>" alt="Photo Profile">
        <h1 class="mt-2">Selamat Datang, <br> <span class="text-black font-black text-3xl"><?= session()->get('user') ?></span></h1>
      </div>
      <div class="w-1/2">
        <div class="w-full bg-red-500 rounded-3xl px-10 py-5 text-white">
          <p>Saldo Anda</p>
          <h1
            class="font-black text-white text-4xl my-3"
            id="balance"
            data-visible="true"
            data-balance="Rp. <?= number_format($balance, 0, ',', '.') ?>">Rp. <?= number_format($balance, 0, ',', '.') ?></h1>
          <div class="flex space-x-2 items-center">
            <p>Lihat saldo</p>
            <button
              type="button"
              id="toggleBalanceButton"
              class="cursor-pointer text-gray-500 hover:text-gray-700">
              <!-- Eye open icon -->
              <?php renderIcon('eyeOpen', 'h-4 w-4 text-white'); ?>
              <!-- Eye closed icon -->
              <?php renderIcon('eyeClosed', 'h-4 w-4 hidden text-white'); ?>
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="flex justify-center px-2 sm:px-6 lg:px-14 max-w-7xl mt-10">
      <?php foreach ($services as $service) : ?>
        <div class="flex flex-col items-center m-2">
          <img class="h-12 w-12 object-contain" src="<?= $service['service_icon'] ?>" alt="<?= $service['service_name'] ?>">
          <p class="text-center text-sm mt-2"><?= $service['service_name'] ?></p>
        </div>
      <?php endforeach; ?>
    </div>
    <h2 class="mt-6 font-bold">Temukan promo menarik</h2>
    <div class="flex justify-center px-2 sm:px-6 lg:px-14 max-w-7xl mt-3">
      <?php foreach ($banners as $banner) : ?>
        <div class="flex flex-col items-center m-2">
          <img class="h-full w-full object-contain" src="<?= $banner['banner_image'] ?>" alt="<?= $banner['banner_name'] ?>">
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <form action="<?= site_url('logout') ?>" method="post">
    <?= csrf_field() ?>
    <button type="submit" class="cursor-pointer px-5 bg-red-500 text-white py-3 ms-10 rounded-lg shadow-sm hover:bg-red-600">Logout</button>
  </form>
  <script src="<?= base_url('js/script.js') ?>"></script>
</body>

</html>