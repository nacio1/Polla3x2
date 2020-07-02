<?php
$uri = service('uri');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> | Polla3x2</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <?= $this->renderSection('css') ?>
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">    
    <link rel="stylesheet" href="<?= base_url('assets/swa2/sweetalert2.min.css')?>">        
    <link rel="stylesheet" href="<?= base_url('css/jugador.css') ?>">
    <?php if($uri->getSegment(1) == 'admin'): ?>
        <link rel="stylesheet" href="<?= base_url('css/admin.css') ?>">
    <?php endif ?>
    <script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>     
      
    
</head>
<body>
<body>
    <div id="alert-message">
        <script>
            $(document).ready(function(){
                <?= session('message') ?>
            });
        </script>
    </div>
    <div class="wrapper">
        <section class="top-bar">   
            <button class="navbar-toggler hamburguer">
              <i class="fas fa-bars"></i>
            </button>        
            <!--<a class="navbar-brand mr-auto" href="#"> <img src="<?= base_url('img/polla3x2-logo.png') ?>"> </a>-->
            <a href="<?= base_url('jugador/salir') ?>" data-toggle="tooltip" data-placement="bottom" title="Cerrar sesión"><i class="fas fa-sign-out-alt"></i></a>           
        </section>
        <section class="side-bar shadow">
            <button class="navbar-toggler ml-auto" style="color: #fff;">
              <i class="fas fa-times"></i>
            </button>  
            <div class="user-container">
                <div>
                <img class="img-fluid" src="<?= base_url('img/polla3x2-logo.png') ?>">
                </div> 
                <a href="<?= base_url('jugador/perfil') ?>" class="user-name"><span><i class="far fa-user"></i></span> <?= session('usuario') ?></a href="#">
                <p>Saldo: <span id="saldo"><?= number_format(session('usuario_saldo'), 2, ',', '.') ?></span></p>  
                <div class="user-menu-toggle" style="cursor: pointer">
                    <i class="fas fa-sort-down"></i>
                </div>             
                <div class="user-menu">
                    <a href="<?= base_url('jugador/mis-cuentas') ?>">Mis cuentas</a>
                    <a href="<?= base_url('jugador/mis-transacciones') ?>">Mis transacciones</a>                                                         
                    <a href="<?= base_url('jugador/salir') ?>">Cerrar sesión</a>
                </div>  
            </div>
            <ul class="menu">
                <li><a class="<?= ($uri->getSegment(1) == 'jugador' && ($uri->getSegment(2) == 'jugar' || $uri->getSegment(2) == '') ? 'active' : null) ?>" href="<?= base_url('jugador') ?>">Jugar</a></li>                                
                <li><a class="<?= ($uri->getSegment(2) == 'puntuacion' ? 'active' : null) ?>" href="<?= base_url('jugador/puntuacion') ?>">Puntuación</a></li>
                <li><a class="<?= ($uri->getSegment(2) == 'abonar' ? 'active' : null) ?>" href="<?= base_url('jugador/abonar') ?>">Abonar</a></li>
                <li><a class="<?= ($uri->getSegment(2) == 'retirar' ? 'active' : null) ?>" href="<?= base_url('jugador/retirar') ?>">Retirar</a></li>
                <?php if(session('usuario_role') == 'admin') { ?>
                    <li><a class="" href="<?= base_url('admin') ?>">Admin</a></li>
                <?php } ?>
            </ul>              
        </section>
        <section class="main-content">
        <?= $this->renderSection('content') ?>
        </section>
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
    </div>       
<script>
window.urlBase = '<?= base_url() ?>/';
$(document).ready(function(){  
  //Abrir y cerrar menu--- responsive 
  $('.navbar-toggler').click(function(e){                       
      e.stopPropagation();
      $('.side-bar').toggleClass('nav-open');
  });

  $('.side-bar').click(function(e){
      e.stopPropagation();
  });

  $('body,html').click(function(e){     
      $('.side-bar').removeClass('nav-open');      
  });

  $('.user-menu-toggle').on('click', function(){  
        var icon = $(this).children();   
        $(icon).toggleClass('fa-sort-down fa-sort-up');
        $('.user-menu').toggle("slow", function() {
            // Animation complete.            
        });        
    })
     
});  
</script> 
<script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>    
<script src="<?= base_url('assets/swa2/sweetalert2.all.js') ?>"></script>    
<script src="<?= base_url('assets/jquery_validation/jquery.validate.min.js') ?>"></script>
<script src="<?= base_url('assets/jquery_validation/additional-methods.min.js') ?>"></script>
<script src="<?= base_url('assets/jquery_validation/messages_es.min.js') ?>"></script> 
<?= $this->renderSection('js') ?>
</body>
</html>