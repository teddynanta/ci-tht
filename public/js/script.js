const togglePassword = document.getElementById('togglePassword');
const password = document.getElementById('password');
const togglePasswordConfirmation = document.getElementById('togglePasswordConfirmation');
const passwordConfirmation = document.getElementById('password_confirmation');
const eyeOpen = document.getElementById('eyeOpen');
const eyeClosed = document.getElementById('eyeClosed');
const eyeOpenConfirmation = document.getElementById('eyeOpenConfirmation');
const eyeClosedConfirmation = document.getElementById('eyeClosedConfirmation');
const button = document.getElementById('toggleBalanceButton');
const amount = document.getElementById('amount');
const formatter = new Intl.NumberFormat('id-ID');

document.querySelectorAll('.form-input').forEach(input => {
  const icon = input.parentElement.querySelector('.form-icon');
  input.addEventListener('input', function() {
    if (this.value.trim() !== '') {
      icon.classList.remove('dark:text-gray-400');
      icon.classList.add('dark:text-black');
      
    }else {
      icon.classList.add('dark:text-gray-400');
      icon.classList.remove('dark:text-black');
    }
  })
})

if (amount) {
  amount.addEventListener('input', function (e) {
    let rawValue = this.value.replace(/\D/g, '');
    let numberValue = parseInt(rawValue || '0', 10);
    this.value = formatter.format(numberValue);
  });
  
}

if (togglePassword) {
  togglePassword.addEventListener('click', function() {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
  
    // Ganti icon
    eyeOpen.classList.toggle('hidden');
    eyeClosed.classList.toggle('hidden');
  });
}

if (togglePasswordConfirmation) {
  togglePasswordConfirmation.addEventListener('click', function() {
    const type = passwordConfirmation.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordConfirmation.setAttribute('type', type);
    
    // Ganti icon
    eyeOpenConfirmation.classList.toggle('hidden');
    eyeClosedConfirmation.classList.toggle('hidden');
  });
}

if (button) {
  button.addEventListener('click', function() {
    const isVisible = balance.getAttribute('data-visible') === "true";
    eyeClosed.classList.toggle('hidden');
    eyeOpen.classList.toggle('hidden');
    if (isVisible) {
      balance.textContent = "Rp. ******";
      balance.setAttribute('data-visible', 'false');
    } else {
      balance.textContent = balance.getAttribute('data-balance');
      balance.setAttribute('data-visible', 'true');
    }
  })  
}


    

