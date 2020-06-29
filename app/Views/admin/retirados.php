<?= $this->extend('templates/layout') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url('assets/datatables/datatables.min.css')?>">  
<link rel="stylesheet" href="<?= base_url('assets/datatables/Datatables-1.10.21/css/datatables.bootstrap.min.css')?>">
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
<div class="row" style="overflow-x: auto">
    <div class="col-12">
        <!-- Retirados Table -->    
        <table class="table table-bordered datatables dt-responsive nowrap table-striped" width="100%">
            <thead class="thead-dark">
                <tr>     
                <th></th>           
                <th scope="col">Jornada</th>                
                <th scope="col">1va</th>                 
                <th scope="col">2va</th>                 
                <th scope="col">3va</th>                 
                <th scope="col">4va</th>                 
                <th scope="col">5va</th>                 
                <th scope="col">6va</th>     
                <th>Editar</th>            
                </tr>
            </thead>
            <tbody> 
            <?php foreach ($retirados as $retirados) { ?>
                <tr>
                <td><?= $retirados['retirados_id'] ?></td>
                <td><?= $retirados['fecha_jornada'] ?></td>
                <td><?= $retirados['1va_retirados'] ?></td>
                <td><?= $retirados['2va_retirados'] ?></td>
                <td><?= $retirados['3va_retirados'] ?></td>
                <td><?= $retirados['4va_retirados'] ?></td>
                <td><?= $retirados['5va_retirados'] ?></td>
                <td><?= $retirados['6va_retirados'] ?></td>
                <td>
                    <button type="button" class="btn btn-primary edit-button" data-toggle="modal" data-target="#editarModal">
                        <i class="fas fa-edit"></i>
                    </button>
                </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>        
</div>
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

      <form class="edit-form" id="editar-form" method="POST" action="<?= base_url('admin/editar-retirados')?>">
        <div class="modal-body" style="padding: 1.5rem">        
            <input type="hidden" class="form-control" id="retirados_id" name="retirados_id">  
            <div class="form-group row">
              <label for="1va_retirados" class="col-form-label">1va)</label>            
              <input type="text" class="form-control" id="1va_retirados" name="1va_retirados">            
            </div>

            <div class="form-group row">
              <label for="2va_retirados" class="col-form-label">2va)</label>            
              <input type="text" class="form-control" id="2va_retirados"  name="2va_retirados">            
            </div>

            <div class="form-group row">
              <label for="3va_retirados" class="col-form-label">3va)</label>            
              <input type="text" class="form-control" id="3va_retirados" name="3va_retirados">            
            </div>

            <div class="form-group row">
              <label for="4va_retirados" class="col-form-label">4va)</label>            
              <input type="text" class="form-control" id="4va_retirados" name="4va_retirados">            
            </div>

            <div class="form-group row">
              <label for="5va_retirados" class="col-form-label">5va)</label>            
              <input type="text" class="form-control" id="5va_retirados" name="5va_retirados">            
            </div>

            <div class="form-group row">
              <label for="6va_retirados" class="col-form-label">6va)</label>            
              <input type="text" class="form-control" id="6va_retirados" name="6va_retirados">            
            </div>
          
        </div>

        <div class="modal-footer">        
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn primary-btn guardar-button">Guardar</button>
        </div>
      </form>  
    </div>
  </div>
</div><!-- editar-modal -->
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="<?= base_url('assets/datatables/datatables.min.js') ?>"></script>
<script>
$(document).ready(function(){ 
    $('.datatables').DataTable({
        language: {
            url: "/assets/datatables/spanish.json",
        },           
        "columnDefs": [
            {
            "targets": [ 0 ],
            "visible": false,
            "searchable": false
            }          
        ],     
        ordering: false,
        searching: false,
        lengthChange: false
    });
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

    //Click en edit modal button
  $('.edit-button').on('click', function() {
    //Seleccionar padre tr de la jugada seleccionada
    $tr = $(this).closest('tr');

    //Almacenar los hijos de tr(td) en un array
    var data = $tr.children('td').map(function(){ 
        console.log($(this).text());     
        return $.trim($(this).text());   
                     
    }).get();    
    var retirados_id = $('.datatables').DataTable().row($tr).data()[0];

    //Asignar valores a editar-modal   
    $('#retirados_id').val(retirados_id);
    $('#1va_retirados').val(data[1]);
    $('#2va_retirados').val(data[2]);
    $('#3va_retirados').val(data[3]);
    $('#4va_retirados').val(data[4]);
    $('#5va_retirados').val(data[5]);
    $('#6va_retirados').val(data[6]);
  });
});    
</script>
<?= $this->endSection() ?>