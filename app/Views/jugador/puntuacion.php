<?= $this->extend('templates/layout') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url('assets/datatables/datatables.min.css')?>">  
<link rel="stylesheet" href="<?= base_url('assets/datatables/Datatables-1.10.21/css/datatables.bootstrap.min.css')?>">
<link rel="stylesheet" href="<?= base_url('assets/datatables/Responsive-2.2.5/css/responsive.bootstrap4.min.css')?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="puntuacion-premio-container">
    <?= view_cell('\App\Libraries\Component::premio', ['premio' => $premio, 'status' => $status, 'gratis' => $gratis]) ?>
</div>
<div class="mt-2 mb-1" style="max-width: 130px">        
    <select class="form-control" id="select-jornada"> 
        <?php $fecha_jornada = date("d-m-Y", strtotime($fecha_jornada)); ?>
        <option selected><?= $fecha_jornada ?></option>
        <?php 
        //contador para no incluir el primer valor
        $i = 1;
        foreach ($jornadas as $jornada) { 
            $fecha = date("d-m-Y", strtotime($jornada['fecha_jornada'])); 
            ?>
                <option value="<?= $jornada['fecha_jornada'] ?>"><?= $fecha ?></option>
        <?php } ?>
    </select>
</div>   
<h1 class="text-center" style="font-weight: 400">Puntuación</h1>
<div class="row" style="overflow-x: auto">
    <div class="col-12">
        <table class="table datatables table-striped table-puntuacion dt-responsive nowrap" width="100%"> 
            <thead class="">
                <tr>                
                <th class="light-cell" scope="col">Pos</th>
                <th data-priority="1" scope="col">Usuario</th>
                <th scope="col">Hora</th>                  
                <th data-priority="2" scope="col">1va</th>
                <th class="light-cell" scope="col">Pts</th>
                <th data-priority="2" scope="col">2va</th>
                <th class="light-cell" scope="col">Pts</th>  
                <th data-priority="2" scope="col">3va</th>
                <th class="light-cell" scope="col">Pts</th>
                <th data-priority="2" scope="col">4va</th>
                <th class="light-cell" scope="col">Pts</th>
                <th data-priority="2" scope="col">5va</th>
                <th class="light-cell" scope="col">Pts</th>   
                <th data-priority="2" scope="col">6va</th>
                <th class="light-cell" scope="col">Pts</th>       
                <th class="dark-cell"  data-priority="-1" scope="col">Total</th>       
                </tr>
            </thead>
            <tbody> 
            <?php                       
            foreach ($jugadas as $jugada) { ?>              
                <tr>
                <td class="light-cell"><?= $i ?></td>   
                <td><?= $jugada['usuario'] ?></td>   
                <td><?= $jugada['fecha_jugada'] ?></td>   
                <td><?= $jugada['1va_ejemplar'] ?></td>   
                <td class="light-cell"><?= $jugada['1va_pts'] ?></td>  
                <td><?= $jugada['2va_ejemplar'] ?></td>   
                <td class="light-cell"><?= $jugada['2va_pts'] ?></td>
                <td><?= $jugada['3va_ejemplar'] ?></td>   
                <td class="light-cell"><?= $jugada['3va_pts'] ?></td>
                <td><?= $jugada['4va_ejemplar'] ?></td>   
                <td class="light-cell"><?= $jugada['4va_pts'] ?></td>
                <td><?= $jugada['5va_ejemplar'] ?></td>   
                <td class="light-cell"><?= $jugada['5va_pts'] ?></td>
                <td><?= $jugada['6va_ejemplar'] ?></td>   
                <td  class="light-cell"><?= $jugada['6va_pts'] ?></td> 
                <td class="dark-cell"><?= $jugada['total_pts'] ?></td> 
                </tr>    
            <?php $i++; }//endforeach ?>     
            </tbody>                
        </table>    
    </div>
</div>    
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="<?= base_url('assets/datatables/datatables.min.js') ?>"></script>
<script src="<?= base_url('assets/datatables/JSZip-2.5.0/jszip.min.js') ?>"></script>
<script src="<?= base_url('assets/datatables/pdfmake-0.1.36/pdfmake.min.js') ?>"></script>
<script src="<?= base_url('assets/datatables/pdfmake-0.1.36/vfs_fonts.js') ?>"></script>
<script src="<?= base_url('assets/datatables/Buttons-1.6.2/js/buttons.html5.min.js') ?>"></script>
<script>
window.fecha_cierre = '<?= $GLOBALS['fecha_cierre'] ?>';
window.cierre = '<?= $GLOBALS['cierre'] ?>';
window.status = '<?= $status ?>';
</script>
<script src="<?= base_url('js/puntuacion.js') ?>"></script>
<script src="<?= base_url('js/premio.js') ?>"></script>

<?= $this->endSection() ?>
