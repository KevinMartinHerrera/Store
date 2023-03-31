document.getElementById("javascript-2-idk").addEventListener("click",register);
document.getElementById("javascript-1-idk").addEventListener("click",IniciarSesion);
window.addEventListener("resize", anchoPage);

//variables
var container_login_register = document.querySelector(".container__login-register");

var form_login = document.querySelector(".form__login");

var form__register = document.querySelector(".form__register");

var below_login = document.querySelector(".registration-below-login");

var below__register = document.querySelector(".registration-below-register");



//funciones
function anchoPage(){

    if (window.innerWidth > 850){
        below__register.style.display = "block";
        below_login.style.display = "block";
    }else{
        below__register.style.display = "block";
        below__register.style.opacity = "1";
        below_login.style.display = "none";
        form_login.style.display = "block";
        container_login_register.style.left = "0px";
        form_register.style.display = "none";   
    }
}

anchoPage();

function register(){

        form__register.style.display = "block";
        container_login_register.style.left = "410px";
        form_login.style.display = "none";
        below__register.style.opacity = "1";
        below_login.style.opacity="1";

}


function IniciarSesion(){
        
        form__register.style.display = "none";
        container_login_register.style.left = "10px";
        form_login.style.display = "block";
        below__register.style.opacity = "1";
        below_login.style.opacity="0";
}