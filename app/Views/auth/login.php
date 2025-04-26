<!DOCTYPE html>
<html>

<head>
  <title>Register</title>
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
        <?php if (session()->getFlashdata('error')): ?>
          <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>

        <form action="/login" method="post">
          <?= csrf_field() ?>
          <div>
            <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
            <div class="relative mt-2">
              <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="form-icon w-4 h-4 text-gray-900 dark:text-gray-400">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 1 0-2.636 6.364M16.5 12V8.25" />
                </svg>
              </div>
              <input type="email" name="email" id="email" autocomplete="email" required class="form-input block w-full rounded-md bg-white ps-9 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
          </div>

          <div>
            <div class="flex items-center justify-between">
              <label for="password" class="mt-2 block text-sm/6 font-medium text-gray-900">Password</label>
            </div>
            <div class="relative mt-2">
              <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="form-icon w-4 h-4 text-gray-500 dark:text-gray-400">
                  <path fill-rule="evenodd" d="M12 1.5a5.25 5.25 0 0 0-5.25 5.25v3a3 3 0 0 0-3 3v6.75a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3v-6.75a3 3 0 0 0-3-3v-3c0-2.9-2.35-5.25-5.25-5.25Zm3.75 8.25v-3a3.75 3.75 0 1 0-7.5 0v3h7.5Z" clip-rule="evenodd" />
                </svg>

              </div>
              <input type="password" name="password" id="password" autocomplete="current-password" required class="form-input ps-9 block w-full rounded-md bg-white px-3 py-1.5 pr-10 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">

              <!-- Eye Icon -->
              <div class="absolute inset-y-0 end-0 flex items-center pe-3">
                <button type="button" id="togglePassword" class="text-gray-500 hover:text-gray-700">
                  <!-- Eye open icon -->
                  <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7Z" />
                  </svg>
                  <!-- Eye closed icon -->
                  <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3l18 18M9.88 9.88a3 3 0 0 0 4.24 4.24m2.122-2.122a3.001 3.001 0 0 0-4.242-4.242m1.636 1.636A9.02 9.02 0 0 1 12 5c-4.478 0-8.268 2.943-9.542 7a9.005 9.005 0 0 0 5.278 5.611" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div>
            <button type="submit" class=" mt-4 flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Login</button>
          </div>
        </form>

        <p class="mt-5 mb-0 text-center text-sm/6 text-gray-500">
          Belum punya akun?
          <a href="/register" class="font-semibold text-indigo-600 hover:text-indigo-500">Register</a>
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