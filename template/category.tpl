{include file="template/header.tpl"}
{include file="template/head.tpl"}

    <div class="inicio">
        <h2 class="resaltar">{$titulo}</h2>
        <h3>Vista de <b>Categoria</b></h3>
    </div>   

    <div class="container">
        <div class="col-12 mt-sm-5 table-responsive">                   
            <form class="" action="editCategory/{$category->id_category}" method="POST">
                <div class="form-floating col-12">
                    <input name="input_name" value="{$category->name}"  type="text" class="form-control" placeholder="{$category->name}">                    
                    <input name="input_description" value="{$category->description}" type="textarea" class="form-control" placeholder="{$category->description}">
                    
                    <div class="form-floating col ">
                        <button type="submit" class="w-100 btn btn-lg btn-success">EDITAR</button>
                    </div>
                </div>
               
            </form>
            
        </div>
    </div>
</body>

{include file="template/footer.tpl"}