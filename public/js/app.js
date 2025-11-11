const texts = ["Welcome to my Portfolio.", "Jr. Fullstack Developer.", "Bienvenidos a mi Portfolio.", "Desarrollador Fullstack Jr."];
const typingSpeed = 100;
const erasingSpeed = 60;
const delayBetween = 1000;
let textIndex = 0;
let charIndex = 0;

const welcomeElement = document.getElementById("type-container");

function type() {
    if (charIndex < texts[textIndex].length) {
        welcomeElement.textContent += texts[textIndex].charAt(charIndex);
        charIndex++;
        setTimeout(type, typingSpeed);
    } else {
        setTimeout(erase, delayBetween);
    }
}

function erase() {
    if (charIndex > 0) {
        welcomeElement.textContent = texts[textIndex].substring(0, charIndex - 1);
        charIndex--;
        setTimeout(erase, erasingSpeed);
    } else {
        textIndex = (textIndex + 1) % texts.length; // cambia al siguiente texto
        setTimeout(type, 500);
    }
}

document.addEventListener("DOMContentLoaded", () => {
    type();
});
