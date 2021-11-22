{include file="template/header.tpl"}
{include file="template/head.tpl"}

    <div class="inicio">
        <h2 class="resaltar">{$titulo}</h2>
        <h3>Vista de <b>Producto</b></h3>
    </div>   

    <div class="container" id="product" product_id="{$product->id}" user_id="{$user_id}">
        <div class="col-12 mt-sm-5 table-responsive">
            <form class="" action="editProduct/{$product->id}" method="POST">
                <div class="form-floating col-12">
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
                    <input name="comments" value="{$product->comments}" type="text" class="form-control" placeholder="{$product->comments}">
                    <input name="input_id_product" value="{$product->id}"  type="hidden">
                    <div class="form-floating col ">
                        <button type="submit" class="w-100 btn btn-lg btn-success">EDITAR</button>
                    </div>
                </div>               
            </form>

{literal}
            <section id="template-vue-agregar">
                <h1 class="text-center">{{titulo}}</h1>
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
{/literal}
            <br>
        </div>
    </div>
</body>
<script src="js/appCommentsCSR.js"></script>
{include file="template/footer.tpl"}
