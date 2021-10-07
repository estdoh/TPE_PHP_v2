{include file="template/head.tpl"}
<header>
    <div class="logo">
        <h1>{$titulo}</h1>

    </div>
    <nav class="menu">
        <ul class="navigation">
            <li><a href="showProducts">Productos</a></li>
            <li><a href="showCategories">Categorias</a></li>
            <li><a href="Search">Busqueda</a></li>
            {if $email!=""}
                <li><a href="logout">Logout</a></li>
            {else}
                <li class="nav-item"><a href="login">Login</a></li>
            {/if}
        </ul>            
    </nav>
    <i class="btn_menu fa fa-bars fa-lg" aria-hidden="true"></i>       
</header>