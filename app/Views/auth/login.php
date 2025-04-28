<?php
require_once(APPPATH . 'Views/components/icons.php');
$errors = session()->getFlashdata('error_validations') ?? [];
?>
<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
  <div class="flex flex-row min-h-screen px-5">
    <div class="w-1/2 min-h-full flex-col justify-center px-6 py-6 lg:px-10">
      <div class="flex items-center space-x-2">
        <img class="ms-auto h-10" src="<?= base_url('/images/logo.png') ?>" alt="HIS PPOB - Teddy Nanta">
        <span class="font-bold me-auto">HIS PPOB - Teddy Nanta</span>
      </div>
      <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Login</h2>

      <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <?php if (session()->getFlashdata('errors')): ?>
          <p class="bg-red-200 border border-red-600 py-4 px-3 rounded-lg text-red-700 text-center mb-5"><?= session()->getFlashdata('errors') ?></p>
        <?php endif; ?>
        <?php if (session()->getFlashdata('success')): ?>
          <p class="bg-green-200 border border-green-600 py-4 px-3 rounded-lg text-green-700 text-center mb-5"><?= session()->getFlashdata('success') ?></p>
        <?php endif; ?>

        <form action="/login" method="post">
          <?= csrf_field() ?>
          <div>
            <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
            <div class="relative mt-2">
              <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <?php renderIcon('mail', 'form-icon w-4 h-4 text-gray-400'); ?>
              </div>
              <input
                type="email"
                name="email"
                id="email"
                autocomplete="email"
                required
                value="<?= old('email') ?>"
                class="form-input border <?= isset($errors['email']) ? 'border-red-500' : 'border-gray-300' ?> block w-full rounded-md bg-white ps-9 px-3 py-2 text-base text-gray-900 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-red-600 sm:text-sm"
                placeholder="masukan email anda">
            </div>
            <?php if (isset($errors['email'])): ?>
              <small class="text-red-600"><?= esc($errors['email']) ?></small>
            <?php endif; ?>
          </div>

          <div>
            <div class="flex items-center justify-between">
              <label for="password" class="mt-2 block text-sm/6 font-medium text-gray-900">Password</label>
            </div>
            <div class="relative mt-2">
              <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <?php renderIcon('lock', 'form-icon w-4 h-4 text-gray-400'); ?>

              </div>
              <input
                type="password"
                name="password"
                id="password"
                autocomplete="current-password"
                required
                class="fform-input border <?= isset($errors['password']) ? 'border-red-500' : 'border-gray-300' ?> block w-full rounded-md bg-white ps-9 px-3 py-2 text-base text-gray-900 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-red-600 sm:text-sm"
                placeholder="masukan password anda">

              <!-- Eye Icon -->
              <div class="absolute inset-y-0 end-0 flex items-center pe-3">
                <button type="button" id="togglePassword" class="text-gray-500 hover:text-gray-700">
                  <!-- Eye open icon -->
                  <?php renderIcon('eyeOpen', 'h-4 w-4 hidden'); ?>
                  <!-- Eye closed icon -->
                  <?php renderIcon('eyeClosed', 'h-4 w-4'); ?>
                </button>
              </div>
            </div>
            <?php if (isset($errors['password'])): ?>
              <small class="text-red-600"><?= esc($errors['password']) ?></small>
            <?php endif; ?>
          </div>

          <div>
            <button type="submit" class=" mt-4 flex w-full justify-center rounded-md bg-red-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Login</button>
          </div>
        </form>

        <p class="mt-5 mb-0 text-center text-sm/6 text-gray-500">
          Belum punya akun?
          <a href="/register" class="font-semibold text-red-600 hover:text-red-500">Register</a>
        </p>
      </div>
    </div>
    <div class="hidden md:block w-1/2 max-h-screen">
      <img src="<?= base_url('/images/Illustrasi Login.png') ?>" alt="Login" class="object-cover w-full h-full ms-5">
    </div>
  </div>

  <script src="<?= base_url('js/script.js') ?>"></script>

</body>

</html>