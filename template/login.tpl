{include file="template/head.tpl"}

    <div class="row log">
        <div class="inicio col-12">
            <h2>INICIAR SESION</h2>
            <form class="login col-4" action="verify" method="POST">
                <div class="form-floating col m-2">
                    <label for="email"><p>Email</p></label>
                    <input class="form-control" placeholder="email" type="email" name="email" id="email" required>
                </div>
                <div class="form-floating col m-2">
                <label for="password"><p>Contraseña</p></label>
                    <input class="form-control" placeholder="password" type="password" name="password" id="password" required>
                </div>
                <div class="col">
                    <input type="submit" class="w-100 btn btn-lg btn-success" value="Login">
                </div>
            </form>
        <h4>En caso de no estar Registrado<br> <a href="viewRegister">ingrese aqui</a></h4>
        </div>
    </div>
    <h4 class="alert-danger">{$error}</h4>

{include file="template/footer.tpl"}

