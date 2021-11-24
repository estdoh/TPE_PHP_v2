{include file="template/header.tpl"}
{include file="template/head.tpl"}

    <div class="inicio">
        <h3>Carga de usuarios para <b>administrador</b></h3>
    </div>

    <div class="container">
        <div class="col-md-12 mt-sm-5 table-responsive">                   
            <table class="table table-sm table-hover" id="listadoClientes">
                <caption>Presupuestador</caption>
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Rol</th>
                        <th></th>   
                        <th></th>        
                    </tr>
                </thead>
                                
                <tbody id="listadoTD">
        
                {if $email!=""}
                    {foreach from=$users item=$user}
                        <tr>
                            <td>  {$user->email}</td>
                            <td>  {$user->rol} </td>
                            
                            <td> <a href='delUser/{$user->id_user}' class='w-100 btn btn-sm btn-danger' data-id='buttonSupr'><i class='fa fa-trash fa-sm' aria-hidden='true'></i> </a> </td> 
                            <td> <a href='viewUser/{$user->id_user}' class='w-100 btn btn-sm btn-primary edicionproducto' data-id='buttonEdit'><i class='fa fa-pencil fa-sm' aria-hidden='true'></i> </button> </td>                         
                        </tr>
                    {/foreach}
                {/if}
                </tbody>
            </table>
        </div>
    </div>
</body>

{include file="template/footer.tpl"}