<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/main.css') ?>">
    
    <title>Polla3x2</title>
</head>
<body>
<header>
    <nav class="navbar">  
    <div class="container d-flex justify-content-end">
        <a class="navbar-brand mr-auto" href="/">Polla3x2</a>
        <a class="btn mr-1" href="<?= base_url('login') ?>">Login</a>
        <a class="btn btn-danger btn-sm" href="<?= base_url('registro') ?>">Crear Cuenta</a>    
    </div>   
    </nav>
    <div class="div header-content">
    <h1>Bienvenido a la Polla3x2</h1>
    <p>En donde sellas 2 y la tercera jugada es totalmente <i>Gratis</i></p>
    <a href="<?= base_url('registro') ?>" class="btn btn-danger btn-lg">Únete Ahora</a>
    </div>
</header>
<section class="cards-section">  
<div class="container">
    <div class="card-deck">    
    <div class="card">
        <div class="card-header">
        Múltiple Ganadores
        </div>
        <div class="card-body">
        <h5 class="card-title">Premio al 1ro y 2do lugar</h5>
        <p class="card-text">Más chances de ganar. El premio será repartido a los 2 usuarios con mayor cantidad de puntos. En caso de empate se distribuye en partes iguales.</p>          
        </div>          
    </div>
    <div class="card">
        <div class="card-header">
        Puntuación al Instante
        </div>
        <div class="card-body">
        <h5 class="card-title">¿Culminó la carrera y quieres saber tu puntuación?</h5>
        <p class="card-text"> Una vez presentado el orden oficial todas las posiciones y puntos serán actualizados de inmediato.</p>
        </div>          
    </div>
    <div class="card">
        <div class="card-header">
        Actualiza tu Jugada
        </div>
        <div class="card-body">
        <h5 class="card-title">¿Ya sellaste y te retiraron un ejemplar?</h5>
        <p class="card-text">No hay problema, en la Polla3x2 puedes cambiar tu jugada hasta la hora de cierre.</p>
        </div>          
    </div>  
    </div><!-- /Card-deck -->     
</div><!-- /Container --> 
</section>
<footer>
<div class="container">
    <div class="row">
    <a href="#" class="col-sm-4">Reglamento</a href="#">
    <a href="#" class="col-sm-4">Términos y servicios</a href="#">
    <a href="#" class="col-sm-4">Siguenos en <i class="fab fa-twitter"></i></a href="#">
    </div>      
    <p>Polla3x2 &reg Todos los derechos reservados</p>
</div>    
</footer>
<script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>     
<script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script> 
</body>
</html>