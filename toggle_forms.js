// This script handles the toggling between the Sign Up and Sign In forms.

const signUpButton = document.getElementById('signUpButton');
const signInButton = document.getElementById('signInButton');
const signInForm = document.getElementById('signIn');
const signUpForm = document.getElementById('signup');

// Event listener for the Sign Up button
signUpButton.addEventListener('click', function () {
    signInForm.style.display = "none"; // Hide Sign In form
    signUpForm.style.display = "block"; // Show Sign Up form
});

// Event listener for the Sign In button
signInButton.addEventListener('click', function () {
    signInForm.style.display = "block"; // Show Sign In form
    signUpForm.style.display = "none"; // Hide Sign Up form
});
