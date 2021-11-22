"use strict";


let agregar_comentarios = new Vue({
    el: "#template-vue-agregar",
    data: {
        titulo: "Dejanos tu puntaje",
        errors: [],
        comentario: null,
        puntaje: null
    },
    methods: {
        agregarComentario: function(e) {
            e.preventDefault();
            if (this.comentario && this.puntaje) {
                agregarComentario(comentario.value, puntaje.value);
                this.errors = [];
                return true;
            }
            this.errors = [];

            if (!this.comentario) {
                this.errors.push('El comentario no puede estar vacio.');
            }

            if (!this.puntaje) {
                this.errors.push('El puntaje es obligatorio');
            }
        }
    }
});

let obtener_comentarios = new Vue({
    el: "#template-vue-obtener",
    data: {
        titulo: "Comentarios",
        comentarios: [],
        rol: 0
    },
    methods: {
        eliminar_comentario: function(id) {
            fetch('api/comments/' + id, {

                    "method": "DELETE",
                    "mode": 'cors',
                })
                .then(respuesta => {
                    if (respuesta.ok)
                        obtenerComentarios();
                    else
                        console.log("error al eliminar");
                })
                .catch(err => {
                    console.log(err);
                })
        }
    }
});
/**
 * @param comentario
 * @param puntaje
 * Funcion para postear comentario.
 */
function agregarComentario(comentario, puntaje) {
    let id = obtenerId_producto();
    let id_user = obtenerId_user();

    // defino el JSON con los datos proporcionados por el usuario y el id del plato.
    let comentario_usuario = {

        comment: comentario,
        rating: puntaje,
        product_id: id,
        user_id: id_user
    };
    // eviar JSON a la API para que se encargue de registrar el comentario en la base de datos. 
    fetch('api/comments', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(comentario_usuario)
        })
        .then((response) => {
            if (response.ok)
                console.log('ok');
            else
                alert('error al agregar comentario');
        })
        .then(response => {
            obtenerComentarios();
        })
        .catch(exception => console.log(exception));

}



function obtenerId_producto() {
    let id = document.getElementById('product').getAttribute('product_id');
    return id
}

function obtenerId_user() {
    let id = document.getElementById('product').getAttribute('user_id');
    return id
}

function obtenerComentarios() {
    let rol_nombre = document.getElementById('product').getAttribute('rol');
    if  (rol_nombre=="ADMIN" || rol_nombre=="SUPER-ADMIN")
        obtener_comentarios.rol=1;
    let id_producto = obtenerId_producto();
    fetch('api/comments/products/' + id_producto)
        .then(response => response.json())
        .then(comentarios => {
            obtener_comentarios.comentarios = comentarios; // similar a $this->smarty->assign("tasks", $tasks)

        })
        .catch(error => console.log(error));
}



obtenerComentarios();