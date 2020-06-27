<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polla3x2 | Login</title>
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/swa2/sweetalert2.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('css/login.css') ?>">   
     
    <script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>     
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/datetimepicker/jquery.datetimepicker.full.min.js') ?>"></script>
    <script src="<?= base_url('assets/swa2/sweetalert2.all.js') ?>"></script>
    <script src="<?= base_url('assets/jquery_validation/jquery.validate.min.js') ?>"></script>
    <script src="<?= base_url('assets/jquery_validation/additional-methods.min.js') ?>"></script>
    <script src="<?= base_url('assets/jquery_validation/messages_es.min.js') ?>"></script>   
</head>
<body>
<div id="alert-message">
    <script>
        $(document).ready(function(){
            <?= session('message') ?>
        });
    </script>
</div>
<form class="form-signin" id="login-form" method="POST" action="login">        
    <a href="/" class="img-wrapper"><img class="img-fluid mx-auto" src="<?= base_url('img/polla3x2-logo.png') ?>"></a>
    <h1 class="h3 mb-3 font-weight-normal">Ingresa tu cuenta</h1>
    
    <?php if(isset($error)): ?>
        <div class="col-12">
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
    </div>
    <?php endif ?>

    <label for="usuario">Usuario o correo</label>
    <div class="input-group mb-3">        
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
        </div>
        <input type="text" class="form-control" id="usuario" name="usuario" value="<?= set_value('usuario')?>" placeholder="Ingresa tu usuario o correo" aria-label="Usuario">
    </div>

    <label style="display: block" for="Password">Contraseña</label>
    <div class="input-group mb-3" id="password-wrapper">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
        </div>
        <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" aria-label="Contraseña">
        <div class="input-group-append">
            <span class="input-group-text" id="basic-addon2"><i class="fas fa-eye-slash"></i></span>
        </div>        
    </div>
   

    <!--<div class="form-group">
        <label for="usuario">Usuario</label>
        <input type="text" id="usuario" name="usuario" value="<?= set_value('usuario')?>" class="form-control" placeholder="Ingresa tu usuario o correo">
    </div>
    <div class="form-group">
        <label for="Password">Contraseña</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña">  
    </div> --> 
            
    <button class="btn btn-lg btn-block my-4" id="form-submit" type="submit">Iniciar Sesión</button>   

    <div class="login-links ">
        <p>¿No tienes cuenta aún? <a href="<?= base_url('registro') ?>">Regístrate</a></p>  
        <div class="forget-password">
            <a href="#" >¿Olvidaste tu contraseña?</a>
        </div>                     
    </div>             
</form>
<script src="js/login.js"></script>
</body>
</html>

