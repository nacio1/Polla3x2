<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polla3x2 | Registro</title>
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
<form class="form-signin" id="registro-form" action="<?= base_url('registro') ?>" method="POST">
    <h1 class="text-center mb-5">Polla3x2</h1>
    <h1 class="h3 mb-3 font-weight-normal">Regístrate ahora</h1>    
    <div class="form-group">
        <label for="usuario">Usuario</label>
        <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Ingresa tu usuario">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" id="email" name="email" class="form-control" placeholder="Ingresa tu correo">
    </div>    
   <div class="form-group">
        <label for="Password">Contraseña</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña">  
    </div>
    <div class="form-group">
        <label for="confirm_password">Repite tu contraseña</label>
        <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Repite tu contraseña">
    </div>
            
    <button class="btn btn-lg btn-block mb-3" type="submit">Crear Cuenta</button>   

    <div class="login-links ">
        <p>¿Ya tienes una cuenta? <a href="<?= base_url('login') ?>">Iniciar sesión</a></p>                                
    </div>                 
</form>
</body>
</html>
<script src="js/registro.js"></script>