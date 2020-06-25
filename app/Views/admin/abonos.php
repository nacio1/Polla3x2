<?= $this->extend('templates/layout') ?>

<?= $this->section('css'); ?>
<link rel="stylesheet" href="<?= base_url('assets/datatables/datatables.min.css')?>">  
<link rel="stylesheet" href="<?= base_url('assets/datatables/Datatables-1.10.21/css/datatables.bootstrap.min.css')?>">  
<link rel="stylesheet" href="<?= base_url('assets/select2/select2.min.css')?>">    
<link rel="stylesheet" href="<?= base_url('assets/select2-bootstrap4-theme/select2-bootstrap.css')?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<a href="<?= base_url('admin') ?>" style = "margin-top: -1rem; margin-left: -1rem" class="btn">
    <i class="fas fa-arrow-left"></i>
</a>   
<div class="ml-1 error" id="messageBox"></div>
<form class="form-inline" id="abonar-form" style="flex-flow: inherit">
    <label class="sr-only my-1 mr-2" for="inlineFormCustomSelectPref">Preference</label>
    <div class="form-group mb-2 ml-1 mr-1">  
        <select class="form-control custom-select select2 mr-2" id="select_user" name="select_user">
            <option value="" disabled selected>Usuario...</option>                
            <?php foreach ($usuarios as $usuario) { ?>
                <option value="<?= $usuario['usuario']; ?>">
                    <?= $usuario['usuario'];?> <?=$usuario['usuario_saldo'];?>
                </option>
            <?php } ?>
        </select>
    </div>

    <label class="sr-only" id="label-monto" for="monto">Username</label>
    <div class="form-group mb-2 mr-1">            
        <input type="text" class="form-control" name="monto" id="monto" placeholder="Monto">
    </div>      
    <div class="form-group btn-wrapper">
        <button type="submit" class="btn btn-danger mx-1 mb-2">Abonar</button>
    </div>
</form>
<h2 class="section-title text-center">Abonos</h2>
<!--Abonos table -->  
<div class="table-responsive mt-3">
    <table class="table datatables table-striped table-abonos">
        <thead class="thead-dark">
            <tr>
            <th  scope="col">Usuario</th>
            <th scope="col">Monto</th>
            <th data-priority = "2" scope="col">Fecha</th>
            <th scope="col">Detalles</th>
            <th data-priority = "1" scope="col">Status</th>
            <th scope="col">Acción</th>            
            </tr>
        </thead>
        <tbody>            
            <?php foreach ($abonos as $abono) : ?>   
                <tr>                   
                    <td><?= $abono['usuario']; ?></td>
                    <td><?= $abono['monto']; ?></td>
                    <td><?= $abono['fecha_abono']; ?></td>
                    <td><button id="<?= $abono['abono_id']; ?>" class="btn btn-primary modal-button" data-toggle="modal" data-target="#abonoModal">Ver</button></td>
                    
                    <?php if ($abono['status'] == 'aprobado') {
                        $icon = 'fas fa-check-square';                            
                    }elseif ($abono['status'] == 'rechazado') {
                        $icon = 'fas fa-window-close';                            
                    }else{ $icon = 'fas fa-minus'; }
                    ?>

                    <td class="<?= $abono['status'];?>"><i class="<?= $icon ?>"></i></td>
                    <?php 
                    if($abono['status']=='pendiente'){ 
                    ?>
                        <td>
                            <div class="d-flex justify-content-around">
                                <a href="<?= base_url('admin/abonos/abonar/'.$abono['usuario'].'/'.$abono['monto'].'/'.$abono['abono_id']);?>" class="btn btn-success aprobar-button text-white">
                                    <i class="fas fa-check-square"></i> 
                                </a>
                                <a href="<?= base_url( 'admin/abonos/rechazarAbono/'.$abono['abono_id']);?>" class="btn btn-danger rechazar-button text-white">
                                    <i class="fas fa-window-close"></i>
                                </a>
                            </div> 
                        </td>                         
                    <?php
                    }else{ 
                        ?>
                    <td><?= $abono['status'];?></td>
                    <?php
                    } 
                    ?>
                </tr>
            <?php endforeach; ?> 
        </tbody>
    </table>
</div>
<!-- Modal -->
<div class="modal fade " id="abonoModal" tabindex="-1" role="dialog" aria-labelledby="abonoModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="abonoModalLabel">Abono Detalles</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
      
        <div class="modal-body">  

            <div class="form-group">
                <label for="bancor_receptor">Banco receptor</label>
                <input type="text" readonly class="form-control" id="banco_receptor" name="banco_receptor">
            </div>

            <div class="form-row">                
                <div class="form-group col-sm-6">
                    <label for="bancor_emisor">Banco emisor</label>
                    <input type="text" readonly class="form-control" id="banco_emisor" name="banco_emisor">
                </div>     
                <div class="form-group col-sm-6">
                    <label for="num_ref">Número de referencia</label>
                    <input type="text" readonly class="form-control" id="num_ref" name="num_ref">                         
                </div>                      
            </div>
            
            <div class="form-group">
                <label for="num_cuenta">Número de cuenta</label> 
                <input type="text" readonly class="form-control" id="num_cuenta" name="num_cuenta">                       
            </div>                       

            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="monto">Monto transferido</label>
                    <input type="text" readonly class="form-control" id="monto_abono" name="monto">                         
                </div> 
                <div class="form-group col-sm-6">
                    <label for="fecha">Fecha de la transferencia</label> 
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
<script src="<?= base_url('assets/select2/select2.full.min.js') ?>"></script>
<script>    
$(document).ready(function(){
    $('.select2').select2({
        theme: "bootstrap"
    }); 
    $('.select2-container--bootstrap').css('width', 'auto');

    $('.datatables').DataTable({
        language: {
            url: "/assets/datatables/spanish.json",
        },
        ordering: false
    });  
    
    //Confirmar aprobar button
    $(document).on("click", '.aprobar-button', function(e) {             
        e.preventDefault();             
        var href = $(this).attr('href');
        Swal.fire({
            title: '¿Aprobar abono?',
            text: "El saldo del usuario será actualizado",
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
            title: '¿Rechazar abono?',
            text: "El abono será rechazado",
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
        var abono_id = $(this).attr('id');  
        $('.modal-footer').empty();          
        $.ajax ({
            url: '<?= base_url('admin/abonos/getAbono');?>'+ '/' + abono_id,
            type: 'post',
            dataType: 'json',
            success:function(response){                                        
                $('#banco_receptor').val(response.banco_receptor);
                $('#banco_emisor').val(response.banco_emisor);
                $('#num_ref').val(response.num_ref);
                $('#num_cuenta').val(response.num_cuenta);
                $('#fecha').val(response.fecha_abono);                             
                $('#monto_abono').val(response.monto);                            
                if(response.status == 'pendiente') {
                    var html = "<a href='#' id='aprobar-button' class='btn btn-success aprobar-button text-white'>\
                                    Abonar\
                                </a> \
                                <a href='#' id='rechazar-button' class='btn btn-danger rechazar-button text-white'>\
                                    Rechazar\
                                </a>";
                    $('.modal-footer').html(html);  
                    $('#aprobar-button').attr("href", 
                    "<?= base_url() ?>"+"/admin/abonos/abonar/"+response.usuario+"/"+response.monto+"/"+response.abono_id);
                    $('#rechazar-button').attr("href", 
                    "<?= base_url() ?>"+"/admin/abonos/rechazarAbono/"+response.abono_id);                     
                }
            }
        });
    }); 
    //Abonar-form validation y envio
    $('#abonar-form').validate({
        submitHandler: function() {
            var username = $('#select_user').val();
            var monto = $('#monto').val();
            var url = '<?= base_url('admin/abonos/abonar');?>'+ '/' + username + '/' + monto;                
            Swal.fire({
                title: '¿Abonar usuario?',
                html: '<b>Usuario: ' + username + '<br>' + 'Monto: ' + monto + '</b>',
                icon: 'question',
                showCancelButton: true,
                showCloseButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirmar'
            }).then((result) => {
                if(result.value) {
                    document.location.href = url;                        
                }
            })
        },
        errorLabelContainer: "#messageBox",            
        rules: {
            select_user: {
                required: true
            },                
            monto: {
                required: true,
                number: true
            }                
        },
        invalidHandler: function(event, validator) {
            $('#messageBox').html('Datos inválidos');
        },
        messages: {
            select_user: "",
            monto: ""
        }            
    });
});
</script>
<?= $this->endSection() ?>