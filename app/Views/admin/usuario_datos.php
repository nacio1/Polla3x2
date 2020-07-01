<?= $this->extend('templates/layout') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url('assets/datatables/datatables.min.css')?>">  
<link rel="stylesheet" href="<?= base_url('assets/datatables/Datatables-1.10.21/css/datatables.bootstrap.min.css')?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<a href="<?= base_url('admin/usuarios') ?>" style = "margin-top: -1rem; margin-left: -1rem" class="btn">
    <i class="fas fa-arrow-left"></i>
</a>  
<h2 class="section-title text-center mb-3"><?= $title ?></h2>
<div class="container row my-3">
    <div class="col-sm-4"><?= $usuario['nombre']. ' ' .$usuario['apellido'] ?></div>       
    <div class="col-sm-4">C:I: <?= $usuario['cedula']?></div>       
    <div class="col-sm-4"><?= $usuario['usuario_email']?></div>       
</div>
<div class="transacciones-nav">
    <ul class="nav nav-pills mb-3">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="pills-jugadas-tab" data-toggle="pill" href="#pills-jugadas" role="tab" aria-controls="pills-jugadas" aria-selected="true">
            Jugadas</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="pills-abonos-tab" data-toggle="pill" href="#pills-abonos" role="tab" aria-controls="pills-abonos" aria-selected="fasle">
            Abonos</a>
        </li>
        <li class="nav-item" role="presentation">
            <a  class="nav-link" id="pills-retiros-tab" data-toggle="pill" href="#pills-retiros" role="tab" aria-controls="pills-retiros" aria-selected="false">
            Retiros</a>
        </li>      
        <li class="nav-item" role="presentation">
            <a  class="nav-link" id="pills-referidos-tab" data-toggle="pill" href="#pills-referidos" role="tab" aria-controls="pills-referidos" aria-selected="false">
            Referidos</a>
        </li>              
    </ul>
</div>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-jugadas" role="tabpanel" aria-labelledby="pills-jugadas-tab">
  <div class="row" style="overflow-x: auto">
        <div class="col-12">
            <table class="table datatables table-striped table-retiros dt-responsive nowrap" width="100%"> 
                <thead>
                    <tr>                                      
                    <th scope="col">Fecha</th>                                                        
                    <th scope="col">Jornada</th>                                                        
                    <th scope="col">Costo</th>                                                        
                    <th scope="col">Pts</th>                                  
                    </tr>
                </thead>
                <tbody>      
                <?php foreach($jugadas as $jugada) { ?>  
                    <tr>
                        <td><?= $jugada['fecha_jugada'] ?></td>
                        <td><?= $jugada['fecha_jornada'] ?></td>
                        <td><?= $jugada['coste_jugada'] ?></td>
                        <td><?= $jugada['total_pts'] ?></td>                        
                    </tr>                
                <?php } ?>                  
                </tbody>                
            </table>    
        </div><!-- cierre col --> 
    </div><!-- cierre row -->
  </div>
  <div class="tab-pane fade" id="pills-abonos" role="tabpanel" aria-labelledby="pills-abonos-tab">
    <div class="row" style="overflow-x: auto">
        <div class="col-12">
            <table class="table datatables table-striped table-retiros dt-responsive nowrap" width="100%"> 
                <thead>
                    <tr>                                      
                    <th scope="col">Fecha</th>                                     
                    <th scope="col">Emisor</th>                                     
                    <th scope="col">Receptor</th>                                     
                    <th scope="col">Num.Ref</th>                                     
                    <th scope="col">Monto</th>                     
                    <th data-priority="-1" scope="col">Status</th>                 
                    </tr>
                </thead>
                <tbody>      
                <?php foreach($abonos as $abono) { ?>  
                    <tr>
                        <td><?= $abono['fecha_abono'] ?></td>
                        <td><?= $abono['banco_emisor'] ?></td>
                        <td><?= $abono['banco_receptor'] ?></td>
                        <td><?= $abono['num_ref'] ?></td>
                        <td><?= $abono['monto'] ?></td>
                        <td><?= $abono['status'] ?></td>
                    </tr>                
                <?php } ?>                  
                </tbody>                
            </table>    
        </div><!-- cierre col --> 
    </div><!-- cierre row -->   
  </div><!-- cierre Pills abonos -->

  <div class="tab-pane fade" id="pills-retiros" role="tabpanel" aria-labelledby="pills-retiros-tab">
    <div class="row" style="overflow-x: auto">
        <div class="col-12">
            <table class="table datatables table-striped table-retiros dt-responsive nowrap" width="100%"> 
                <thead>
                    <tr>                                      
                    <th scope="col">Fecha</th>                                     
                    <th scope="col">Banco</th>                                                        
                    <th scope="col">Monto</th>                     
                    <th data-priority="-1" scope="col">Status</th>                 
                    </tr>
                </thead>
                <tbody>    
                <?php foreach($retiros as $retiro) { ?>   
                    <tr>
                        <td><?= $retiro['fecha_retiro'] ?></td>
                        <td><?= $retiro['banco_nombre'] ?></td>
                        <td><?= $retiro['monto'] ?></td>
                        <td><?= $retiro['status'] ?></td>
                    </tr>
                <?php } ?>                     
                </tbody>                
            </table>    
        </div><!-- cierre col --> 
    </div><!-- cierre row -->   
  </div><!-- cierre Pills retiros -->  

  <div class="tab-pane fade" id="pills-referidos" role="tabpanel" aria-labelledby="pills-referidos-tab">    
    <table style="max-width: 300px" class="table  table-striped"> 
        <thead>
            <tr>                                      
            <th scope="col">Usuario</th>                                     
            <th scope="col">Jugadas</th>                                                            
            </tr>
        </thead>
        <tbody>    
        <?php if($referidos) { 
            foreach($referidos as $referido) {
        ?> 
        <tr>
        <td><?= $referido['usuario']?></td>
        <td><a href="<?= base_url('admin/referidos').'/'.$referido['usuario']?>" class="btn btn-primary">Ver</a></td>
        </tr>         
        <?php } ?>
        <?php }else{ ?>   
            <tr><td colspan="2">
            <h4 style="font-weight: 400" class="text-muted text-center mt-4 mb-5">sin referidos</h3></td></tr>       
        <?php } ?>                   
        </tbody>                
    </table>          
  </div><!-- cierre Pills referidos --> 

</div><!-- cierre tab content --> 
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="<?= base_url('assets/datatables/datatables.min.js') ?>"></script>
<script>
$(document).ready(function(){
    $('.datatables').DataTable({
        language: {
            url: "/assets/datatables/spanish.json",
        },            
        ordering: false,
        searching: false,
        lengthChange: false
    });
})
</script>
<?= $this->endSection() ?>