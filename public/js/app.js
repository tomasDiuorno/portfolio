document.addEventListener("DOMContentLoaded", () => {

    const form = document.getElementById("contactForm");
    const status = document.getElementById("formStatus");

    form.addEventListener("submit", async (e) => {
        e.preventDefault();

        const formData = new FormData(form);

        status.textContent = "Sending...";

        try {
            const response = await fetch("/contact/contactMe", {
                method: "POST",
                body: formData
            });

            const result = await response.json();

            if (response.ok) {
                status.textContent = result.message;
                form.reset();
            } else {
                status.textContent = result.message;
            }

        } catch (error) {
            status.textContent = "Server not reachable";
        }
    });
});
