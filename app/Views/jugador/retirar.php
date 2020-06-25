<?= $this->extend('templates/layout') ?>

<?= $this->section('css') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1 class="mb-4 retirar-title" style="font-weight: 400">Retirar</h1>
<form id="retirar-form" class="retirar-form" method="POST" action="<?= base_url('jugador/agregar-retiro') ?>">
    <div class="form-row">
        <div class="form-group col-sm-6">
            <label for="inputEmail4">Banco</label>
            <select id="banco" name="banco" class="form-control " id="" placeholder="">
                <option value="" selected>Selecciona tu banco</option>
                <?php foreach($cuentas as $cuenta) { ?>
                <option value="<?= $cuenta['cuenta_id'] ?>"><?= $cuenta['nombre'] ?> <?= $cuenta['numero_cuenta'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group col-sm-6">
            <label for="">Monto</label>
            <input type="text" class="form-control" id="monto" name="monto" placeholder="Monto mínimo: Bs.<?= $GLOBALS['coste_jugada']?>" >
        </div> 
    </div>    
    <div class="col-12 text-center mt-2">            
        <button type="submit" class="btn primary-btn btn-lg retirar-button">Retirar</button>                      
    </div> 
</form>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
$(document).ready(function(){
    window.costeJugada = <?= $GLOBALS['coste_jugada'] ?>;
})    
</script>

<script src="<?= base_url('js/retirar.js') ?>"></script>
<?= $this->endSection() ?>