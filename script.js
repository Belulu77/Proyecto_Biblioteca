let menu= document.getElementsByClassName("ContainerMenu")
function ocultar(){
    menu.style.opacity= 0;
}

let prism = document.querySelector(".rec-prism");

function showSignup() {
  prism.style.transform = "translateZ(-100px) rotateY(-90deg)";
}

function showLogin() {
  prism.style.transform = "translateZ(-100px)";
}
