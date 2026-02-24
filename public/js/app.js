document.addEventListener("DOMContentLoaded", () => {
    type();
});
const form = document.getElementById("contactForm");
const status = document.getElementById("formStatus");

form.addEventListener("submit", async (e) => {
    e.preventDefault();

    const formData = {
        name: form.name.value,
        email: form.email.value,
        message: form.message.value
    };

    status.textContent = "sending...";

    try {
    const response = await fetch("/contact/contactMe", {
    method: "POST",
    body: formData
    });

    if (response.ok) {
        status.textContent = "message sent successfully.";
        form.reset();
    } else {
        status.textContent = "error sending message.";
    }
    } catch (error) {
        status.textContent = "server not reachable.";
    }
});
