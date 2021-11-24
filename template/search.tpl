{include file="template/head.tpl"}
{include file="template/header.tpl"}

    <div class="inicio">
        <h2 class="resaltar">{$titulo}</h2>
        <h3>busqeuda de datos para <b>administrador</b></h3>
    </div>

    <div class="container">
        <div class="col-md-12 mt-sm-5 table-responsive">                   
            <table class="table table-sm table-hover" id="listadoClientes">
                <caption>Doble click para editar</caption>
                <thead>
                    <tr>
                        <th>Nombre <a href="OrderBy/name/"> <i class="fas fa-filter fa-xs"></i></a></th>
                        <th>Categoria<a href="OrderBy/category/"><i class="fas fa-filter fa-xs"></i></a></th>
                        <th>Descripcion<a href="OrderBy/description/"><i class="fas fa-filter fa-xs"></i></a></th>
                        <th>precio A<a href="OrderBy/price_a/"><i class="fas fa-filter fa-xs"></i></a></th>
                        <th>Precio B<a href="OrderBy/price_b/"><i class="fas fa-filter fa-xs"></i></a></th>   
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                                
                <tbody>
                    {foreach from=$products item=$product}
                        <tr>
                            <td> {$product->name}</td>
                            <td> <a href="Search/{$product->name_category}" >{$product->name_category}</a></td>
                            <td>{$product->description}</td>                            
                            <td>{$product->price_a}</td>
                            <td>{$product->price_b}</td>
                            <td> <a href='delProducts/{$product->id}' class='w-100 btn btn-sm btn-danger' data-id='buttonSupr'><i class='fa fa-trash fa-sm' aria-hidden='true'></i> </a> </td> 
                            <td> <button class='w-100 btn btn-sm btn-primary' data-id='buttonEdit'><i class='fa fa-pencil fa-sm' aria-hidden='true'></i> </button> </td>                         
                        </tr>
                    {/foreach}
                </tbody>
            </table>
        </div>
    </div>
</body>

{include file="template/footer.tpl"}