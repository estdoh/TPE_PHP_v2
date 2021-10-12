{include file="template/header.tpl"}
{include file="template/head.tpl"}

    <div class="inicio">
        <h2 class="resaltar">{$titulo}</h2>
        <h3>Vista de <b>Producto</b></h3>
    </div>   

    <div class="container">
        <div class="col-12 mt-sm-5 table-responsive">                   
            <form class="" action="editProduct/{$product->id}" method="POST">
                <div class="form-floating col-12">
                    <input value="{$product->name}" name="input_name" type="text" class="form-control" placeholder="{$product->name}">   
                    {* <input value="{$product->name_category}" id="input_name" type="text" class="form-control" placeholder="{$product->name_category}">                    *}
                    <select name="input_category" class="form-floating col">                    
                        <option selected disabled>Seleccionar categoria</option>  

                            {foreach from=$categories item=$category}  
                                {if ({$product->name} === {$category->id_category}) }
                                <div class="">
                                    <option value='{$category->id_category}' selected >{$category->name}</option>
                                </div>
                                {else}
                                <div class="">
                                    <option value='{$category->id_category}'>{$category->name}</option>
                                </div>
                                {/if}
                            {/foreach}
                                             
                    </select>
                    <input name="input_description" value="{$product->description}" type="textarea" class="form-control" placeholder="{$product->description}">
                    <div class="form-floating col">            
                        <input name="input_price_a" value="{$product->price_a}" type="text" class="form-control" placeholder="{$product->price_a}">
                        <input name="input_price_b" value="{$product->price_b}" type="text" class="form-control" placeholder="{$product->price_b}">                  
                    </div>
                    <div class="form-floating col ">
                        <button type="submit" class="w-100 btn btn-lg btn-success">EDITAR</button>
                    </div>
                </div>
               
            </form>
            
        </div>
    </div>
</body>

{include file="template/footer.tpl"}

            {* <li>  {$product->name}</li>
            <li> <a href="Search/{$product->name_category}" >{$product->name_category}</a></li>
            <li>{$product->description}</li>                            
            <li>{$product->price_a}</li>
            <li>{$product->price_b}</li>    *}
