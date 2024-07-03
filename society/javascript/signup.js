function PasswordVisibility() {
    var passwordInput = document.getElementById("Password");
    var eyeIcon = document.getElementById("eye-icon");
  
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      eyeIcon.classList.remove("fa-eye-slash");
      eyeIcon.classList.add("fa-eye");
    } else {
      passwordInput.type = "password";
      eyeIcon.classList.remove("fa-eye");
      eyeIcon.classList.add("fa-eye-slash");
    }
  }

  document.addEventListener("DOMContentLoaded", function () {
    var storedToken = localStorage.getItem("rememberToken");
  
    if (storedToken) {
      document.getElementById("email").value = storedToken;
      document.getElementById("rememberMe").checked = true;
    }
  });
  
  function togglePasswordVisibility() {
  }
  
  function saveRememberToken() {
    var rememberMeCheckbox = document.getElementById("rememberMe");
    var emailInput = document.getElementById("email");
  
    if (rememberMeCheckbox.checked) {
      localStorage.setItem("rememberToken", emailInput.value);
    } else {
      localStorage.removeItem("rememberToken");
    }
  }

  