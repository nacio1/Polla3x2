<?= $this->extend('templates/layout') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url('assets/datatables/datatables.min.css')?>">  
<link rel="stylesheet" href="<?= base_url('assets/datatables/Datatables-1.10.21/css/datatables.bootstrap.min.css')?>">
<style>
    .tab-content {
        max-width: 800px;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="transacciones-nav">
    <ul class="nav nav-pills mb-3">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="pills-abonos-tab" data-toggle="pill" href="#pills-abonos" role="tab" aria-controls="pills-abonos" aria-selected="true">
            Abonos</a>
        </li>
        <li class="nav-item" role="presentation">
            <a  class="nav-link" id="pills-retiros-tab" data-toggle="pill" href="#pills-retiros" role="tab" aria-controls="pills-retiros" aria-selected="false">
            Retiros</a>
        </li>                    
    </ul>
</div>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-abonos" role="tabpanel" aria-labelledby="pills-abonos-tab">
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

</div><!-- cierre tab content --> 

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="<?= base_url('assets/datatables/datatables.min.js') ?>"></script>
<script src="<?= base_url('js/mis-transacciones.js') ?>"></script>
<?= $this->endSection() ?>