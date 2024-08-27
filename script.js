const signUpButton = document.getElementById("signUpButton");
const signInButton = document.getElementById("signInButton");
const signInForm = document.getElementById("signin");
const signUpForm = document.getElementById("signup");

signUpButton.addEventListener("click", function () {
  signInForm.style.display = "none"; //hides signin form
  signUpForm.style.display = "block"; //displays signup form
});

signInButton.addEventListener("click", function () {
  signUpForm.style.display = "none";
  signInForm.style.display = "block";
});