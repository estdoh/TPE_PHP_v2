{literal}
    <div id="appCSR">
        <h1>{{ titulo }}</h1>
        <h2>{{ subtitulo }}</h2>

        <table class="table table-sm table-hover" id="listadoClientes">
            <caption>Presupuestador</caption>
            <thead>
                <tr>
                    <th>Nombre Categoria <a href="OrderBy/name/"> <i class="fas fa-filter fa-xs"></i></a></th>                
                    <th>Descripcion<a href="OrderBy/description/"><i class="fas fa-filter fa-xs"></i></a></th>                
                    <th></th> 
                    <th></th>                 
                </tr>
            </thead>
                                    
            <tbody id="listadoTD">

                <tr v-for="(category, index) in categories" >
                    <td> {{ category.name }}</td>                            
                    <td> {{ category.description }}</td>                           
                    <td v-if="rol>=1"> <a v-on:click="delete_category(category.id_category)" data-id='buttonSupr' class='w-100 btn btn-sm btn-danger'><i class='fa fa-trash fa-sm' aria-hidden='true'></i> </a> </td> 
                    <td v-if="rol==2"> <a href='viewCategoryCRS/{{ category.id_category }}' class='w-100 btn btn-sm btn-primary edicionproducto' data-id='buttonEdit'><i class='fa fa-pencil fa-sm' aria-hidden='true'></i> </button> </td>                         
                </tr>
            </tbody>
        </table>
        
    </div>
{/literal}