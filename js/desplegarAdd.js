"use strict";

document.querySelector("#addProduct").addEventListener('click', addClienteIcon);
function addClienteIcon(){
    let filtros = document.querySelector(".agregarcliente");
    if (filtros.style.display == 'inline'){
        filtros.style.display = 'none';
    } else {
        filtros.style.display = 'inline';
    };   
}

document.querySelector("#serchFilter").addEventListener('click', addSearchIcon);
function addSearchIcon(){
    let filtros = document.querySelector(".inputFilter");
    if (filtros.style.display == 'inline'){
        filtros.style.display = 'none';
    } else {
        filtros.style.display = 'inline';
    };   
}
