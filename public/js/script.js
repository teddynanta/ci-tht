const togglePassword = document.getElementById('togglePassword');
const password = document.getElementById('password');
const eyeOpen = document.getElementById('eyeOpen');
const eyeClosed = document.getElementById('eyeClosed');
// const email = document.getElementById('email');
// const emailIcon = document.getElementById('emailIcon');

document.querySelectorAll('.form-input').forEach(input => {
  const icon = input.parentElement.querySelector('.form-icon');
  input.addEventListener('input', function() {
    if (this.value.trim() !== '') {
      icon.classList.remove('dark:text-gray-400');
      icon.classList.add('dark:text-gray-900');
      
    }else {
      icon.classList.add('dark:text-gray-400');
      icon.classList.remove('dark:text-gray-900');
    }
  })
})

togglePassword.addEventListener('click', function() {
  const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
  password.setAttribute('type', type);

  // Ganti icon
  eyeOpen.classList.toggle('hidden');
  eyeClosed.classList.toggle('hidden');
});