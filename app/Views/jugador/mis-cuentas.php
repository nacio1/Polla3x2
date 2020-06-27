<?= $this->extend('templates/layout') ?>

<?= $this->section('css') ?>
<style>
.table-wrapper {
    max-width: 500px;
    text-align: center;
}
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<button class="btn btn-secondary" data-toggle="modal" data-target="#agregarCuentaModal">Agregar cuenta</button>

<div class="table-responsive table-wrapper mt-5">
    <h1 style="font-weight: 400;">Mis cuentas</h1>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>   
                <th>Banco</th>
                <th>Número de cuenta</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($cuentas as $cuenta) { ?>
            <tr>
                <td style="display: none"><?= $cuenta['cuenta_id']?></td>
                <td style="display: none"><?= $cuenta['banco_id']?></td>
                <td><?= $cuenta['nombre']?></td>
                <td><?= $cuenta['numero_cuenta']?></td>
                <td><button class="btn btn-primary edit-button" data-toggle="modal" data-target="#editarCuentaModal"><i class="fas fa-edit"></i></button></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<div class="modal fade" id="agregarCuentaModal" tabindex="-1" role="dialog" aria-labelledby="agregarCuentaModal" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agregar cuenta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>        
      </div>

      <form class="cuentas-form" id="cuentas-form" method="POST" action="<?= base_url('jugador/agregar-cuenta')?>">
        <div class="modal-body" style="padding: 1.5rem">  
            <div class="form-group row">
              <label for="banco" class="col-form-label">Banco</label>            
              <select type="text" required class="form-control" id="banco" name="banco">
                <option value="" selected>Selecciona el banco</option>
                <?php foreach($bancos as $banco) { ?>
                    <option value="<?= $banco['banco_id']?>"><?= $banco['nombre']?></option>   
                <?php } ?>
              </select>            
            </div>

            <div class="form-group row">
              <label for="numero_cuenta" class="col-form-label">Número de cuenta</label>            
              <input type="number" required class="form-control" id="numero_cuenta"  name="numero_cuenta" placeholder="Número de cuenta">            
            </div>                       
        </div>

        <div class="modal-footer">            
          <button type="submit" class="btn primary-btn mx-auto enviar-button">Enviar</button>
        </div>
      </form>  
    </div>
  </div>
</div>
<div class="modal fade" id="editarCuentaModal" tabindex="-1" role="dialog" aria-labelledby="editarCuentaModal" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editat cuenta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>        
      </div>

      <form class="edit-cuentas-form" id="edit-cuentas-form" method="POST" action="<?= base_url('jugador/editar-cuenta')?>">
        <div class="modal-body" style="padding: 1.5rem">  
            <input type="hidden" name="cuenta_id" id="cuenta_id">      
            <div class="form-group row">
              <label for="banco2" class="col-form-label">Banco</label>            
              <select type="text" required class="form-control" id="banco2" name="banco2">
                <option value="" selected>Selecciona el banco</option>
                <?php foreach($bancos as $banco) { ?>
                    <option value="<?= $banco['banco_id']?>"><?= $banco['nombre']?></option>   
                <?php } ?>
              </select>            
            </div>

            <div class="form-group row">
              <label for="numero_cuenta2" class="col-form-label">Número de cuenta</label>            
              <input type="number" required class="form-control" id="numero_cuenta2"  name="numero_cuenta2" placeholder="Número de cuenta">            
            </div>                       
        </div>

        <div class="modal-footer">            
          <button type="submit" class="btn btn-primary mx-auto enviar-button">Enviar</button>
        </div>
      </form>  
    </div>
  </div>
</div>
<?= $this->endSection() ?> 

<?= $this->section('js') ?>
<script src="<?= base_url('js/bancos.js')?>"></script>
<?= $this->endSection() ?>  