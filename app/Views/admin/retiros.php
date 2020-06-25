<?= $this->extend('templates/layout') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url('assets/datatables/datatables.min.css')?>">  
<link rel="stylesheet" href="<?= base_url('assets/datatables/Datatables-1.10.21/css/datatables.bootstrap.min.css')?>">
<link rel="stylesheet" href="<?= base_url('assets/datatables/Responsive-2.2.5/css/responsive.bootstrap4.min.css')?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<a href="<?= base_url('admin') ?>" style = "margin-top: -1rem; margin-left: -1rem" class="btn">
    <i class="fas fa-arrow-left"></i>
</a> 
<h2 class="section-title text-center">Retiros</h2>
<div class="row" style="overflow-x: auto">
    <div class="col-12">
        <table class="table datatables table-striped table-retiros dt-responsive nowrap" width="100%"> 
            <thead class="thead-dark">
                <tr>                
                <th scope="col">Usuario</th>                     
                <th scope="col">Fecha</th>                                     
                <th scope="col">Monto</th>                     
                <th data-priority="-1" scope="col">Detalles</th>                     
                <th data-priority="-1" scope="col">status</th>                     
                <th data-priority="-1" scope="col">Acción</th>                     
                </tr>
            </thead>
            <tbody>    
            <?php foreach ($retiros as $retiro) { ?>  
                <tr>
                    <td><?= $retiro['usuario'] ?></td>
                    <td><?= $retiro['fecha_retiro'] ?></td>                    
                    <td><?= $retiro['monto'] ?></td>
                    <td><button id="<?= $retiro['retiro_id']; ?>" class="btn btn-primary modal-button" data-toggle="modal" data-target="#retiroModal">Ver</button></td>
                    <!--Check status para el icono -->
                    <?php if ($retiro['status'] == 'aprobado') {
                        $icon = 'fas fa-check-square';                            
                    }elseif ($retiro['status'] == 'rechazado') {
                        $icon = 'fas fa-window-close';                            
                    }else{ $icon = 'fas fa-minus'; }
                    ?>

                    <td class="<?= $retiro['status'];?>"><i class="<?= $icon ?>"></i></td>
                    <?php 
                    //Si status pendiente agregar botones
                    if($retiro['status']=='pendiente'){ 
                    ?>
                        <td>
                            <div class="d-flex justify-content-around">
                                <a href="<?= base_url('admin/retiros/aprobarRetiro/'.$retiro['retiro_id']);?>" class="btn btn-success aprobar-button text-white">
                                    <i class="fas fa-check-square"></i> 
                                </a>
                                <a href="<?= base_url( 'admin/retiros/rechazarRetiro/'.$retiro['usuario'].'/'.$retiro['monto'].'/'.$retiro['retiro_id'])?>" class="btn btn-danger rechazar-button text-white">
                                    <i class="fas fa-window-close"></i>
                                </a>
                            </div> 
                        </td>                         
                    <?php
                    }else{ 
                        ?>
                    <td><?= $retiro['status'];?></td>
                    <?php
                    } 
                    ?>
                </tr>       
            <?php } ?>         
            </tbody>                
        </table>    
    </div>
</div>    
<!-- Modal -->
<div class="modal fade " id="retiroModal" tabindex="-1" role="dialog" aria-labelledby="retiroModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="abonoModalLabel">Retiro Detalles</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
      
        <div class="modal-body">  

            <div class="form-row">  
                <div class="form-group col-sm-6">
                    <label for="bancor">Banco</label>
                    <input type="text" readonly class="form-control" id="banco" name="banco">
                </div>
                <div class="form-group col-sm-6">
                    <label for="usuario">Usuario</label>
                    <input type="text" readonly class="form-control" id="usuario" name="usuario">                         
                </div> 
            </div>  
            <div class="form-row">  
                <div class="form-group col-sm-6">
                    <label for="beneficiario">Beneficiario</label>
                    <input type="text" readonly class="form-control" id="beneficiario" name="beneficiario">
                </div>
                <div class="form-group col-sm-6">
                    <label for="cedula">Cédula</label>
                    <input type="text" readonly class="form-control" id="cedula" name="cedula">                         
                </div> 
            </div> 
            
            <div class="form-group">
                <label for="num_cuenta">Número de cuenta</label> 
                <input type="text" readonly class="form-control" id="num_cuenta" name="num_cuenta">                       
            </div>                       

            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="monto">Monto de retiro</label>
                    <input type="text" readonly class="form-control" id="monto_abono" name="monto">                         
                </div> 
                <div class="form-group col-sm-6">
                    <label for="fecha">Fecha del retiro</label> 
                    <input type="text" readonly class="form-control datepicker" id="fecha" name="fecha">                       
                </div>                       
            </div>
            
        </div>
        <div class="modal-footer justify-content-end">                              
        </div>            
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
        responsive: true,
        ordering: false,
        ordering: false,        
        /*"columnDefs": [
            { "searchable": false, "targets": [0,2,3,4,5,6,7,8,9,10,11,12,13,14] }
        ]*/       
    }); 

    //Confirmar aprobar button
    $(document).on("click", '.aprobar-button', function(e) {             
        e.preventDefault();             
        var href = $(this).attr('href');
        Swal.fire({
            title: '¿Aprobar retiro?',
            text: "¿El retiro fue comprobado?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirmar'
            }).then((result) => {
                if (result.value) {
                    document.location.href = href;
                }
            })
        }); 
    //rechazar button
    $(document).on("click", '.rechazar-button', function(e) {  
        e.preventDefault();
        var href = $(this).attr('href');
        Swal.fire({
            title: '¿Rechazar retiro?',
            text: "El retiro será rechazado",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirmar'
            }).then((result) => {
                if (result.value) {
                    document.location.href = href;
                }
            })
    }); 

    //cargar datos de la modal   
    $('.modal-button').click(function(){
        var retiro_id = $(this).attr('id');  
        $('.modal-footer').empty();          
        $.ajax ({
            url: '<?= base_url('admin/retiros/getRetiro');?>'+ '/' + retiro_id,
            type: 'post',
            dataType: 'json',
            success:function(response){                                        
                $('#banco').val(response.banco_nombre);
                $('#usuario').val(response.usuario);                
                $('#beneficiario').val(response.beneficiario);                
                $('#cedula').val(response.cedula);                
                $('#num_cuenta').val(response.numero_cuenta);
                $('#fecha').val(response.fecha_retiro);                             
                $('#monto_abono').val(response.monto);                            
                if(response.status == 'pendiente') {
                    var html = "<a href='#' id='aprobar-button' class='btn btn-success aprobar-button text-white'>\
                                    Aprobar\
                                </a> \
                                <a href='#' id='rechazar-button' class='btn btn-danger rechazar-button text-white'>\
                                    Rechazar\
                                </a>";
                    $('.modal-footer').html(html);  
                    $('#aprobar-button').attr("href", 
                    "<?= base_url() ?>"+"/admin/retiros/aprobarRetiro/" + response.retiro_id);
                    $('#rechazar-button').attr("href", 
                    "<?= base_url() ?>"+"/admin/retiros/rechazarRetiro/" + response.usuario + "/" + response.monto + "/" + response.retiro_id);                     
                }
            }
        });
    });    
})

</script>
<?= $this->endSection() ?>