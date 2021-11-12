<div class="container"> 
    <div class="col-2 m-1">
        <a href=""><button class="w-100 btn btn-sm btn-success" >TODOS</button></a>
    </div> 
    
    {foreach from=$categories item=$category}
        <div class="col-2 m-1">
            <a href="Search/{$category->name}" ><button class="w-100 btn btn-sm btn-success" >{$category->name}</button></a>
        </div>        
    {/foreach}
</div>