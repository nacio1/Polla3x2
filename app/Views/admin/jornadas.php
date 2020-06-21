<?= $this->extend('templates/layout') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url('assets/datetimepicker/jquery.datetimepicker.min.css')?>">
<link rel="stylesheet" href="<?= base_url('assets/datatables/datatables.min.css')?>">  
<link rel="stylesheet" href="<?= base_url('assets/datatables/Datatables-1.10.21/css/datatables.bootstrap.min.css')?>">
<link rel="stylesheet" href="<?= base_url('assets/datatables/Responsive-2.2.5/css/responsive.bootstrap4.min.css')?>">

<?= $this->endSEction() ?>

<?= $this->section('content') ?>
<a href="<?= base_url('admin') ?>" style = "margin-top: -1rem; margin-left: -1rem" class="btn">
    <i class="fas fa-arrow-left"></i>
</a>
<button class="btn btn-danger mb-3" data-toggle="modal" data-target="#nuevaJornadaModal">Nueva Jornada</button>

<h2 class="text-center section-title mb-3">Jornadas</h2>
<!-- Jornadas Table -->
<div class="table-responsive">
    <table class="table datatables table-striped dt-responsive nowrap" cellspacing="0" style="width: 100%">
        <thead class="thead-dark">
            <tr>            
            <th scope="col">Fecha_jornada</th>
            <th scope="col">Hora_cierre</th>
            <th scope="col">1er_lugar</th>
            <th scope="col">2do_lugar</th>
            <th scope="col">Coste_jugada</th>                
            <th data-priority="1" scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>               
            <?php foreach ($jornadas as $jornada) { ?>  
                <tr>                  
                <td><?= $jornada['fecha_jornada'] ?></td>
                <td><?= $jornada['fecha_cierre'] ?></td>
                <td><?= $jornada['1er_lugar'] ?></td>
                <td><?= $jornada['2do_lugar'] ?></td>
                <td><?= $jornada['coste_jugada'] ?></td>                     
                <?php if($jornada['status']) { ?>
                    <td><a href="<?= base_url('admin/cerrar-jornada').'/'.$jornada['jornada_id'] ?>" class="btn btn-danger cerrarJornadaButton">Cerrar</a></td>
                <?php }else{ ?>
                    <td><a href="#" class="btn btn-success">Resultados</a></td>
                <?php } ?>
                </tr>            
            <?php } ?>              
        </tbody>
    </table>
</div>

<!-- Nueva jornada modal -->
<div class="modal fade" id="nuevaJornadaModal" tabindex="-1" role="dialog" aria-labelledby="nuevaJornadaModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nueva Jornada</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open('admin/crear-jornada', 'method="POST" class="nuevaJornadaForm" id="nuevaJornadaForm'); ?>
      <div class="modal-body">
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="fecha_jornada">Fecha de la jornada</label>
                <input type="text" class="form-control  datepicker" id="fecha_jornada" name="fecha_jornada">                
            </div>
            <div class="form-group col-sm-6 ">
                <label for="fecha_cierre">Cierre de la jornada</label>
                <input type="text" class="form-control datepickerTime" id="fecha_cierre" name="fecha_cierre">                
            </div>
            <div class="form-group col-6">
                <label for="fecha_jornada">1er Lugar %</label>
                <input type="text" class="form-control" value="<?=($jornadas) ? $jornadas[0]['1er_lugar'] : null;?>" id="1er_lugar" name="1er_lugar">                
            </div>
            <div class="form-group col-6">
                <label for="fecha_jornada">2do lugar %</label>
                <input type="text" class="form-control" value="<?=($jornadas) ? $jornadas[0]['2do_lugar'] : null?>" id="2do_lugar" name="2do_lugar">                
            </div>            
        </div>  
        <div class="form-group">
            <label for="coste_jugada">Coste de la jugada</label>        
            <input type="number" class="form-control" value="<?=($jornadas) ? $jornadas[0]['coste_jugada'] : null?>" id="coste_jugada" name="coste_jugada">        
        </div>    
        <div class="form-row">
            <div class="form-group col-sm-4 col-6">
                <label for="1va_ejemplares">1ra_válida</label>
                <input type="number" class="form-control" id="1va_ejemplares" name="1va_ejemplares">          
            </div>  
            <div class="form-group col-sm-4 col-6">
                <label for="1va_ejemplares">2da_válida</label>
                <input type="number" class="form-control" id="2va_ejemplares" name="2va_ejemplares">          
            </div>  
            <div class="form-group col-sm-4 col-6">
                <label for="1va_ejemplares">3ra_válida</label>
                <input type="number" class="form-control" id="3va_ejemplares" name="3va_ejemplares">          
            </div>   
            <div class="form-group col-sm-4 col-6">
                <label for="1va_ejemplares">4ta_válida</label>
                <input type="number" class="form-control" id="4va_ejemplares" name="4va_ejemplares">          
            </div>  
            <div class="form-group col-sm-4 col-6">
                <label for="1va_ejemplares">5ta_válida</label>
                <input type="number" class="form-control" id="5va_ejemplares" name="5va_ejemplares">          
            </div>  
            <div class="form-group col-sm-4 col-6">
                <label for="1va_ejemplares">6ta_válida</label>
                <input type="number" class="form-control" id="6va_ejemplares" name="6va_ejemplares">          
            </div>         
        </div>              
      </div>
      <div class="modal-footer">        
        <button type="submit" class="btn btn-primary mx-auto">Enviar</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="<?= base_url('assets/datetimepicker/jquery.datetimepicker.full.min.js') ?>"></script>
<script src="<?= base_url('assets/datatables/datatables.min.js') ?>"></script>
<script src="<?= base_url('assets/datatables/Responsive-2.2.5/js/responsive.bootstrap4.min.js') ?>"></script>
<script>
$(document).ready(function(){
    $('.datatables').DataTable({
        language: {
            url: "/assets/datatables/spanish.json",
        },
        responsive: true,
        ordering: false
    });  

    $('input').attr("required", true);
    $('.datepicker').datetimepicker({
        timepicker: false,
        format: 'Y-m-d',
        value:'Y-m-d'
    });
    $('.datepickerTime').datetimepicker({
        format: 'Y-m-d H:i',
        datepicker: true,
        value: 'Y-m-d H:m',
        allowTimes:[
            '15:10','15:15','15:20','15:25','15:30',
            '15:35','15:40','15:45','15:50','15:55','16:00'
        ]
    }); 

    $('.cerrarJornadaButton').click(function(e) {        
        e.preventDefault();
        var href =$(this).attr('href');
        
        Swal.fire({
            title: '¿Cerrar Jornada?',
            text: 'Usuarios no podrán registrar más jugadas',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirmar'
        }).then((result) => {
            if(result.value) {
                document.location.href = href;                
            }
        })
    });    
});    
</script>
<?= $this->endSection() ?>

