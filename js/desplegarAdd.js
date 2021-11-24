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


