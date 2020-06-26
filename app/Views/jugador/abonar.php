<?= $this->extend('templates/layout') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url('assets/datetimepicker/jquery.datetimepicker.min.css')?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="abonar-container row">
    <div class="abono-pasos col-md-5">
      <h1>¿Cómo abonar?</h1>
      <h2><span class="number">1</span>  Selecciona un banco</h2>
      <p>Selecciona el banco de tu preferencia</p>
      <i class="fas fa-angle-down fa-2x mb-2"></i>
      <h2><span class="number">2</span> Realiza la transferencia</h2>
      <p>Realiza la transferencia al banco escogido con el monto deseado</p>
      <strong>
          <span class="badge badge-danger">Monto mínimo: Bs.100000</span>
      </strong><br>
      <i class="fas fa-angle-down fa-2x mb-2"></i>
      <h2><span class="number">3</span> Notificar transferencia</h2>
      <p>Haz click en el botón y rellena los datos de la transferencia</p>
      <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#abonarModal">ABONAR</button>
    </div><!-- Abono-pasos -->
    <div class="col-md-7 cuentas-container">
      <ul class="cuentas-bancarias">
        <li class="title">
            <h2>Cuentas bancarias</h2>
        </li>                  
        <li class="bank-item">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <img class="img-fluid" src="/img/banesco-logo.png" alt="">
                </div>
                <div class="col-md-7">
                    <p>Cuenta ahorro</p>
                    <p>0021 1702 1217 2030</p>
                    <p>Teodoro Chirino</p>
                    <p>C.I: 9924872</p>
                </div>
            </div>
        </li>  
        <li class="bank-item">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <img class="img-fluid" src="/img/mercantil-logo.png" alt="">
                </div>
                <div class="col-md-7">
                    <p>Cuenta ahorro</p>
                    <p>0021 1702 1217 2030</p>
                    <p>Teodoro Chirino</p>
                    <p>C.I: 9924872</p>
                </div>
            </div>
        </li>  
        <li class="bank-item">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <img class="img-fluid" src="/img/bnc-logo.png" alt="">
                </div>
                <div class="col-md-7">
                    <p>Cuenta ahorro</p>
                    <p>0021 1702 1217 2030</p>
                    <p>Teodoro Chirino</p>
                    <p>C.I: 9924872</p>
                </div>
            </div>
        </li> 
        <li class="bank-item">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <img class="img-fluid" src="/img/banco-venezuela.png" alt="">
                </div>
                <div class="col-md-7">
                    <p>Cuenta ahorro</p>
                    <p>0021 1702 1217 2030</p>
                    <p>Teodoro Chirino</p>
                    <p>C.I: 9924872</p>
                </div>
            </div>
        </li> 
    </ul>
    </div><!-- //Cuentas-bancarias -->
    <div class="modal fade" id="abonarModal" tabindex="-1" role="dialog" aria-labelledby="abonarModal" style="display: none;" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Datos de la transferencia</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form action="<?= base_url('jugador/crear-abono') ?>" class="abonar-form" id="abonar-form" method="post" accept-charset="utf-8" novalidate="novalidate">
          <div class="modal-body">  
    
            <div class="form-group">
                <label for="bancor_receptor">Banco a donde realizó la transferencia</label>
                <select id="banco_receptor" name="banco_receptor" class="form-control">
                    <option value="" selected="">Seleccione</option>
                    <option value="banesco">Banesco</option>
                </select>
            </div>
    
            <div class="form-row">                
                <div class="form-group col-6">
                    <label for="bancor_emisor">Banco emisor</label>
                    <select id="banco_emisor" name="banco_emisor" class="form-control">
                        <option value="" selected="">Seleccione</option>
                        <?php foreach($bancos as $banco) { ?>
                            <option value="<?= $banco['banco_id']?>"><?= $banco['nombre']?></option>   
                        <?php } ?>
                    </select>
                </div>     
                <div class="form-group col-6">
                    <label for="num_ref">Número de referencia</label>
                    <input type="text" class="form-control" id="num_ref" name="num_ref">                         
                </div>                      
            </div>
            
            <div class="form-group">
                <label for="num_cuenta">Número de cuenta</label> 
                <input type="text" class="form-control" id="num_cuenta" name="num_cuenta">                       
            </div>                       
    
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="fecha">Fecha de la transferencia</label> 
                    <input type="text" class="form-control datepicker" id="fecha" name="fecha">                       
                </div>   
                <div class="form-group col-sm-6">
                    <label for="Monto">Monto transferido</label>
                    <input type="text" class="form-control" id="monto" name="monto">                         
                </div>      
            </div>
            
          </div>
          <div class="modal-footer">        
            <button type="submit" class="btn btn-primary mx-auto">Enviar</button>
          </div>
          </form>
        </div><!-- //Modal-content -->
      </div><!-- //Modal-dialog -->
    </div><!-- //Modal -->
</div>
<?= $this->endSection() ?>
<?= $this->section('js') ?>
<script src="<?= base_url('assets/datetimepicker/jquery.datetimepicker.full.min.js') ?>"></script>
<script src="<?=base_url('js/abonar.js') ?>"></script>
<?= $this->endSection() ?>
