{include file="template/head.tpl"}
{include file="template/header.tpl"}

    <div class="container">
        <div class="row">
            <div class="col-10 m-3 text-center">
                <h3 class="display-4 fw-bold">Presupuestar</h3>                
            </div>

            <div class="p-4 m-2 p-md-4 border rounded-3 bg-light"> 
                <form>   
                    <div class="col-1 form-floating mb-3">                        
                        <input id="cantidad" type="number" class="form-control" placeholder="Ingrese cantidad de gente">
                        <label for="cantidad"><p>Cantidad</p></label>
                    </div>                 
                           
                    {* {html_options name=categorias options=$categoryproducts selected=categoryproducts(0) }                          *}
                    <select name="categorias" class="col-3 form-floating mb-3">
                        {* {html_options values=$categoryproducts_name output=$categoryproducts_description } *}
                            <option selected disabled>Seleccionar categoria</option>
                            
                        {foreach from=$products item=$product}
                            <div class="col-2 m-1">
                                <option value='{$product->name}'>{$product->name}</option>
                            </div>
                        {/foreach}                           
                    </select>                                          
                           
                        {* <input id="nombre" type="text" class="form-control" placeholder="Ingrese su nombre">
                        <label for="nombre"><p>Productos</p></label> *}             

                    <select class="col-3 form-floating mb-3">
                        <option selected disabled>Seleccionar Producto</option>
                            {* {if ( option value == {$category->category} )} *}
                            {foreach from=$categories item=$category}
                                <div class="col-2 m-1">
                                    <a href="Search/{$category->name}" ><button class="w-100 btn btn-sm btn-success" >{$category->name}</button></a>
                                </div>        
                            {/foreach}
                        {* {else}
                        <h1>error</h1>
                            {/if} *}
                    </select> 
                        
                    
                     <div class="col-3 form-floating mb-3">
                        <input id="descripcion" type="textarea" class="form-control" placeholder="Ingrese descripcion">
                        <label for="descripcion"><p>Descripcion</p></label>
                    </div>
                    <div class="col-2 form-floating mb-3">
                        <input id="preciounit" type="number" class="form-control" placeholder="precio">
                        <label for="preciounit"><p>Precio</p></label>
                    </div>
                </form>

                <div class="form-floating mb-2">
                    <button class="w-100 btn btn-lg btn-success" id="btn-agregar" required>AGREGAR </button>
                </div> 
            </div>
        </div>
    </div>



{include file="template/footer.tpl"}