<!DOCTYPE html>
<html>

<head>
  <title>Register</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
  <div class="container flex flex-row">
    <div class="min-h-full basis-3/4 justify-center px-6 py-12 lg:px-10">
      <div class="flex items-center space-x-2">
        <img class="ms-auto h-10" src="<?= base_url('/images/logo.png') ?>" alt="HIS PPOB - Teddy Nanta">
        <span class="font-bold me-auto">HIS PPOB - Teddy Nanta</span>
      </div>
      <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Lengkapi data untuk membuat akun</h2>

      <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <?php if (session()->getFlashdata('error')): ?>
          <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>

        <form action="/register" method="post">
          <?= csrf_field() ?>
          <div>
            <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
            <div class="relative mt-2">
              <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-500 dark:text-gray-400">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 1 0-2.636 6.364M16.5 12V8.25" />
                </svg>
              </div>
              <input type="email" name="email" id="email" autocomplete="email" required class="block w-full rounded-md bg-white ps-9 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
          </div>

          <div>
            <label for="first_name" class="mt-2 block text-sm/6 font-medium text-gray-900">First Name</label>
            <div class="relative mt-2">
              <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-500 dark:text-gray-400">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>

              </div>
              <input type="text" name="first_name" id="first_name" required class="block w-full rounded-md bg-white ps-9 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
          </div>

          <div>
            <label for="last_name" class="mt-2 block text-sm/6 font-medium text-gray-900">Last Name</label>
            <div class="relative mt-2">
              <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-500 dark:text-gray-400">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>

              </div>
              <input type="text" name="last_name" id="last_name" required class="block w-full rounded-md bg-white ps-9 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
          </div>

          <div>
            <div class="flex items-center justify-between">
              <label for="password" class="mt-2 block text-sm/6 font-medium text-gray-900">Password</label>
            </div>
            <div class="mt-2">
              <input type="password" name="password" id="password" autocomplete="current-password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
          </div>

          <div>
            <button type="submit" class=" mt-4 flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
          </div>
        </form>

        <p class="mt-10 text-center text-sm/6 text-gray-500">
          Sudah punya akun?
          <a href="/login" class="font-semibold text-indigo-600 hover:text-indigo-500">login</a>
        </p>
      </div>
    </div>
    <div>
      <img src="<?= base_url('/images/Illustrasi Login.png') ?>" alt="Login" class="w-screen max-h-screen basis-1/4 ms-5">
    </div>
  </div>
</body>

</html>