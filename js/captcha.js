"use strict";

let numcapcha = NumRandom();
function NumRandom(min, max) {
    return Math.floor(Math.random() * (999 - 0)) + 0;
} 

//console.log("el numero es " + numcapcha);
let reespuestaCapcha = document.querySelector("#valor-c");
reespuestaCapcha.innerHTML = `<br>` + "Ingrese" + `<br>` + numcapcha;

let btn = document.querySelector("#btn-enviar");
btn.addEventListener("click", function(event){
    event.preventDefault(); //detener el envio del form
    let CajaCaptcha = document.querySelector("#captcha");
    let DatoDelUsuario = CajaCaptcha.value;    
    if(DatoDelUsuario == numcapcha){
        //trabajar para que haga o no haga algo depende lo que sucede
        //console.log("Salio todo ok");
        let reespuestaCapcha = document.querySelector("#respuesta");
        reespuestaCapcha.innerHTML = "CORRECTO";
        capchabien();
        document.querySelector("#btn-send").style.display = 'block';    

    }else{
        //console.log("Malio Sal");
        let reespuestaCapcha = document.querySelector("#respuesta");
        reespuestaCapcha.innerHTML = "RE-CHECK";
        capchamal();
        document.querySelector("#btn-send").style.display = 'none';
    }
})

function capchabien() {
    document.querySelector(".btn-success").style.background = 'green';
}

function capchamal() {
    document.querySelector(".btn-success").style.background = '.btn-success';
}