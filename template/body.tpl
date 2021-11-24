{include file="template/header.tpl"}
{include file="template/head.tpl"}

    <div class="inicio">
        <h2 class="resaltar">{$titulo}</h2>
        <h4 class="resaltar">{$email}</h4>
        <h3>Carga de datos para <b>administrador</b></h3>
    </div>    

    <div class="container"> 
        {if $rol=="SUPER-ADMIN" || $rol=="ADMIN"}     
            <div class="col-1 m-1">
                <button class=" w-100 btn btn-sm btn-success" id="addProduct" ><i class="fas fa-plus fa-xs" ></i></button>
            </div>
        {/if}
         
        <div class="col-md-12 col-sm-12 p-4 border rounded-3 bg-light agregarcliente"> 
            <form id="form-products" action="InsertProduct" method="POST" autocomplete="on" enctype="multipart/form-data">                
                <div class="form-group  mb-3">
                    <div class="form-floating col">
                        <input name="input_name" id="input_name" type="text" class="form-control" placeholder="Nombre" required>
                        <label for="name"><p>Producto</p></label>
                    </div>
                    <div class="form-floating col">
                        <input name="input_description" id="input_description" type="text" class="form-control" placeholder="Descripcion">
                        <label for="description"><p>Descripcion</p></label>
                    </div>
                    {if $rol=="SUPER-ADMIN" || $rol=="ADMIN"}
                        <div class="form-floating col">
                            <input type="file" name="input_image" id="input_image" class="form-control" multiple>
                            <label for="image"><p>Imagen</p></label>
                        </div>
                    {/if}
                    <select name="input_category" class="form-floating col" required>                    
                        <option selected disabled>Seleccionar categoria</option>  
                            {foreach from=$categories item=$category}                             
                                <div class="col-2 m-1">
                                    <option value='{$category->id_category}'>{$category->name}</option>
                                </div>
                            {/foreach}   
                        <option value='addNew' placeholder="agregarnuevo"></option>                        
                    </select>                    
                
                    <div class="form-floating col">
                        <input name="input_price_a" id="input_price_a" type="number" class="form-control" placeholder="PrecioB">
                        <label for="price_a"><p>Precio A</p></label>
                    </div>
                    <div class="form-floating col">
                        <input name="input_price_b" id="input_price_b" type="number" class="form-control" placeholder="PrecioB">
                        <label for="price_b"><p>Precio B</p></label>
                    </div>
                </div>

                <div class="form-floating mb-2">
                    <div class="form-floating col ">
                        <button type="submit" class="w-100 btn btn-lg btn-success" >AGREGAR </button>
                    </div>
                </div>

            </form>           
        </div>
               
    </div>

{include file="template/categorybuttons.tpl"}

    <div class="container">
        <div class="col-md-12 mt-sm-5 table-responsive">                   
            <table class="table table-sm table-hover" id="listadoClientes">
                <caption>Presupuestador</caption>
                <thead>
                    <tr>
                        <th>imagen</th>
                        <th>Producto <a href="OrderBy/name"> <i class="fas fa-filter fa-xs"></i></a></th>
                        <th>Categoria<a href="OrderBy/category"><i class="fas fa-filter fa-xs"></i></a></th>
                        <th>Descripcion<a href="OrderBy/description"><i class="fas fa-filter fa-xs"></i></a></th>
                        <th>precio A<a href="OrderBy/price_a"><i class="fas fa-filter fa-xs"></i></a></th>
                        <th>Precio B<a href="OrderBy/price_b"><i class="fas fa-filter fa-xs"></i></a></th>          
                        <th></th>
                        <th></th> 
                        {if $email!=""} 
                            <th></th>
                        {/if}                
                    </tr>
                </thead>
                                
                <tbody id="listadoTD">
        
                {if $rol=="SUPER-ADMIN" || $rol=="ADMIN"} 
                    {foreach from=$products item=$product}
                        <tr>
                            {if $product->img}
                                <td><img src="{$product->img}" class="img-fluid" alt="Responsive image" width="100px"></td>
                            {else}
                                <td><img src="images/noimagen.png" class="img-fluid" alt="Responsive image" width="100px"></td>
                            {/if}
                            <td>{$product->name}</td>
                            <td><a href="Search/{$product->name_category}" >{$product->name_category}</a></td>
                            <td>{$product->description}</td>                            
                            <td>{$product->price_a}</td>
                            <td>{$product->price_b}</td>
                            <td><a href='commentsProducts/{$product->id}' class='w-100 btn btn-sm btn-info' data-id='buttonComentario'><i class='fa fa-eye fa-sm' aria-hidden='true'></i> </a> </td>
                            <td><a href='delProducts/{$product->id}' class='w-100 btn btn-sm btn-danger' data-id='buttonSupr'><i class='fa fa-trash fa-sm' aria-hidden='true'></i> </a> </td> 
                            <td><a href='viewProduct/{$product->id}' class='w-100 btn btn-sm btn-primary edicionproducto' data-id='buttonEdit'><i class='fa fa-pencil fa-sm' aria-hidden='true'></i> </button> </td>                         
                        </tr>
                    {/foreach}
                {else}                
                    {foreach from=$products item=$product}                    
                        <tr>
                            {if $product->img}
                                <td><img src="{$product->img}" class="img-fluid" alt="Responsive image" width="100px"></td>
                            {else}
                                <td><img src="images/noimagen.png" class="img-fluid" alt="Responsive image" width="100px"></td>
                            {/if}
                            <td>  {$product->name}</td>
                            <td> <a href="Search/{$product->name_category}" >{$product->name_category}</a></td>
                            <td>{$product->description}</td>                            
                            <td>{$product->price_a}</td>
                            <td>{$product->price_b}</td>
                            <td> <a href='commentsProducts/{$product->id}' class='w-100 btn btn-sm btn-info' data-id='buttonComentario'><i class='fa fa-eye fa-sm' aria-hidden='true'></i> </a> </td>
                            <td><a href='viewProduct/{$product->id}' class='w-100 btn btn-sm btn-primary edicionproducto' data-id='buttonEdit'><i class='fa fa-pencil fa-sm' aria-hidden='true'></i> </button> </td>                          
                        </tr>
                    {/foreach}
                {/if}
                </tbody>
            </table>          

        </div>
    </div>
</body>

<script src="js/desplegarAdd.js"></script>
{include file="template/footer.tpl"}