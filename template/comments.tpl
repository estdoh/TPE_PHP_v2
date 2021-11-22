{literal}
    <section v-if="rol>=1" id="template-vue-agregar" >
        <h1 class="text-center" >{{titulo}}</h1>
        <div v-if="errors.length" class="col-12 bg-danger text-center text-light p-3">
            <p v-for="error in errors">*{{ error }}</p>
        </div>
        <form  method="POST" @submit="agregarComentario">
            
            <div class="form-floating col-12">
                <label for="puntaje"> <span>Mi puntaje:</span> </label>
                <select v-model="puntaje" id="puntaje" class="form-control" name="puntaje">
                    <option value="1">1</option>
                    <option value="2">2 </option>
                    <option value="3">3</option>
                    <option value="4">4 </option>
                    <option value="5">5 </option>
                </select>
                <textarea v-model="comentario" id="comentario" class="form-control" name="comentario" cols="20"
                        rows="5" placeholder="Escribanos su comentario"></textarea>
                
                <div class="form-floating col">
                    <button type="submit" class="w-100 btn btn-lg btn-success">COMENTAR</button>
                </div>
            </div>
        </form>
    </section>
    <section id="template-vue-obtener">
        <h1 class="text-center">{{titulo}}</h1>
        <div class="container">

            <div class="col-md-12 mt-sm-5 table-responsive">                   
                <table class="table table-sm table-hover" id="listadoClientes">
                    <caption>Comentarios</caption>
                    <thead>
                        <tr>
                            <th>Puntaje</th>
                            <th>Comentario</th>   
                            <th>Usuario</th>
                            <th v-if="rol==2">Eliminar</th>             
                        </tr>
                    </thead>
                                    
                    <tbody id="listadoTD" >
                        <tr v-for="comentario in comentarios">
                            <td>  {{ comentario.rating }}</td>
                            <td>  {{ comentario.comment }}</td>
                            <td>  {{ comentario.email }}</td>
                            <td v-if="rol==2"> <a class='w-100 btn btn-sm btn-danger' data-id='buttonSupr' v-on:click="eliminar_comentario(comentario.id_comment)"><i class='fa fa-trash fa-sm' aria-hidden='true'  ></i> </a> </td>
                        </tr>
                    </tbody>
                </table>          

            </div>
        </div>
    </section>
{/literal}
<script src="js/appCommentsCSR.js"></script>