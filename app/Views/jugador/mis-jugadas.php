<?php
$uri = service('uri');
?>
<?= $this->extend('templates/layout') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url('assets/datatables/datatables.min.css')?>">  
<link rel="stylesheet" href="<?= base_url('assets/datatables/Datatables-1.10.21/css/datatables.bootstrap.min.css')?>">
<style>
.modal-body {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.modal-body .form-group {
  flex-wrap: nowrap;
}

.modal-body .form-group input {
  max-width: 3rem;
  text-align: center;
  margin-left: .5rem;
}


</style>
<?= $this->endSection() ?> 

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
            <div style="overflow-x: auto">
                <h1 class="mb-4">Mis Jugadas</h1> 
                
                <table class="table datatables table-striped table-mis-jugadas">            
                    <thead class="">
                        <tr>         
                        <th scope="col">Fecha</th>       
                        <th scope="col">id</th>       
                        <th data-priority="2" scope="col">1va</th>                        
                        <th data-priority="2" scope="col">2va</th>                            
                        <th data-priority="2" scope="col">3va</th>                        
                        <th data-priority="2" scope="col">4va</th>                        
                        <th data-priority="2" scope="col">5va</th>                           
                        <th data-priority="2" scope="col">6va</th>                               
                        <th data-priority="1"scope="col">Puntos</th>  
                        <?php if($GLOBALS['status'] && !$GLOBALS['cierre']) { ?>     
                        <th data-priority="-1" scope="col">Editar</th>     
                        <?php } ?>  
                        </tr>
                    </thead>
                    <tbody>   
                    <?php if($mis_jugadas) { ?>                   
                        <?php 
                        $i = 0;//index para colocar siempre la primera fecha               
                        foreach ($mis_jugadas as $mi_jugada) { ?>
                            <tr>                            
                            <td><?= $mi_jugada['fecha_jugada']?></td>                           
                            <td><?= $mi_jugada['jugada_id']?></td>
                            <td><?= $mi_jugada['1va_ejemplar']?></td>                            
                            <td><?= $mi_jugada['2va_ejemplar']?></td>                            
                            <td><?= $mi_jugada['3va_ejemplar']?></td>                            
                            <td><?= $mi_jugada['4va_ejemplar']?></td>                            
                            <td><?= $mi_jugada['5va_ejemplar']?></td>                            
                            <td><?= $mi_jugada['6va_ejemplar']?></td>                                                
                            <td><?= $mi_jugada['total_pts']?></td>   
                            <?php if($GLOBALS['status'] && !$GLOBALS['cierre']) { ?>
                            <td>
                            <?php if($mi_jugada['jornada_id'] == $GLOBALS['jornada_id'] ) { ?>
                            <button type="button" class="btn btn-primary edit-button" data-toggle="modal" data-target="#editarModal">
                            <i class="fas fa-edit"></i>
                            </button>
                            <?php } ?>
                            </td>   
                            <?php } ?>    
                            </tr>
                        <?php } ?>
                    <?php }else{ ?>
                            <h2 class=" text-center mt-4 mb-5">Aún no has registrado jugadas</h2>
                    <?php }?> 
                    </tbody>
                </table>         
            </div>                        
        </div>    
        <div class="premio-container">
           <?= view_cell('\App\Libraries\Component::premio', $premio) ?>
        </div>               
    </div><!-- //Jugar-section --> 
</div><!-- //Jugar container  -->
<!-- Editar Modal -->
<div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="editarModal" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Tu Jugada</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>        
      </div>

      <form class="edit-form" id="editar-form" method="POST" action="<?= base_url('jugador/editar-jugada')?>">
        <div class="modal-body">        
            <input type="hidden" class="form-control" id="jugada_id" name="jugada_id">  
            <div class="form-group row">
              <label for="1va_ejemplar" class="col-form-label">1va)</label>            
              <input type="number" required class="form-control" id="1va_ejemplar" name="1va_ejemplar">            
            </div>

            <div class="form-group row">
              <label for="2va_ejemplar" class="col-form-label">2va)</label>            
              <input type="number" required class="form-control" id="2va_ejemplar"  name="2va_ejemplar">            
            </div>

            <div class="form-group row">
              <label for="3va_ejemplar" class="col-form-label">3va)</label>            
              <input type="number" required class="form-control" id="3va_ejemplar" name="3va_ejemplar">            
            </div>

            <div class="form-group row">
              <label for="4va_ejemplar" class="col-form-label">4va)</label>            
              <input type="number" required class="form-control" id="4va_ejemplar" name="4va_ejemplar">            
            </div>

            <div class="form-group row">
              <label for="5va_ejemplar" class="col-form-label">5va)</label>            
              <input type="number" required class="form-control" id="5va_ejemplar" name="5va_ejemplar">            
            </div>

            <div class="form-group row">
              <label for="6va_ejemplar" class="col-form-label">6va)</label>            
              <input type="number" required class="form-control" id="6va_ejemplar" name="6va_ejemplar">            
            </div>
          
        </div>

        <div class="modal-footer">        
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary guardar-button">Guardar</button>
        </div>
      </form>  
    </div>
  </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="<?= base_url('assets/datatables/datatables.min.js') ?>"></script>
<script src="<?= base_url('js/mis-jugadas.js') ?>"></script>
<script>
window.fecha_cierre = '<?= $GLOBALS['fecha_cierre'] ?>';
window.cierre = '<?= $GLOBALS['cierre'] ?>';
window.status = '<?= $GLOBALS['status'] ?>';
</script>
<script src="<?= base_url('js/premio.js') ?>"></script>
<?= $this->endSection() ?>