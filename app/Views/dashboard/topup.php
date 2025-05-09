<?php

require_once(APPPATH . 'Views/components/icons.php');
$photoUrl = session()->get('photo');
//membedah url apakah berisi null atau tidak
$photo = explode('/', $photoUrl);
$photo = $photo[4];

$errors = session()->getFlashdata('error_validations') ?? [];

$page = 'Top Up';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Top up HIS PPOB - Teddy Nanta</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
  <!-- Modal for Confirmation Dialog -->
  <div id="confirmationModal" class="fixed inset-0 flex items-center hidden bg-gray-900/50 justify-center z-50">
    <div class="bg-white rounded-lg p-5 w-96 shadow-md">
      <img id="modalType" src="<?= base_url('/images/logo.png ') ?>" class="mx-auto h-15 w-15" alt="logo">
      <p class="text-center text-gray-600 text-lg mt-3">Anda yakin untuk Top Up senilai</p>
      <p id="amountConfirmation" class="text-center font-black text-3xl"></p>
      <div class="flex flex-col justify-center mt-5">
        <a id="confirmButton" class="px-5 py-2 text-red-500 text-center font-bold cursor-pointer text-sm rounded-md">Ya Lanjutkan Top Up</a>
        <a id="cancelButton" class="px-5 py-2 text-center text-gray-300 font-bold cursor-pointer text-sm rounded-md">Batalkan</a>
        <button id="closeMessageButton" class="px-5 py-2 text-white mt-5 bg-red-500 font-bold cursor-pointer text-sm rounded-md">close</button>
      </div>
    </div>
  </div>

  <!-- Modal for Success/Error Message -->
  <div id="messageModal" class="fixed inset-0 flex items-center hidden bg-gray-900/50 justify-center z-50">
    <div class="bg-white rounded-lg p-5 w-96 shadow-md">
      <img id="modalType" class="mx-auto h-15 w-15" alt="logo">
      <p id="messageTitle" class="text-center text-gray-600 text-lg mt-3"></p>
      <p class="text-center font-black text-3xl">Rp. <?= number_format(old('amount'), 0, '', '.') ?></p>
      <p id="messageBody" class="text-center text-gray-600 text-lg mt-3"></p>
      <div class="flex flex-col justify-center mt-5">
        <a href="/dashboard" class="px-5 py-2 text-red-500 text-center font-bold cursor-pointer text-sm rounded-md">Kembali ke dashboard</a>
        <button id="closeMessageButton" class="px-5 py-2 text-white mt-5 bg-red-500 font-bold cursor-pointer text-sm rounded-md">close</button>
      </div>
    </div>
  </div>
  <nav class="bg-white shadow-md">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
      <div class="relative flex h-16 items-center justify-between">
        <div class="flex flex-1 items-baseline justify-center px-5 sm:items-stretch sm:justify-between">
          <div class="flex shrink-0 items-center">
            <a href="/dashboard" class="flex flex-row items-center">
              <img class="h-8 w-auto" src="<?= base_url('/images/logo.png') ?>" alt="HIS PPOB - Teddy Nanta">
              <span class="font-black ms-3">HIS PPOB - Teddy Nanta</span>
            </a>
          </div>
          <div class="hidden sm:ml-6 sm:block">
            <div class="flex align-self-end space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="#" class="rounded-md bg-red-500 px-3 py-2 text-sm font-medium text-white hover:bg-red-600 hover:text-white">Top Up</a>
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
    <h1 class="mt-10">Silahkan masukkan <br> <span class="text-black font-bold text-xl">Nominal Top Up</span></h1>
    <div class="flex flex-row mt-5">
      <div class="w-3/5 me-5">
        <form id="topUpForm" action="/topup" method="post">
          <?= csrf_field() ?>
          <div>
            <div class="relative mt-2">
              <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <?php renderIcon('wallet', 'form-icon w-4 h-4 text-gray-400'); ?>
              </div>
              <input
                type="text"
                inputmode="numeric"
                name="amount"
                id="amount"
                required
                value="<?= old('amount') ?>"
                class="form-input border <?= isset($errors['amount']) ? 'border-red-500' : 'border-gray-300' ?> block w-full rounded-md bg-white ps-9 px-3 py-2 text-base text-gray-900 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-red-600 sm:text-sm"
                placeholder="nominal top up minimal Rp. 10.000 maksimal Rp. 1.000.000">
            </div>
            <?php if (isset($errors['amount'])): ?>
              <small class="text-red-600"><?= esc($errors['amount']) ?></small>
            <?php endif; ?>
          </div>
          <div>
            <button
              type="submit"
              id="topUpButton"
              disabled
              class="transition-colors duration-300 mt-4 flex w-full justify-center rounded-md bg-gray-300 cursor-not-allowed px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs">Top Up</button>

          </div>
        </form>
        <button id="showMessageButton"
          class="mt-4 flex w-full justify-center rounded-md bg-red-500 cursor-pointer px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs">Show Modal</button>
      </div>
      <div class="w-2/5 ms-5">
        <div class="flex flex-wrap w-full gap-3 px-10 items-center py-2">
          <button
            id="amountButton"
            data-value="10000"
            class="cursor-pointer amount-button bg-white border border-gray-300 rounded-lg px-3 py-1.5 text-sm/6 font-semibold text-gray-900 shadow-xs hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
            Rp. 10.000
          </button>
          <button
            id="amountButton"
            data-value="20000"
            class="cursor-pointer amount-button bg-white border border-gray-300 rounded-lg px-3 py-1.5 text-sm/6 font-semibold text-gray-900 shadow-xs hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
            Rp. 20.000
          </button>
          <button
            id="amountButton"
            data-value="50000"
            class="cursor-pointer amount-button bg-white border border-gray-300 rounded-lg px-3 py-1.5 text-sm/6 font-semibold text-gray-900 shadow-xs hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
            Rp. 50.000
          </button>
          <button
            id="amountButton"
            data-value="100000"
            class="cursor-pointer amount-button bg-white border border-gray-300 rounded-lg px-3 py-1.5 text-sm/6 font-semibold text-gray-900 shadow-xs hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
            Rp. 100.000
          </button>
          <button
            id="amountButton"
            data-value="250000"
            class="cursor-pointer amount-button bg-white border border-gray-300 rounded-lg px-3 py-1.5 text-sm/6 font-semibold text-gray-900 shadow-xs hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
            Rp. 250.000
          </button>
          <button
            id="amountButton"
            data-value="500000"
            class="cursor-pointer amount-button bg-white border border-gray-300 rounded-lg px-3 py-1.5 text-sm/6 font-semibold text-gray-900 shadow-xs hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
            Rp. 500.000
          </button>
        </div>
      </div>
    </div>
  </div>


  <form action="<?= site_url('logout') ?>" method="post">
    <?= csrf_field() ?>
    <button type="submit" class="cursor-pointer px-5 bg-red-500 text-white py-3 ms-10 rounded-lg shadow-sm hover:bg-red-600">Logout</button>
  </form>
  <script src="<?= base_url('js/script.js') ?>"></script>
  <?php if (session()->getFlashdata('success')): ?>
    <script>
      showMessageModal('<?= $page ?>' + ' senilai', '<?= session()->getFlashdata('success') ?>', 'success');
    </script>
  <?php endif; ?>
  <?php if (session()->getFlashdata('errors')): ?>
    <script>
      showMessageModal('<?= $page ?>' + ' senilai', '<?= session()->getFlashdata('errors') ?>', 'error');
    </script>
  <?php endif; ?>
</body>

</html>