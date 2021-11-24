"use strict"
const API_URL = "api/categories";

// document.querySelector(".form-alta").addEventListener("submit", addCategory);

let app = new Vue({
    el: "#appCSR",
    data: {
        titulo: "Lista de Categorias CSR",
        subtitulo: "Esta lista de Categorias se renderiza desde JS usando Vue",
        categories: [] // this->smarty->assign("Categories",  $Categories)
    },
    methods: {
        delete(index)
        {
            if(confirm('desea eliminar la categoria?')) return;
            this.categories.splice(index, 1);


        }

        // delete_category: function(id) {
        //     fetch('api/categories/' + id, {
        //             "method": "DELETE",
        //             "mode": 'cors',
        //     })
        //     .then(respuesta => {
        //         if (respuesta.ok)
        //             getCategories();
        //         else
        //             console.log("error al eliminar");
        //     })
        //     .catch(err => {
        //         console.log(err);
        //     })
        // }
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

//
// function getTasks() {
//     fetch('api/tareas/')
//     .then(response => response.json())
//     .then(tasks => {
//         let content = document.querySelector(".lista-tareas");
//         content.innerHTML = "";
//         for(let task of tasks) {
//            content.innerHTML += createTaskHTML(task);
//             }
//     })
//     .catch(error => console.log(error));
//     }



// documentdocument.querySelector("#form-tarea").addEventListener('submit', addTask);
// function addTask(e) {
//     e.preventDefault();
//     let data = {
//         titulo: document.querySelector("input[name=titulo]").value,
//         descripcion: document.querySelector("input[name=descripcion]").value,
//         prioridad: document.querySelector("input[name=prioridad]").value
//     }
//     fetch('api/tareas', {
//         method: 'POST',
//         headers: {'Content-Type': 'application/json'},
//         body: JSON.stringify(data)
//     })
//     .then(response => {
//         getTasks();
//     })
//     .catch(error => console.log(error));
//     }