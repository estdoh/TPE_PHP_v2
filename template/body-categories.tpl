{include file="template/header.tpl"}
{include file="template/head.tpl"}

    <div class="inicio">
        <h2 class="resaltar">{$titulo}</h2>
        <h4 class="resaltar">{$email}</h4>
        <h3>Carga de datos para <b>administrador</b></h3>
    </div>    
    {if $rol=="SUPER-ADMIN" || $rol=="ADMIN"}
        <div class="container">
                
            <div class="col-1 m-1">
                <button class=" w-100 btn btn-sm btn-success" id="addProduct" ><i class="fas fa-plus fa-xs" ></i></button>
            </div>               
        
            <div class="col-12 p-4 border rounded-3 bg-light agregarcliente"> 
                <form  class="col-12" id="form-products" action="InsertCategory" method="POST" autocomplete="on">                
                    <div class="form-group col-10 mb-3">
                        <div class="form-floating col">
                            <input name="input_name" id="input_name" type="text" class="form-control" placeholder="Nombre">
                            <label for="name"><p>Name</p></label>
                        </div>
                        <div class="form-floating col">
                            <input name="input_description" id="input_description" type="text" class="form-control" placeholder="Descripcion">
                            <label for="description"><p>Descripcion</p></label>
                        </div>
                    </div>               
                    <div class="form-floating mb-2 col-2">
                        <div class="form-floating col ">
                            <button type="submit" class="w-100 btn btn-lg btn-success" >AGREGAR </button>
                        </div>
                    </div>
                </form>            
            </div>         
        </div>
    {/if}

    <div class="container">
        <div class="col-md-12 mt-sm-5 table-responsive">                   
            <table class="table table-sm table-hover" id="listadoClientes">
                <caption>Presupuestador</caption>
                <thead>
                    <tr>
                        <th>Nombre Categoria <a href="OrderBy/name/"> <i class="fas fa-filter fa-xs"></i></a></th>                        
                        <th>Descripcion<a href="OrderBy/description/"><i class="fas fa-filter fa-xs"></i></a></th>                        
                        {if $rol=="SUPER-ADMIN" || $rol=="ADMIN"}
                            <th></th> 
                            <th></th>
                        {/if}                
                    </tr>
                </thead>
                                
                <tbody id="listadoTD">
                {if $rol=="SUPER-ADMIN" || $rol=="ADMIN"}
                    {foreach from=$categories item=$category}
                        <tr>
                            <td>  {$category->name}</td>                            
                            <td>{$category->description}</td>                           
                            <td> <a href='delCategories/{$category->id_category}' class='w-100 btn btn-sm btn-danger' data-id='buttonSupr'><i class='fa fa-trash fa-sm' aria-hidden='true'></i> </a> </td> 
                            <td> <a href='viewCategory/{$category->id_category}' class='w-100 btn btn-sm btn-primary edicionproducto' data-id='buttonEdit'><i class='fa fa-pencil fa-sm' aria-hidden='true'></i> </button> </td>                         
                        </tr>
                    {/foreach}
                {else}
                    {foreach from=$categories item=$category}
                        <tr>
                            <td>  {$category->name}</td>
                            <td>{$category->description}</td>
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