<?= $this->extend('templates/layout') ?>

<?= $this->section('css') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<a href="<?= base_url('admin') ?>" style = "margin-top: -1rem; margin-left: -1rem" class="btn">
    <i class="fas fa-arrow-left"></i>
</a>  
<form action="<?= base_url('admin/retirar-ejemplar') ?>" method="POST" class="form-inline mb-3" id="retirados-form">
    <div class="form-group">
        <label class="mx-1 d-none d-sm-block" for="valida_retirados">Válida</label>
        <select class="custom-select mx-1" name="valida_retirados" id="valida_retirados">
            <option  value="1va_retirados" selected>1ra válida</option>
            <option  value="2va_retirados">2da válida</option>
            <option  value="3va_retirados">3ra válida</option>
            <option  value="4va_retirados">4ta válida</option>
            <option  value="5va_retirados">5ta válida</option>
            <option  value="6va_retirados">6ta válida</option>
        </select>
        
        <input type="text" class="form-control mx-1" name="numero" id="numero" placeholder="N-" style="">
        <input type="hidden" name="num_ejemplares" id="num_ejemplares" value="1va_ejemplares">
        <input type="hidden" name="columna_jugada" id="columna_jugada"  value="1va_ejemplar">

        <button type="submit" class="btn btn-danger ml-1">Enviar</button>
    </div>
</form>
<div class="table-responsive">
        <!-- Retirados Table -->    
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>                
                <th scope="col">Fecha_jornada</th>                
                <th scope="col">1va_retirados</th>                 
                <th scope="col">2va_retirados</th>                 
                <th scope="col">3va_retirados</th>                 
                <th scope="col">4va_retirados</th>                 
                <th scope="col">5va_retirados</th>                 
                <th scope="col">6va_retirados</th>                 
                </tr>
            </thead>
            <tbody> 
            <?php foreach ($retirados as $retirados) { ?>
                <tr>
                <td><?= $retirados['fecha_jornada'] ?></td>
                <td><?= $retirados['1va_retirados'] ?></td>
                <td><?= $retirados['2va_retirados'] ?></td>
                <td><?= $retirados['3va_retirados'] ?></td>
                <td><?= $retirados['4va_retirados'] ?></td>
                <td><?= $retirados['5va_retirados'] ?></td>
                <td><?= $retirados['6va_retirados'] ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
$(document).ready(function(){ 
    $('#retirados-form').validate({
        submitHandler: function(form) {
            var valida = $('#valida_retirados').children('option:selected').html();
            var numero = $('#numero').val();

            Swal.fire({
                title: '¿Retirar ejemplar?',
                html: valida + ': ' + numero,
                showCloseButton: true,                    
                confirmButtonColor: '#3085d6',                    
                confirmButtonText: 'Confirmar'
            }).then((result) => {
                if(result.value) {
                    form.submit();
                }
            })
        },
        rules: {
            valida_retirados: 'required',
            numero: {
                required: true,
                digits: true,
                maxlength: 2
            }
        }
    });
});    
</script>
<?= $this->endSection() ?>