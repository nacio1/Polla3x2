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
    <title>Reglamento | Polla3x2</title>
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
        <h1 class="text-center mb-5">Reglamento</h1>
        <ul class="mx-auto mb-5">
            <li>Las carreras válidas de la jornada serán las últimas 6 del hipódromo seleccionado.</li>
            <li>La asignación de puntos es basada en el orden oficial de llegada.</li>
            <li>El ejemplar en llegar en 1ra posición sumará 5 puntos, el 2do lugar 3 puntos y el 3ro 1 punto.</li>
            <li>En caso de empate en alguno de los tres primeros lugares, cada ejemplar tendrá la puntuación correspondiente al lugar de empate. 
            Ejemplo si hay empate para el 1er lugar, cada uno de los ejemplares otorgaran 5 puntos al apostador.</li>
            <li>En caso de tocarle un ejemplar retirado se asumirá como ejemplar jugado el ejemplar siguiente en orden numérico de esa carrera valida.
            Los ejemplares invalidados por los hipodromos contarán como retirados.</li>
            <li>Las jugadas gratis no suman al premio.</li>
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