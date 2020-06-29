<?php
$uri = service('uri');
?>
<?= $this->extend('templates/layout') ?>

<?= $this->section('content') ?>
<div class="jugar-container">                  
    <ul class="nav nav-pills mb-3">
        <li class="nav-item" role="presentation">
          <a href="<?= base_url('jugador') ?>" 
          class="nav-link <?= ($uri->getSegment(1) == 'jugador' && ($uri->getSegment(2) == 'jugar' || $uri->getSegment(2) == '') ? 'active' : null) ?>">
            Jugar
          </a>
        </li>
        <li class="nav-item" role="presentation">
          <a href="<?= base_url('jugador/mis-jugadas') ?>" class="nav-link <?= ($uri->getSegment(2) == 'mis-jugadas' ? 'active' : null) ?>">
            Mis jugadas
          </a>
        </li>                    
    </ul>
    
    <div class="jugar-section"> 
        <div class="jugar-wrapper">
            <?= form_open('jugador/crear-jugada','method="POST" id="jugar-form" class=""') ?> 
                <h1 class="mb-4">Sella tu jugada</h1> 
                <?php if(session('usuario_role') == 'admin') { ?>
                    <div style="max-width: 200px" class="form-group">
                        <label for="usuario">Usuario</label>
                        <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Ingresa el usuario">
                    </div>
                <?php } ?>
                <?php                         
                for($i=0; $i<6; $i++) {
                    $name = $i + 1 .'va_ejemplar';//nombre del input
                ?>                
                    <div class="valida-wrapper">
                        <div class="form-check form-check-inline">
                            <br>
                            <div class="input-check-wrapper valida-index">
                                <div class="form-check-input"><?= $i + 1 //1va,2va...?>va</div>                        
                            </div>                               
                        </div>
                        <?php for ($i2=0; $i2 < $cantidad_ejemplares[$i]; $i2++) { ?>
                            <?php if( !in_array($i2 + 1, explode(',', $ejemplares_retirados[$i])) ) {//Si numero no esta retirado ?>                           
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label" for=""><?= $i2 + 1?></label>
                                    <div class="input-check-wrapper">
                                        <input class="form-check-input" type="radio" name="<?= $name ?>" id="<?= $name ?>" value="<?= $i2 + 1?>"> 
                                    </div>                               
                                </div>
                            <?php } ?>                             
                        <?php }//endfor 2 ?>                    
                    </div>
                <?php }//endfor 1?>            

                <?php if($GLOBALS['status'] && !$GLOBALS['cierre']) { ?>
                <div class="form-group text-center form-button-wrapper mt-3">
                    <button class="btn btn-lg <?= (session('usuario_contador') < 2) ? 'btn-danger' : 'primary-btn'?> my-3 " id="submitButton" type="submit">
                    <?= (session('usuario_contador') < 2) ? 'Jugar' : 'Gratis'?>
                    </button>
                    <?php if(session('usuario_contador') == 0 ) { ?>
                        <p class="text-muted">Recuerda aprovechar el 3x2 y aumenta tus chances de ganar</p>
                    <?php }elseif(session('usuario_contador') == 1) { ?>
                        <p class="text-muted">Sella una vez más y tu próxima jugada será <b>gratis</b></p>
                    <?php } ?>
                    
                </div>   
                <?php } ?> 
            </form>        
        </div>    
        <div class="premio-container">
           <?= view_cell('\App\Libraries\Component::premio', ['premio' => $premio, 'gratis' => $gratis]) ?>
        </div>               
    </div><!-- //Jugar-section -->        
    
</div><!-- //Jugar container  -->
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="<?= base_url('js/jugar.js') ?>"></script>
<script>
window.fecha_cierre = '<?= $GLOBALS['fecha_cierre'] ?>';
window.cierre = '<?= $GLOBALS['cierre'] ?>';
window.status = '<?= $GLOBALS['status'] ?>';
</script>
<script src="<?= base_url('js/premio.js') ?>"></script>
<?php if(session('usuario_role') == 'admin') { ?>
<script>
$(document).ready(function(){
    $('#usuario').change(function(){
        var usuario = $(this).val();
        $.ajax({  
        url: urlBase + "jugador/userExists",  
        method:"POST",  
        data: {usuario},         
        success:function(data){  
            if(data == 'false') {                 
                $('#usuario').parent().append('<label id="error" style="color: #b33939">Usuario ya existe</label>')                         
            }else{
                $('#error').remove();
            }
        }  
    });
    })
});
</script>                    
<?php } ?>
<?= $this->endSection() ?>