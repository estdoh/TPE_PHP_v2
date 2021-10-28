"use strict"
const API_URL = "api/categories";

// document.querySelector(".form-alta").addEventListener("submit", addCategory);

let app = new Vue({
    el: "#appCSR",
    data: {
        titulo: "Lista de Categorias CSR",
        subtitulo: "Esta lista de Categorias se renderiza desde JS usando Vue",

        categories: [] // this->smarty->assign("Categories",  $Categories)
    }
})

async function getCategories() {
    // fetch para traer todas las Categories
    try {
        let response = await fetch(API_URL);
        let categories = await response.json();

        app.categories = categories;
    } catch (e) {
        console.log(e);
    }
};

// async function addCategory(e) {
//     console.log("as");
//     e.preventDefault();
//     alert("Si te animás hace el POST via fetch ;)");
// }

getCategories();

