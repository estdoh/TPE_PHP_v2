{include file="template/header.tpl"}
{include file="template/head.tpl"}

    <div class="inicio">
        {* <h2 class="resaltar">{$titulo}</h2>
        <h4 class="resaltar">{$email}</h4> *}
        <h3>Carga de usuarios para <b>administrador</b></h3>
    </div>    

    <div class="container"> 
        {if $email!=""}       
        <div class="col-1 m-1">
            <button class=" w-100 btn btn-sm btn-success" id="addProduct" ><i class="fas fa-plus fa-xs" ></i></button>
        </div>
        {/if}
        {* <div class="col-1 m-1">
            <button class=" w-100 btn btn-sm btn-success" id="serchFilter" ><i class="fas fa-search fa-xs" ></i></button>
        </div>      *}
    
        <div class="col-md-12 col-sm-12 p-4 border rounded-3 bg-light agregarcliente"> 
            <form id="form-products" action="addUser" method="POST" autocomplete="on">                
                <div class="form-group  mb-3">
                    <div class="form-floating col">
                        <input name="email" id="input_email" type="text" class="form-control" placeholder="Nombre">
                        <label for="email"><p>Email</p></label>
                    </div>
                    <div class="form-floating col">
                        <input name="password" id="input_password" type="text" class="form-control" placeholder="Password">
                        <label for="password"><p>Password</p></label>
                    </div> 
                    <select name="rol" class="form-floating col" required>                    
                        <option selected="selected" >Seleccionar Rol</option>                         
                        <option value='0'>SUPER-ADMIN</option>
                        <option value='1'>ADMIN</option>
                        <option value='2'>USER</option>                  
                        
                    </select>      
                </div>  
         
                <div class="form-floating mb-2">
                    <div class="form-floating col ">
                        <button type="submit" class="w-100 btn btn-lg btn-success" >AGREGAR </button>
                    </div>
                </div>
            </form>            
        </div>           
    </div>

    <div class="container">
        <div class="col-md-12 mt-sm-5 table-responsive">                   
            <table class="table table-sm table-hover" id="listadoClientes">
                <caption>Presupuestador</caption>
                <thead>
                    <tr>
                        <th>Usuario <a href="OrderBy/name"> <i class="fas fa-filter fa-xs"></i></a></th>
                        <th>Rol<a href="OrderBy/category"><i class="fas fa-filter fa-xs"></i></a></th>
                        <th></th>   
                        <th></th>
                                       
                    </tr>
                </thead>
                                
                <tbody id="listadoTD">
        
                {if $email!=""}
                    {foreach from=$users item=$user}
                        <tr>
                            <td>  {$user->email}</td>
                            <td> <a href="Search/{$user->rol}" >{$user->rol}</a></td>
                            
                            <td> <a href='delUser/{$user->id_user}' class='w-100 btn btn-sm btn-danger' data-id='buttonSupr'><i class='fa fa-trash fa-sm' aria-hidden='true'></i> </a> </td> 
                            <td> <a href='viewUser/{$user->id_user}' class='w-100 btn btn-sm btn-primary edicionproducto' data-id='buttonEdit'><i class='fa fa-pencil fa-sm' aria-hidden='true'></i> </button> </td>                         
                        </tr>
                    {/foreach}
                {else}
                
                    {foreach from=$products item=$product}
                    
                        <tr>
                            <td></td>
                            <td> </td>
                            <td></td>                            
                            <td></td>
                            <td></td>
                        </tr>
                    {/foreach}
                {/if}
                </tbody>
            </table>          

        </div>
    </div>
</body>

{include file="template/footer.tpl"}