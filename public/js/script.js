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
const amountButtons = document.querySelectorAll('.amount-button');
const topUpButton = document.getElementById('topUpButton');
const form = document.getElementById('topUpForm');
const confirmationModal = document.getElementById('confirmationModal');
const messageModal = document.getElementById('messageModal');
const closeMessageButton = document.getElementById('closeMessageButton');
const cancelButton = document.getElementById('cancelButton');
const confirmButton = document.getElementById('confirmButton');

console.log("DOM fully loaded");
// Function to show Success/Error Message
function showMessageModal(title, message, type = 'success') {
  console.log('show called');
  const messageTitle = document.getElementById('messageTitle');
  const messageBody = document.getElementById('messageBody');

  // Set the modal content
  messageTitle.textContent = title;
  messageBody.textContent = message;

  // Optionally, change the modal color based on the type
  // if (type === 'success') {
  //   messageModal.classList.remove('bg-red-500');
  //   messageModal.classList.add('bg-green-500');
  // } else {
  //   messageModal.classList.remove('bg-green-500');
  //   messageModal.classList.add('bg-red-500');
  // }

  // Show the modal
  messageModal.classList.remove('hidden');
}
// Close Success/Error Message Modal
closeMessageButton.addEventListener('click', function() {
  messageModal.classList.add('hidden');
});
// const topUpButton = document.getElementById('topUpButton');

// Show Confirmation Modal when Top Up button is clicked
// topUpButton.addEventListener('click', function(event) {
//   event.preventDefault(); // Prevent form submission initially
//   confirmationModal.classList.remove('hidden');
// });

// Confirm Payment
// confirmButton.addEventListener('click', function() {
//   // Proceed with form submission or top up action
//   document.getElementById('topUpForm').submit(); // Submit the form if confirmed
//   confirmationModal.classList.add('hidden'); // Close the confirmation modal
// });

// // Cancel Payment
// cancelButton.addEventListener('click', function() {
//   confirmationModal.classList.add('hidden'); // Close the confirmation modal
// });
document.getElementById('showMessageButton').addEventListener('click', function() {
  showMessageModal('Hello', 'This is a test modal');
});


document.querySelectorAll('.form-input').forEach(input => {
  const icon = input.parentElement.querySelector('.form-icon');
  input.addEventListener('input', function() {
    if (this.value.trim() !== '') {
      icon.classList.remove('text-gray-400');
      icon.classList.add('text-black');
      
    }else {
      icon.classList.add('text-gray-400');
      icon.classList.remove('text-black');
    }
  })
})

if (amountButtons.length > 0 && amount && topUpButton) {
  amountButtons.forEach(button => {
    button.addEventListener('click', function () {
      const value = this.getAttribute('data-value');
      if (value) {
        amount.value = formatter.format(parseInt(value, 10));
        
        // Update Top Up Button State
        topUpButton.classList.remove('bg-gray-300', 'cursor-not-allowed');
        topUpButton.classList.add('bg-red-500', 'cursor-pointer');
        topUpButton.disabled = false;
      }
    });
  });

  // Optional: if you also want to reset the button when the user clears the input manually
  amount.addEventListener('input', function () {
    let rawValue = this.value.replace(/\D/g, '');

    if (!rawValue || parseInt(rawValue) === 0) {
      topUpButton.classList.add('bg-gray-300', 'cursor-not-allowed');
      topUpButton.classList.remove('bg-red-500', 'cursor-pointer');
      topUpButton.disabled = true;
    } else {
      this.value = formatter.format(parseInt(rawValue, 10)); // format while typing
      topUpButton.classList.remove('bg-gray-300', 'cursor-not-allowed');
      topUpButton.classList.add('bg-red-500', 'cursor-pointer');
      topUpButton.disabled = false;
    }
    if (!rawValue) {
      this.value = '';
      return;
    }
  });
}

if (form && amount) {
  form.addEventListener('submit', function (e) {
    // Before submitting, clean the amount value
    const rawValue = amount.value.replace(/\D/g, ''); // remove non-digit chars
    amount.value = rawValue; // set the cleaned value back
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


    

