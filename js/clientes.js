"use strict";
const urlClientes = 'https://60c11ab2b8d3670017556827.mockapi.io/api/clientes';
let orderby = `?sortBy=empresa`;
let tipoOrden = "&order=asc";

// async function obtenerDatosCliente() {    
//   try {
//     let res = await fetch(urlClientes + orderby + tipoOrden);
//     let clientes = await res.json();
//     mostrar(clientes);
//     loadSelectClientes(clientes);    
//   } catch (error) {
//     console.log(error);
//   }
// }

function mostrar(clientes){
    // console.table(clientes);
    let listadoDom = document.querySelector(".listado");
    listadoDom.innerHTML = '';  

    for (let i = 0; i < clientes.length; i++) {
        let cliente = clientes[i];
        let id = cliente.id;
        let fila = document.createElement("tr");
        
        fila.innerHTML += ` <td data-id="nombreEmpresa"> ${cliente.empresa} </td>
                            <td data-id="nombreCliente"> ${cliente.nombreyapellido}</td>
                            <td data-id="telefonoCliente"> ${cliente.telefono} </td>
                            <td data-id="mailCliente"> ${cliente.mailCliente} </td>
                            <td data-id="sitiowebCliente"> ${cliente.sitiowebCliente} </td>
                            <td> <button class="w-100 btn btn-sm btn-danger" data-id="buttonSupr"><i class="fa fa-trash fa-sm" aria-hidden="true"></i> </button> </td> 
                            <td> <button class="w-100 btn btn-sm btn-primary" data-id="buttonEdit"><i class="fa fa-pencil fa-sm" aria-hidden="true"></i> </button> </td>                                              
        `; 
        fila.querySelector('[data-id="buttonSupr"]').addEventListener('click', (e) => {eliminar(id)});
        fila.querySelector('[data-id="buttonEdit"]').addEventListener('click', (e) => {editar(i, id, clientes)});
        fila.querySelector('[data-id="nombreEmpresa"]').addEventListener('dblclick', (e) => {editar(i, id, clientes)});
        fila.querySelector('[data-id="nombreCliente"]').addEventListener('dblclick', (e) => {editar(i, id, clientes)});
        fila.querySelector('[data-id="telefonoCliente"]').addEventListener('dblclick', (e) => {editar(i, id, clientes)});
        fila.querySelector('[data-id="mailCliente"]').addEventListener('dblclick', (e) => {editar(i, id, clientes)});
        fila.querySelector('[data-id="sitiowebCliente"]').addEventListener('dblclick', (e) => {editar(i, id, clientes)});
        listadoDom.appendChild(fila); 
    }
    loadSelectClientes(clientes);    
}

async function eliminar(id) {        
    if (confirm("Esta por eliminar un producto")) {            
        try {
            let res = await fetch(`${urlClientes}/${id}`, {
                "method": "DELETE"
            });
            if (res.status === 200) {
            // document.querySelector("#msj").innerHTML = "Eliminado!";
            console.log("eliminado");
            obtenerDatosCliente();                
            }
        } catch (error) {
            console.log(error);
        }        
    } else {
      txt = "Cancel!";
    }
    // document.getElementById("demo").innerHTML = txt;
}

let editInUse = false;
async function editar(i, id, clientes){    
    if (editInUse === false){
        editInUse = true;
        let cliente = clientes[i];
        let nombreEmpresaNuevo = document.getElementById("listadoClientes").rows[i+1].cells[0];
        let nombreClienteNuevo = document.getElementById("listadoClientes").rows[i+1].cells[1];
        let telefonoClienteNuevo = document.getElementById("listadoClientes").rows[i+1].cells[2];
        let mailClienteNuevo = document.getElementById("listadoClientes").rows[i+1].cells[3];
        let webClienteNuevo = document.getElementById("listadoClientes").rows[i+1].cells[4];

        document.getElementById("listadoClientes").rows[i+1].cells[5].innerHTML = ``;
        document.getElementById("listadoClientes").rows[i+1].cells[6].innerHTML = `
        <button class=" w-100 btn btn-sm btn-success" id="btn-OK"><i class="fa fa-check fa-sm" aria-hidden="true"></i> </button>`;        

        nombreEmpresaNuevo.innerHTML = `<input id="nombreEmpresaNuevo" type="text" class="form-control" value="${cliente.empresa}">`;
        nombreClienteNuevo.innerHTML = `<input id="nombreClienteNuevo" type="text" class="form-control" value="${cliente.nombreyapellido}">`;
        telefonoClienteNuevo.innerHTML = `<input id="telefonoClienteNuevo" type="text" class="form-control" value="${cliente.telefono}">`;
        mailClienteNuevo.innerHTML = `<input id="mailClienteNuevo" type="email" class="form-control" value="${cliente.mailCliente}">`;
        webClienteNuevo.innerHTML = `<input id="sitiowebClienteNuevo" type="url" class="form-control" value="${cliente.sitiowebCliente}">`;

        document.querySelector("#btn-OK").addEventListener('click', (e) => {reemplazar(id)} );        
        // hacer funcionar el enter para darle acceion ala funcion reemplazar
    } else if(editInUse === true) {
        return;
    }   
    
    async function reemplazar(id){
        let nombreEmpresaNuevo = document.getElementById("nombreEmpresaNuevo").value;
        let nombreClienteNuevo = document.getElementById("nombreClienteNuevo").value;
        let telefonoClienteNuevo = document.getElementById("telefonoClienteNuevo").value;
        let mailClienteNuevo = document.getElementById("mailClienteNuevo").value;
        let webClienteNuevo = document.getElementById("sitiowebClienteNuevo").value;

        let clienteNuevo = {        
            "id": id,
            "empresa": nombreEmpresaNuevo,
            "nombreyapellido": nombreClienteNuevo,        
            "telefono": telefonoClienteNuevo,
            "mailCliente": mailClienteNuevo,
            "sitiowebCliente": webClienteNuevo,                  
        }
    
        try {
            let res = await fetch(`${urlClientes}/${id}`, {
              "method": "PUT",
              "headers": { "Content-type": "application/json" },
              "body": JSON.stringify(clienteNuevo)
              });
              if (res.status === 200) {
                obtenerDatosCliente();
                editInUse = false;
                // document.querySelector("#msj").innerHTML = "Modificado!"
              }        
          } catch (error) {
              console.log(error);
          }      
    }
}

let selectclientes = document.querySelector("#selectClientes");
selectclientes.addEventListener("change", changeCliente);

async function loadSelectClientes(clientes) {
    selectclientes.innerHTML = '';
    for (let i = 0; i < clientes.length; i++) {
        const cliente = clientes[i];
        let option = document.createElement("option");
        option.appendChild(document.createTextNode(cliente.empresa));
        option.value = i;
        selectclientes.appendChild(option);
    }    
}

async function changeCliente() {
    let res = await fetch(urlClientes);
    let clientes = await res.json();
    let cliente = clientes [selectclientes.value];
    loadcliente(cliente);
}

// function loadcliente(cliente) {
//   let clienteName = document.querySelector("#cliente-name");
//   if (cliente.nombreyapellido != undefined){
//       clienteName.innerHTML =  `Nombre: ${cliente.nombreyapellido}`;
//   } else {`<p>no disponible</p>`;
//   };    

//   let clienteEmpresa = document.querySelector("#empresa-name");
//   clienteEmpresa.innerHTML = `Empresa: ${cliente.empresa}`;
//   let clienteTelefono = document.querySelector("#cliente-Telefono");
//   clienteTelefono.innerHTML = `Teléfono: ${cliente.telefono}`;
//   let clienteMail = document.querySelector("#cliente-Mail");
//   clienteMail.innerHTML = `E-mail: ${cliente.mailCliente}`;
//   let ClienteWeb = document.querySelector("#cliente-Web");
//   ClienteWeb.innerHTML = `WEB: ${cliente.sitiowebCliente}`;  
// }

document.querySelector("#btn-agregar").addEventListener("click", agregar);
async function agregar() {    
    let empresa = document.querySelector('#empresa').value;  
    let nombreyapellido = document.querySelector('#nombreyapellido').value;
    let telefono = document.querySelector('#telefonocliente').value;
    let mailCliente = document.querySelector('#mailCliente').value;
    let sitiowebCliente = document.querySelector('#sitiowebCliente').value;    

    let clienteNuevo = {  
        "id": "",      
        "empresa": empresa,
        "nombreyapellido": nombreyapellido,        
        "telefono": Number(telefono),
        "mailCliente": mailCliente,
        "sitiowebCliente": sitiowebCliente               
    }
    
    try {
        let res = await fetch(`${urlClientes}`, {
            "method": "POST",
            "headers": { "Content-type": "application/json" },
            "body": JSON.stringify(clienteNuevo),
        });
        if (res.status === 201) {            
            console.log("agregado");            
            obtenerDatosCliente(); 
        }
    } catch (error) {
        console.log(error);
    }
}

document.querySelector("#orderEmpresa").addEventListener('click', ordenarEmpresa);
function ordenarEmpresa(){         
    if (orderby == "?sortBy=nombreyapellido"){
        orderby = "?sortBy=empresa";        
    };    
    if (tipoOrden == "&order=asc" ){
        tipoOrden = "&order=desc";
    } else if (tipoOrden == "&order=desc"){
        tipoOrden = "&order=asc";
    };
    obtenerDatosCliente();
}

// document.querySelector("#addClienteFilter").addEventListener('click', addClienteIcon);

// function addClienteIcon(){
//     let filtros = document.querySelector(".agregarcliente");
//     if (filtros.style.display == 'inline'){
//         filtros.style.display = 'none';
//     } else {
//         filtros.style.display = 'inline';
//     };   
// }

document.querySelector("#orderNombre").addEventListener('click', ordenarNombre);
function ordenarNombre(){         
    if (orderby == "?sortBy=empresa"){
        orderby = "?sortBy=nombreyapellido";        
    };    
    if (tipoOrden == "&order=desc"){
        tipoOrden = "&order=asc";
    } else if (tipoOrden == "&order=asc"){
        tipoOrden = "&order=desc";
    };
    obtenerDatosCliente();
}

document.querySelector("#serchFilter").addEventListener('click', mostrarFiltro);
document.querySelector("#filterEmpresa").addEventListener('keyup', filtrarEmpresa);
document.querySelector("#filterCliente").addEventListener('keyup', filtrarNombre);
document.querySelector("#filterMail").addEventListener('keyup', filtrarMail);

function mostrarFiltro(){
    let filtros = document.querySelector(".inputFilter");
    if (filtros.style.display == 'inline'){
        filtros.style.display = 'none';
    } else {
        filtros.style.display = 'inline';
    };   
}

function filtrarEmpresa() {
    var inputEmpresa, filterE, table, filas, tdEmpresa, i, txtValueE;
    inputEmpresa = document.getElementById("filterEmpresa");   
    filterE = inputEmpresa.value.toUpperCase();    
    table = document.getElementById("listadoClientes");
    filas = table.getElementsByTagName("tr");
      
    for (i = 0; i < filas.length; i++) {
        tdEmpresa = filas[i].getElementsByTagName("td")[0];
        if (tdEmpresa) {
            txtValueE = tdEmpresa.textContent || tdEmpresa.innerText;        
            if (txtValueE.toUpperCase().indexOf(filterE) > -1) {
            filas[i].style.display = "";
            } else {
            filas[i].style.display = "none";
            }
        }
    }
}

function filtrarNombre() {
    var inputCliente, filterC, table, filas, tdCliente, i, txtValueC;
    inputCliente = document.getElementById("filterCliente");
    filterC = inputCliente.value.toUpperCase();
    table = document.getElementById("listadoClientes");
    filas = table.getElementsByTagName("tr");
      
    for (i = 0; i < filas.length; i++) {
        tdCliente = filas[i].getElementsByTagName("td")[1];
        if (tdCliente) {        
            txtValueC = tdCliente.textContent || tdCliente.innerText;
            if (txtValueC.toUpperCase().indexOf(filterC) > -1) {
            filas[i].style.display = "";
            } else {
            filas[i].style.display = "none";
            }
        }      
    }
}

function filtrarMail() {
    var inputMail, filterM, table, filas, tdMail, i, txtValueM;
    inputMail = document.getElementById("filterMail");
    filterM = inputMail.value.toUpperCase();
    table = document.getElementById("listadoClientes");
    filas = table.getElementsByTagName("tr");
      
    for (i = 0; i < filas.length; i++) {
        tdMail = filas[i].getElementsByTagName("td")[3];
        if (tdMail) {        
            txtValueM = tdMail.textContent || tdMail.innerText;
            if (txtValueM.toUpperCase().indexOf(filterM) > -1) {
            filas[i].style.display = "";
            } else {
            filas[i].style.display = "none";
            }
        };      
    };
}

obtenerDatosCliente();
