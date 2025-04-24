document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("contact-form");
  const responseBox = document.getElementById("form-response");

  form.addEventListener("submit", (e) => {
    e.preventDefault();

    // Grab values
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const subject = document.getElementById("subject").value.trim();
    const message = document.getElementById("message").value.trim();

    // Basic validation
    if (!name || !email || !subject || !message) {
      responseBox.textContent = "Please fill out all fields.";
      responseBox.style.color = "var(--error-color)";
      return;
    }

    // Simulate form submission
    responseBox.textContent = "Thank you for contacting us! We'll get back to you soon.";
    responseBox.style.color = "var(--success-color)";
    
    // Optionally reset the form
    form.reset();
  });
});
