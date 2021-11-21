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
                    <input value="{$user->email}" name="input_email" type="text" class="form-control" placeholder="{$user->email}" required readonly> 
                    <select name="input_rol" data-selected="ADMIN" class="form-floating col" required>
                        {if ({$user->rol} === "SUPER-ADMIN") }                                           
                            <option value='SUPER-ADMIN' selected>SUPER-ADMIN</option>
                        {else}
                            <option value='SUPER-ADMIN' >SUPER-ADMIN</option>
                        {/if}
                        
                        {if ({$user->rol} === "ADMIN") }                                           
                            <option value='ADMIN' selected>ADMIN</option>
                        {else}
                            <option value='ADMIN' >ADMIN</option>
                        {/if}

                        {if ({$user->rol} === "USER") }                                           
                            <option value='USER' selected>USER</option>
                        {else}
                            <option value='USER' >USER</option>
                        {/if}
               
                    </select>    
                    <div class="form-floating col ">
                        <button type="submit" class="w-100 btn btn-lg btn-success">EDITAR</button>
                    </div>
                </div>
               
            </form>
            
        </div>
    </div>
</body>

{include file="template/footer.tpl"}