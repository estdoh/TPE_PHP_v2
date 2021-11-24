{include file="template/header.tpl"}
{include file="template/head.tpl"}

    <div class="inicio">
        <h2 class="resaltar">{$titulo}</h2>
        <h3>Vista de <b>Producto</b></h3>
    </div>   

    <div class="container" id="product" product_id="{$product->id}" user_id="{$user_id}" rol="{$rol}">
        <div class="col-12 mt-sm-5 table-responsive">
            {if $rol=="SUPER-ADMIN" || $rol=="ADMIN"}
                <form class="" action="editProduct/{$product->id}" method="POST" enctype="multipart/form-data">
                    <div class="form-floating col-12">
                        {* add image *}
                        {if $product->img}
                            <img src="{$product->img}" alt="{$product->name}" class="img-fluid">
                            <input type="file" name="input_image" id="input_image" class="form-control-file" multiple>
                        {else}
                            <img src="images/noimagen.png" alt="No Imagen" class="img-fluid">
                            <input type="file" name="input_image" id="input_image" class="form-control-file" multiple>
                        {/if}
                        <input value="{$product->name}" name="input_name" type="text" class="form-control" placeholder="{$product->name}" required>
                        <select name="input_category" class="form-floating col" required>                    
                            <option>Seleccionar categoria</option>
                                {foreach from=$categories item=$category}  
                                    {if ({$product->name_category} === {$category->name}) }
                                        <option selected="selected" value='{$category->id_category}'>{$category->name}</option>
                                    {else}
                                        <option value='{$category->id_category}'>{$category->name}</option>
                                    {/if} 
                                {/foreach}                                             
                        </select>
                        <input name="input_description" value="{$product->description}" type="textarea" class="form-control" placeholder="{$product->description}">
                        <div class="form-floating col">            
                            <input name="input_price_a" value="{$product->price_a}" type="text" class="form-control" placeholder="{$product->price_a}" required>
                            <input name="input_price_b" value="{$product->price_b}" type="text" class="form-control" placeholder="{$product->price_b}">                  
                        </div>
                        <input name="input_id_product" value="{$product->id}"  type="hidden">
                        <div class="form-floating col ">
                            <button type="submit" class="w-100 btn btn-lg btn-success">EDITAR</button>
                        </div>
                    </div>               
                </form>
            {else}
                
                <div class="form-floating col-12">
                    <input value="{$product->name}" name="input_name_d" type="text" class="form-control" placeholder="{$product->name}" disabled>
                    <input value="{$product->name_category}" name="input_name_d" type="text" class="form-control" placeholder="{$product->name}" disabled>
                    <input name="input_description_d" value="{$product->description}" type="textarea" class="form-control" placeholder="{$product->description}" disabled>
                                
                    <input name="input_price_a_d" value="{$product->price_a}" type="text" class="form-control" placeholder="{$product->price_a}" disabled>
                    <input name="input_price_b_d" value="{$product->price_b}" type="text" class="form-control" placeholder="{$product->price_b}" disabled>                  
                </div>               
                    
            {/if}
            <br>
        </div>
    </div>
</body>

{include file="template/footer.tpl"}
