|<?php
/*
session_start(); 
$url = '../';
include_once '../layout/layout_header.php';
include_once '../../configuracion/Database.php';
include '../../modelo/login.php';
$login = new Login();

$login->manterSession();*/
   
?>

<div class="container-fluid" class="style-login" >
    <div class="row" >
        <div class="col-sm-6 col-md-12 col-md-offset-4 element-center">
            <h1 class="text-center login-title">Sign in to continue to Bootsnipp</h1>
            <div class="account-wall">
                <img class="profile-img" src="media/img/imagenLogin.png"
                    alt="">
                <form class="form-signin" method="POST">
                    <input type="text" class="form-control"id="username" name="username" placeholder="Correo" required autofocus>
                    <input type="text" id="password" name="password" class="form-control" placeholder="Contraseña" required>
                <button class="btn btn-lg btn-primary btn-block"  type="submit">
                    Sign in</button>
             
                <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                </form>
            </div>
            <a href="#" class="text-center new-account">Create an account </a>
        </div>
    </div>
</div>


