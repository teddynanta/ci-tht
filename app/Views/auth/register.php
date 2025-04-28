<?php
require_once(APPPATH . 'Views/components/icons.php');

$errors = session()->getFlashdata('error_validations') ?? [];
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
  <div class="flex flex-row min-h-screen px-5">
    <div class="w-full md:w-1/2 min-h-full flex-col justify-center px-6 py-6 lg:px-10">
      <div class="flex items-center space-x-2">
        <img class="ms-auto h-10" src="<?= base_url('/images/logo.png') ?>" alt="HIS PPOB - Teddy Nanta">
        <span class="font-bold me-auto">HIS PPOB - Teddy Nanta</span>
      </div>
      <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Lengkapi data untuk membuat akun</h2>

      <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <?php if (session()->getFlashdata('errors')): ?>
          <p class="bg-red-200 border border-red-600 py-4 px-3 rounded-lg text-red-700 text-center mb-5"><?= session()->getFlashdata('errors') ?></p>
        <?php endif; ?>
        <form action="/register" method="post">
          <?= csrf_field() ?>

          <!-- Email -->
          <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-900">Email address</label>
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
                placeholder="masukkan email anda">
            </div>
            <?php if (isset($errors['email'])): ?>
              <small class="text-red-600"><?= esc($errors['email']) ?></small>
            <?php endif; ?>
          </div>

          <!-- First Name -->
          <div class="mb-4">
            <label for="first_name" class="block text-sm font-medium text-gray-900">First Name</label>
            <div class="relative mt-2">
              <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <?php renderIcon('user', 'form-icon w-4 h-4 text-gray-400'); ?>
              </div>
              <input
                type="text"
                name="first_name"
                id="first_name"
                required
                value="<?= old('first_name') ?>"
                class="form-input border <?= isset($errors['first_name']) ? 'border-red-500' : 'border-gray-300' ?> block w-full rounded-md bg-white ps-9 px-3 py-2 text-base text-gray-900 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-red-600 sm:text-sm"
                placeholder="masukkan nama depan anda">
            </div>
            <?php if (isset($errors['first_name'])): ?>
              <small class="text-red-600"><?= esc($errors['first_name']) ?></small>
            <?php endif; ?>
          </div>

          <!-- Last Name -->
          <div class="mb-4">
            <label for="last_name" class="block text-sm font-medium text-gray-900">Last Name</label>
            <div class="relative mt-2">
              <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <?php renderIcon('user', 'form-icon w-4 h-4 text-gray-400'); ?>
              </div>
              <input
                type="text"
                name="last_name"
                id="last_name"
                required
                value="<?= old('last_name') ?>"
                class="form-input border <?= isset($errors['last_name']) ? 'border-red-500' : 'border-gray-300' ?> block w-full rounded-md bg-white ps-9 px-3 py-2 text-base text-gray-900 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-red-600 sm:text-sm"
                placeholder="masukkan nama belakang anda">
            </div>
            <?php if (isset($errors['last_name'])): ?>
              <small class="text-red-600"><?= esc($errors['last_name']) ?></small>
            <?php endif; ?>
          </div>

          <!-- Password -->
          <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-900">Password</label>
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
                class="form-input border <?= isset($errors['password']) ? 'border-red-500' : 'border-gray-300' ?> block w-full rounded-md bg-white ps-9 px-3 py-2 text-base text-gray-900 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-red-600 sm:text-sm"
                placeholder="masukkan password anda">
              <div class="absolute inset-y-0 end-0 flex items-center pe-3">
                <button type="button" id="togglePassword" class="text-gray-500 hover:text-gray-700">
                  <?php renderIcon('eyeOpen', 'h-4 w-4 hidden'); ?>
                  <?php renderIcon('eyeClosed', 'h-4 w-4'); ?>
                </button>
              </div>
            </div>
            <?php if (isset($errors['password'])): ?>
              <small class="text-red-600"><?= esc($errors['password']) ?></small>
            <?php endif; ?>
          </div>

          <!-- Password Confirmation -->
          <div class="mb-6">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-900">Password Confirmation</label>
            <div class="relative mt-2">
              <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <?php renderIcon('lock', 'form-icon w-4 h-4 text-gray-400'); ?>
              </div>
              <input
                type="password"
                name="password_confirmation"
                id="password_confirmation"
                autocomplete="new-password"
                required
                class="form-input border <?= isset($errors['password_confirmation']) ? 'border-red-500' : 'border-gray-300' ?> block w-full rounded-md bg-white ps-9 px-3 py-2 text-base text-gray-900 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-red-600 sm:text-sm"
                placeholder="masukkan kembali password anda">
              <div class="absolute inset-y-0 end-0 flex items-center pe-3">
                <button type="button" id="togglePasswordConfirmation" class="text-gray-500 hover:text-gray-700">
                  <?php renderIcon('eyeOpenConfirmation', 'h-4 w-4 hidden'); ?>
                  <?php renderIcon('eyeClosedConfirmation', 'h-4 w-4'); ?>
                </button>
              </div>
            </div>
            <?php if (isset($errors['password_confirmation'])): ?>
              <small class="text-red-600"><?= esc($errors['password_confirmation']) ?></small>
            <?php endif; ?>
          </div>

          <!-- Submit Button -->
          <div>
            <button type="submit" class="mt-4 w-full rounded-md bg-red-600 px-3 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
              Register
            </button>
          </div>
        </form>

        <p class="mt-5 text-center text-sm text-gray-500">
          Sudah punya akun?
          <a href="/login" class="font-semibold text-red-600 hover:text-red-500">Login</a>
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