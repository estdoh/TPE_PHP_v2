{include file="template/head.tpl"}
<header>
    <div class="logo">
        <h1>Presupuestador</h1>

    </div>
    <div class="container">
    <nav class="menu">
        <ul class="navigation">
            <li><a href="showProducts">Productos</a></li>
            <li><a href="showCategories">Categorias</a></li>
            <li><a href="category-csr">CategoriasCSR</a></li>
            {* <li><a href="Search">Busqueda</a></li> *}
            {if $email!=""}
                {if $rol=="ADMIN" || $rol=="SUPER-ADMIN"}
                    <li><a href="showUsers">Users</a></li>
                {/if}
                <li><a href="logout">Logout</a></li>
            {else}
                <li class="nav-item"><a href="login">Login</a></li>
            {/if}
        </ul>            
    </nav>
    </div>
    <i class="btn_menu fa fa-bars fa-lg" aria-hidden="true"></i>       
</header>