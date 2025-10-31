const text = "</ tomiDev >"
const title = document.getElementById("name-logo");

let i = 0;

function type(){
    if(i < text.length) {
        title.textContent += text.charAt(i);
        i++;
        setTimeout(type, 100);
    }
}

type();