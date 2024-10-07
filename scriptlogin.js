const signUpButton=document.getElementById('signUpButton');
const signInButton=document.getElementById('signInButton');
const signInForm=document.getElementById('signIn');
const signUpForm=document.getElementById('signup');

signUpButton.addEventListener('click',function(){
    signInForm.style.display="none";
    signUpForm.style.display="block";
})
signInButton.addEventListener('click', function(){
    signInForm.style.display="block";
    signUpForm.style.display="none";
})

// isconfirm
document.addEventListener("DOMContentLoaded", function() {
    const modal = document.getElementById("confirmmodal");
    const confirmBtn = document.getElementById("confirmBtn");

    const isConfirmed = localStorage.getItem("isConfirmed");

    if (!isConfirmed) {
      modal.style.display = "block";
    }

    confirmBtn.addEventListener("click", function() {
      localStorage.setItem("isConfirmed", true);
      modal.style.display = "none";
    });
  });