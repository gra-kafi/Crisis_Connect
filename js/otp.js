// Auto move between OTP fields
const otpFields = document.querySelectorAll('.otp-field');
otpFields.forEach((field, index) => {
  field.addEventListener('input', () => {
    if (field.value.length === 1 && index < otpFields.length - 1) {
      otpFields[index + 1].focus();
    }
  });
});

// Timer countdown
let timeLeft = 60;
const timerEl = document.getElementById('timer');
const timerInterval = setInterval(() => {
  timeLeft--;
  timerEl.textContent = timeLeft;
  if (timeLeft <= 0) {
    clearInterval(timerInterval);
    timerEl.textContent = "0";
  }
}, 1000);

// Resend link resets timer
document.getElementById('resend').addEventListener('click', (e) => {
  e.preventDefault();
  timeLeft = 60;
});
