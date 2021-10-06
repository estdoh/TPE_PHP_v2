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

document.querySelector("#serchFilter").addEventListener('click', mostrarFiltro);
function mostrarFiltro(){
    let filtros = document.querySelector(".inputFilter");
    if (filtros.style.display == 'inline'){
        filtros.style.display = 'none';
    } else {
        filtros.style.display = 'inline';
    };   
}

// document.querySelector('#editbotton/').addEventListener('click', (e) => {editar()});
// let editInUse = false;
// async function editar(){    
//     if (editInUse === false){
//         editInUse = true;
//         let tr = document.getElementById('listadoTD').getElementsByTagName('tr').length;
        
//         for (let i = 0; i < tr; i++) {
//         // let cliente = clientes[i];
//             let namePorductNew = document.getElementById("listadoClientes").rows[i+1].cells[0];
//             let categoryProductNew = document.getElementById("listadoClientes").rows[i+1].cells[1];
//             let descriptionProductNew = document.getElementById("listadoClientes").rows[i+1].cells[2];
//             let priceAProductNew = document.getElementById("listadoClientes").rows[i+1].cells[3];
//             let priceBProductNew = document.getElementById("listadoClientes").rows[i+1].cells[4];
//             document.getElementById("listadoClientes").rows[i+1].cells[5].innerHTML = ``;
//             document.getElementById("listadoClientes").rows[i+1].cells[6].innerHTML = `
//             <button class=" w-100 btn btn-sm btn-success" id="btn-OK"><i class="fa fa-check fa-sm" aria-hidden="true"></i> </button>`;        

//             namePorductNew.innerHTML = `<input id="namePorductNew" type="text" class="form-control" >`;
//             categoryProductNew.innerHTML = `<input id="categoryProductNew" type="text" class="form-control" >`;
//             descriptionProductNew.innerHTML = `<input id="descriptionProductNew" type="text" class="form-control" >`;
//             priceAProductNew.innerHTML = `<input id="priceAProductNew" type="number" class="form-control" >`;
//             priceBProductNew.innerHTML = `<input id="priceBProductNew" type="number" class="form-control" >`;
//         }
//         // document.querySelector("#btn-OK").addEventListener('click', (e) => {reemplazar(id)} );        
//         // hacer funcionar el enter para darle acceion ala funcion reemplazar
//     } else if(editInUse === true) {
//         return;
//     }   
    
//     // async function reemplazar(id){
//     //     let nombreEmpresaNuevo = document.getElementById("nombreEmpresaNuevo").value;
//     //     let nombreClienteNuevo = document.getElementById("nombreClienteNuevo").value;
//     //     let telefonoClienteNuevo = document.getElementById("telefonoClienteNuevo").value;
//     //     let mailClienteNuevo = document.getElementById("mailClienteNuevo").value;
//     //     let webClienteNuevo = document.getElementById("sitiowebClienteNuevo").value;

//     //     let clienteNuevo = {        
//     //         "id": id,
//     //         "empresa": nombreEmpresaNuevo,
//     //         "nombreyapellido": nombreClienteNuevo,        
//     //         "telefono": telefonoClienteNuevo,
//     //         "mailCliente": mailClienteNuevo,
//     //         "sitiowebCliente": webClienteNuevo,                  
//     //     }
    
//     //     try {
//     //         let res = await fetch(`${urlClientes}/${id}`, {
//     //           "method": "PUT",
//     //           "headers": { "Content-type": "application/json" },
//     //           "body": JSON.stringify(clienteNuevo)
//     //           });
//     //           if (res.status === 200) {
//     //             obtenerDatosCliente();
//     //             editInUse = false;
//     //             // document.querySelector("#msj").innerHTML = "Modificado!"
//     //           }        
//     //       } catch (error) {
//     //           console.log(error);
//     //       }      
//     // }

//     // function mostrar(clientes){
//     //     // console.table(clientes);
//     //     let listadoDom = document.querySelector(".listado");
//     //     listadoDom.innerHTML = '';  
    
//     //     for (let i = 0; i < clientes.length; +) {
//     //         let cliente = clientes[i];
//     //         let id = cliente.id;
//     //         let fila = document.createElement("tr");
            
//     //         fila.innerHTML += ` <td data-id="nombreEmpresa"> ${cliente.empresa} </td>
//     //                             <td data-id="nombreCliente"> ${cliente.nombreyapellido}</td>
//     //                             <td data-id="telefonoCliente"> ${cliente.telefono} </td>
//     //                             <td data-id="mailCliente"> ${cliente.mailCliente} </td>
//     //                             <td data-id="sitiowebCliente"> ${cliente.sitiowebCliente} </td>
//     //                             <td> <button class="w-100 btn btn-sm btn-danger" data-id="buttonSupr"><i class="fa fa-trash fa-sm" aria-hidden="true"></i> </button> </td> 
//     //                             <td> <button class="w-100 btn btn-sm btn-primary" data-id="buttonEdit"><i class="fa fa-pencil fa-sm" aria-hidden="true"></i> </button> </td>                                              
//     //         `; 
//     //         fila.querySelector('[data-id="buttonSupr"]').addEventListener('click', (e) => {eliminar(id)});
//     //         fila.querySelector('[data-id="buttonEdit"]').addEventListener('click', (e) => {editar(i, id, clientes)});
//     //         fila.querySelector('[data-id="nombreEmpresa"]').addEventListener('dblclick', (e) => {editar(i, id, clientes)});
//     //         fila.querySelector('[data-id="nombreCliente"]').addEventListener('dblclick', (e) => {editar(i, id, clientes)});
//     //         fila.querySelector('[data-id="telefonoCliente"]').addEventListener('dblclick', (e) => {editar(i, id, clientes)});
//     //         fila.querySelector('[data-id="mailCliente"]').addEventListener('dblclick', (e) => {editar(i, id, clientes)});
//     //         fila.querySelector('[data-id="sitiowebCliente"]').addEventListener('dblclick', (e) => {editar(i, id, clientes)});
//     //         listadoDom.appendChild(fila); 
//     //     }
//     //     // loadSelectClientes(clientes);    
//     // }
// }