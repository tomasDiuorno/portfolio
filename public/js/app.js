const text = {
    logo : "</ tomiDev >",
    welcome: "Welcome to my Portfolio!"
};
const title = document.getElementById("name-logo");
const welcome = document.getElementById("welcome");

let iLogo = 0;
let iWelcome= 0;
function typeLogo(){
    let finished = true;

    if(iLogo < text.logo.length) {
        title.textContent += text.logo.charAt(iLogo);
        iLogo++;
        finished = false;
    }

    if (!finished) {
        setTimeout(typeLogo, 100);
    }
}

function typeWelcome(){
    let finished = true;

    if(iWelcome < text.welcome.length) {
        welcome.textContent += text.welcome.charAt(iWelcome);
        iWelcome++;
        finished = false;
    }

    if (!finished) {
        setTimeout(typeWelcome, 100);
    }
}
typeLogo();
typeWelcome();