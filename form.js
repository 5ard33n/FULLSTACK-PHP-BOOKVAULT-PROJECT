const loginForm = document.querySelector(".login-form");
const registerForm = document.querySelector(".register-form");

const wrapper = document.querySelector(".wrapper");

const loginTitle = document.querySelector(".title-login");
const registerTitle = document.querySelector(".title-register");

const toaster = document.querySelector(".toaster");

const registerLink = document.querySelector("#register-link");
const loginLink = document.querySelector("#login-link");

/* Switch to Register */
registerLink.addEventListener("click", (e) => {
  e.preventDefault();

  loginForm.style.left = "-100%";
  loginForm.style.opacity = "0";

  registerForm.style.left = "50%";
  registerForm.style.opacity = "1";

  wrapper.style.height = "580px";

  loginTitle.style.top = "-50px";
  loginTitle.style.opacity = "0";

  registerTitle.style.top = "50%";
  registerTitle.style.opacity = "1";
});

/* Switch to Login */
loginLink.addEventListener("click", (e) => {
  e.preventDefault();

  loginForm.style.left = "50%";
  loginForm.style.opacity = "1";

  registerForm.style.left = "150%";
  registerForm.style.opacity = "0";

  wrapper.style.height = "500px";

  loginTitle.style.top = "50%";
  loginTitle.style.opacity = "1";

  registerTitle.style.top = "-50px";
  registerTitle.style.opacity = "0";
});
/* Switch to Login */
loginLink.addEventListener("click", (e) => {
  e.preventDefault();

  loginForm.style.left = "50%";
  loginForm.style.opacity = "1";

  registerForm.style.left = "150%";
  registerForm.style.opacity = "0";

  wrapper.style.height = "500px";

  loginTitle.style.top = "50%";
  loginTitle.style.opacity = "1";

  registerTitle.style.top = "-50px";
  registerTitle.style.opacity = "0";
});

/* Registration Success Popup */
signUpBtn.addEventListener("click", () => {
  toaster.textContent = "Registration Successful!";

  toaster.classList.add("show");

  setTimeout(() => {
    toaster.classList.remove("show");

    // Registration ke baad Login page par redirect
    loginLink.click();
  }, 3000);
});

/* Login Success + Home Page Redirect */
signInBtn.addEventListener("click", () => {
  toaster.textContent = "Login Successful!";

  toaster.classList.add("show");

  setTimeout(() => {
    toaster.classList.remove("show");

    // Home Page Open
    window.location.href = "home.php";
  }, 2000);
});
