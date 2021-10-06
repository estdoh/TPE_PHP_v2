{include file="template/head.tpl"}
    <div class="row log">
        <div class="inicio col-12">
            <h2>Registrate</h2>
            <form class="login col-4" action="register" method="POST">
                <div class="form-floating col m-2">
                    <label for="email"><p>Email</p></label>
                    <input class="form-control" placeholder="email" type="email" name="email" id="email" required>
                </div>
                <div class="form-floating col m-2">
                <label for="pasword"><p>Contraseña</p></label>
                    <input class="form-control" placeholder="password" type="password" name="password" id="password" required>
                </div>
                {* <select class="form-floating col m-2">
                    <option value="rol1">1</option>  
                    <option value="rol2">2</option>  
                </select> *}
                <div class="col">
                    <input type="submit" class="w-100 btn btn-lg btn-success" value="Registrar">
                </div>
            </form>
        
        </div>
    </div>
    <h4 class="alert-danger">{$error}</h4>

{include file="template/footer.tpl"}

