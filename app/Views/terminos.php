<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/main.css') ?>">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }      
        ul li {
            margin-bottom: 1rem;
        }  
        .img-wrapper{
            margin-top: 1.5rem;
            display: flex;
            padding-right: 1.5rem;
        }
        footer {
            margin-top: auto;
        }
    </style>
    <title>Términos y servicios | Polla3x2</title>
</head>
<body>
<header>
    <nav class="navbar">  
    <div class="container d-flex justify-content-end">
        <a class="navbar-brand mr-auto" href="/">Polla3x2</a>
        <?php if(!session('usuario')) { ?>
            <a class="btn mr-1" href="<?= base_url('login') ?>">Login</a>
            <a class="btn btn-danger btn-sm" href="<?= base_url('registro') ?>">Crear Cuenta</a>   
        <?php }else{ ?>
            <a class="btn mr-1" href="<?= base_url('jugador') ?>">Volver</a>            
        <?php } ?>
         
    </div>   
    </nav>    
    <div class="container">
        <div class="img-wrapper"><img  style ="width: 180px"class="img-fluid mx-auto" src="<?= base_url('img/polla3x2-logo.png') ?>"></div>
        <h1 class="text-center mb-5">Términos y servicios</h1>  
        <ul class="mx-auto mb-5">
            <li>Al registrarse en nuestra web usted acepta por completo estos términos y condiciones.</li>
            <li>Solo se podrán registrar y jugar personas mayores de 18 años.</li>
            <li>Los abonos serán acreditados luego que sean confirmados. El proceso  no suele tardar más de 15 minutos
             en tranferencias del mismo banco.</li>
            <li>Los abonos de saldo que realice desde una cuenta de diferente banco al banco de nuestra cuenta de destino,
             se procesará cuando el dinero se haya hecho efectivo.</li>
            <li>No nos hacemos responsables de abonos hechos de manera errónea por parte del usuario</li>
            <li>Los retiros de saldo se realizarán a la cuenta bancaria indicada por el usuario.</li>
            <li>Es responsabilidad del usuario indicar los datos correctos a la hora de solicitar un retiro.</li>
            <li>El usuario registrado es responsable de mantener la seguridad de su nombre de usuario y clave secreta, 
            no nos hacemos responsables de usos no autorizados por parte de terceros.</li>
            <li>Cualquier actividad fraudulenta por parte del usuario será motivo de suspención de la cuenta.</li>
            <li>El usuario que incumpla los anteriores términos y condiciones de www.polla3x2.com, 
            será suspendido de forma definitiva y no tendrá derecho a reclamar los posibles premios ganados</li>
        </ul>      
    </div>
</header>
<footer>
<div class="container">
    <div class="row">
    <a href="<?= base_url('reglamento') ?>" class="col-sm-4">Reglamento</a href="#">
    <a href="<?= base_url('terminos') ?>" class="col-sm-4">Términos y servicios</a href="#">
    <a href="#" class="col-sm-4">Siguenos en <i class="fab fa-twitter"></i></a href="#">
    </div>      
    <p>Polla3x2 &reg Todos los derechos reservados</p>
</div>    
</footer>
<script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>     
<script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script> 
</body>
</html>