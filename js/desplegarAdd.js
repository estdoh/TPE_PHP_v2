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
    let search = document.querySelector(".inputFilter");
    if (search.style.display == 'inline'){
        search.style.display = 'none';
    } else {
        search.style.display = 'inline';
    };   
}
