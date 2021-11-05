{include file="template/header.tpl"}
{include file="template/head.tpl"}

    <div class="inicio">
        <h2 class="resaltar">{$user->email}</h2>
        <h3>Vista de <b>Usuario</b></h3>
    </div>   

    <div class="container">
        <div class="col-12 mt-sm-5 table-responsive">                   
            <form class="" action="editUser/{$user->id_user}" method="POST">
                <div class="form-floating col-12">
                    <input value="{$user->email}" name="input_email" type="text" class="form-control" placeholder="{$user->email}" required> 
                    <input value="{$user->password}" name="input_password" type="text" class="form-control" placeholder="{$user->password}" required>     
                    {* <select name="input_rol" class="form-floating col" required>                    
                        <option >Seleccionar categoria</option>  
                        {foreach from=$users item=$user}  
                            {if ({$user->rol} === {$user->rol}) }
                                <option selected="selected" value='{$user->rol}'>{$user->rol}</option>
                            {else}
                                <option value='{$user->rol}'>{$user->rol}</option>
                            {/if} 
                        {/foreach}
                                            
                    </select> *}
                    <input name="input_rol" value="{$user->rol}" type="textarea" class="form-control" placeholder="{$user->rol}">
                    
                    <div class="form-floating col ">
                        <button type="submit" class="w-100 btn btn-lg btn-success">EDITAR</button>
                    </div>
                </div>
               
            </form>
            
        </div>
    </div>
</body>

{include file="template/footer.tpl"}