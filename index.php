<?php

session_start();
include("connect.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="icon" type="image/png" href="IMAGES/icon.png"> 
  <title>Login & Register</title>

  <link
    href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
    rel="stylesheet"
  />

  <link rel="stylesheet" href="form.css" />
</head>

<body>

  <div class="wrapper">

    <!-- Header -->
    <div class="form-header">
      <span class="title-login">Login</span>
      <span class="title-register">Register</span>
    </div>

    <!-- Login Form -->
    <form method="post" action="register.php" class="login-form">

      <div class="input-box">
        <input type="email" name="email" class="input-field" required />
        <label class="label">Email</label>
        <i class="bx bx-user icon"></i>
      </div>

       <div class="input-box">
    <input type="password" name="password" class="input-field password-field" required />
    <label class="label">Password</label>
    <i class="bx bx-hide icon toggle-password"></i>
    </div>

      <div class="form-cols">
        <a href="#">Forgot password?</a>
      </div>

      <button type="submit" class="btn-submit" id="SignInBtn" name="signIn">
        Sign In
        <i class="bx bx-log-in"></i>
      </button>

      <div class="switch-form">
        Don't have an account?
        <a href="#" id="register-link">Register</a>
      </div>

    </form>

    <!-- Register Form -->
    <form method="post" action="register.php" class="register-form">

      <div class="input-box">
        <input type="text" name="username" class="input-field" required />
        <label class="label">username</label>
        
        <i class="bx bx-user icon"></i>
      </div>

      <div class="input-box">
        <input type="email" name="email" class="input-field" required />
        <label class="label">Email</label>
        <i class="bx bx-envelope icon"></i>
      </div>

      <div class="input-box">
    <input type="password" name="password" class="input-field password-field" required />
    <label class="label">Password</label>
    <i class="bx bx-hide icon toggle-password"></i>
</div>
      <div class="form-cols">
        <label>
          <input type="checkbox" required />
          I agree to Terms &amp; Conditions
        </label>
      </div>

      <button type="submit" class="btn-submit" id="SignUpBtn" name="signup">
        Sign Up
        <i class="bx bx-user-plus"></i>
      </button>

      <div class="switch-form">
        Already have an account?
        <a href="#" id="login-link">Login</a>
      </div>

    </form>

  </div>

  <!-- Toaster -->
  <div class="toaster">
    Logged In Successfully!
  </div>

  <script src="form.js"></script>
  <script>
document.querySelectorAll(".toggle-password").forEach(icon => {
    icon.addEventListener("click", function () {
        const passwordField = this.parentElement.querySelector(".password-field");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            this.classList.remove("bx-hide");
            this.classList.add("bx-show");
        } else {
            passwordField.type = "password";
            this.classList.remove("bx-show");
            this.classList.add("bx-hide");
        }
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
