document.addEventListener("DOMContentLoaded", () => {
  const currentUser = JSON.parse(localStorage.getItem("currentUser"));

  const loginLink = document.getElementById("login-link");
  const signupLink = document.getElementById("signup-link");
  const logoutLink = document.getElementById("logout-link");

  if (currentUser && currentUser.isLoggedIn) {
    // Show logout, hide login/signup
    if (logoutLink) logoutLink.style.display = "inline-block";
    if (loginLink) loginLink.style.display = "none";
    if (signupLink) signupLink.style.display = "none";
  } else {
    // Show login/signup, hide logout
    if (logoutLink) logoutLink.style.display = "none";
    if (loginLink) loginLink.style.display = "inline-block";
    if (signupLink) signupLink.style.display = "inline-block";
  }
});

