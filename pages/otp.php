<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OTP Verification – Crisis Connect</title>
  <link rel="stylesheet" href="../style/otp.css">
</head>
<body>
  <!-- Header Bar -->
  <header class="header">
    <div class="logo-title">
      <span class="brand">Crisis Connect</span>
    </div>
  </header>

  <!-- OTP Container -->
  <div class="otp-container">
    <h2>OTP verification</h2>
    <p>Please enter the OTP (One-Time Password) sent to your registered email/phone number to complete your verification.</p>

    <!-- OTP Inputs -->
    <div class="otp-inputs">
      <input type="text" maxlength="1" class="otp-field">
      <input type="text" maxlength="1" class="otp-field">
      <input type="text" maxlength="1" class="otp-field">
      <input type="text" maxlength="1" class="otp-field">
    </div>

    <!-- Timer -->
    <p class="timer">Remaining time: <span id="timer">60</span>s</p>
    <p class="resend">Didn’t get the code? <a href="#" id="resend">Resend</a></p>

    <!-- Buttons -->
    <button class="verify-btn">Verify</button>
    <button class="cancel-btn" onclick="window.location.href='create-account.php'">Cancel</button>
  </div>

  <script src="../js/otp.js"></script>
</body>
</html>
