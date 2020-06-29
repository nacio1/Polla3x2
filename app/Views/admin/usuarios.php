<?= $this->extend('templates/layout') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url('assets/datatables/datatables.min.css')?>">  
<link rel="stylesheet" href="<?= base_url('assets/datatables/Datatables-1.10.21/css/datatables.bootstrap.min.css')?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<a href="<?= base_url('admin') ?>" style = "margin-top: -1rem; margin-left: -1rem" class="btn">
    <i class="fas fa-arrow-left"></i>
</a>  
<h2 class="section-title text-center mb-3">Usuarios</h2>
<div class="row" style="overflow-x: auto">
    <div class="col-12">
        <!-- Retirados Table -->    
        <table class="table datatables dt-responsive nowrap table-striped" width="100%">
            <thead class="thead-dark">
                <tr>                          
                <th scope="col">Usuario</th>                                               
                <th scope="col">Creado</th>                                               
                <th scope="col">Login</th>                         
                <th scope="col">Saldo</th>                         
                <th scope="col">Rol</th>                         
                <th data-priority="-1" scope="col">Detalles</th>                         
                </tr>
            </thead>
            <tbody>       
            <?php foreach($usuarios as $usuario) { ?>  
            <tr>
            <td><?= $usuario['usuario'] ?></td>
            <td><?= $usuario['fecha_creado'] ?></td>
            <td><?= $usuario['login'] ?></td>
            <td><?= number_format($usuario['usuario_saldo'], 2, ',', '.') ?></td>
            <td><?= $usuario['role'] ?> <button style="padding: .25rem .5rem" class="btn btn-warning btn-sm cambiarRol-button" data-toggle="modal" data-target="#cambiarRolModal"><i class="fas fa-edit"></i></button></td>
            <td><a href="<?= base_url('admin/usuarios').'/'. $usuario['usuario'] ?>" class="btn btn-primary">Ver</a></td>
            </tr>    
            <?php } ?>      
            </tbody>
        </table>
    </div>        
</div>

<div class="modal fade" id="cambiarRolModal" tabindex="-1" role="dialog" aria-labelledby="cambiarRolModal" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Tu Jugada</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>        
      </div>

      <form class="edit-form" id="cambiarRol-form" method="POST" action="<?= base_url('admin/cambiar-rol')?>">
        <div class="modal-body">               
            <div class="form-group">
              <label for="usuario" class="col-form-label">Usuario</label>            
              <input type="text" readonly required class="form-control" id="usuario" name="usuario">            
            </div>

            <div class="form-group">
              <label for="usuario_role" class="col-form-label">Rol</label>            
              <select class="form-control" name="usuario_role" id="usuario_role">
                <option value="jugador">Jugador</option>
                <option value="admin">Admin</option>
              </select>               
            </div>            
        </div>

        <div class="modal-footer">        
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn primary-btn guardar-button">Guardar</button>
        </div>
      </form>  
    </div>
  </div>
</div>
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
    });
    $('.cambiarRol-button').on('click', function() {
        $tr = $(this).closest('tr');
        //Almacenar los hijos de tr(td) en un array
        var data = $tr.children('td').map(function(){     
            return $(this).text();             
        }).get();
        console.log(data[4]);
        $('#usuario').val(data[0]);
        $('#usuario_role option[value='+ data[4] +']').attr('selected', 'selected');
    });           
    
    
});
</script>
<?= $this->endSection() ?>