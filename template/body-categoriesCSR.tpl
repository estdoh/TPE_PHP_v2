{include file="template/header.tpl"}
{include file="template/head.tpl"}

    <div class="inicio">
        {* <h2 class="resaltar">{$titulo}</h2>
        <h4 class="resaltar">{$email}</h4> *}
        <h3>Carga de datos para <b>administrador</b></h3>
    </div>    

    <div class="container">        
        <div class="col-1 m-1">
            <button class=" w-100 btn btn-sm btn-success" id="addProduct" ><i class="fas fa-plus fa-xs" ></i></button>
        </div>               
    
        <div class="col-12 p-4 border rounded-3 bg-light agregarcliente"> 
            <form  class="col-12" id="form-products" action="InsertCategory" method="POST" autocomplete="on">                
                <div class="form-group col-10 mb-3">
                    <div class="form-floating col">
                        <input name="input_name" id="input_name" type="text" class="form-control" placeholder="Nombre">
                        <label for="name"><p>Name</p></label>
                    </div>
                    <div class="form-floating col">
                        <input name="input_description" id="input_description" type="text" class="form-control" placeholder="Descripcion">
                        <label for="description"><p>Descripcion</p></label>
                    </div>

                </div>  
               
                <div class="form-floating mb-2 col-2">
                    <div class="form-floating col ">
                        <button type="submit" class="w-100 btn btn-lg btn-success" >AGREGAR </button>
                    </div>
                </div>
            </form>
            
        </div>         
    </div>

    <div class="container">
        <div class="col-md-12 mt-sm-5 table-responsive">
            {include file='template/vue/categoryList.tpl'}
        </div>
    </div>
</body>

<script src="js/appCSR.js"></script>
{include file="template/footer.tpl"}