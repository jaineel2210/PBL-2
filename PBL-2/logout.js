document.addEventListener("DOMContentLoaded", () => {
    // Clear current user from localStorage
    localStorage.removeItem("currentUser");
  
    // Optionally: Mark user as logged out in users list too
    const users = JSON.parse(localStorage.getItem("users")) || [];
    const updatedUsers = users.map((user) => ({
      ...user,
      isLoggedIn: false,
    }));
    localStorage.setItem("users", JSON.stringify(updatedUsers));
  
    // Optionally: Redirect after a delay (e.g., to login or home)
    // setTimeout(() => {
    //   window.location.href = "login.html";
    // }, 3000);
  });
  