<?php
include_once 'configuracion/Database.php';
include("captcha/simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();

$this->model->manterSession();
?>

<div class="container"  class="style-login" >
    <div class="row" >
        <div class="col-sm-6 col-md-4 col-md-offset-4 element-center">
            <div class="account-wall" style="padding: 80px; width: 500px;">
                <img class="profile-img" src="media/img/imagenLogin.png"
                     alt="">
                <form class="frm-login" method="POST" action="?c=login&a=Login"  enctype="multipart/form-data">
                    <input type="email"  class="form-control" id="correo" name="correo" placeholder="Correo" required autofocus>
                    <br/>
                    <input type="password"  id="password" name="password" class="form-control" placeholder="Contraseña" required>
                    <br/>
                    <button style="display: block" class="btn btn-lg btn-primary btn-block" id="logear"  >
                        Entrar</button>

                    <a href="?c=usuario&a=Registro" class="pull-right need-help">Registrarse</a><span class="clearfix"></span>
                </form>
            </div>
        </div>
    </div>
</div>


