<?= $this->extend('templates/layout') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url('assets/datatables/datatables.min.css')?>">  
<link rel="stylesheet" href="<?= base_url('assets/datatables/Datatables-1.10.21/css/datatables.bootstrap.min.css')?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<a href="<?= base_url('jugador/referidos') ?>" style = "margin-top: -1rem; margin-left: -1rem" class="btn">
    <i class="fas fa-arrow-left"></i>
</a> 
<h1 style="font-weight: 400" class="mb-4"><?= $title ?></h1>
<div class="row" style="overflow-x: auto">
        <div class="col-12">
            <table class="table datatables table-striped dt-responsive nowrap" width="100%"> 
                <thead>
                    <tr>                                      
                    <th scope="col">Fecha</th>                                                        
                    <th scope="col">Jornada</th>                                                        
                    <th scope="col">Costo</th>                                                        
                    <th scope="col">Mis ganancias</th>                                                        
                    <th scope="col">Pts</th>                                  
                    </tr>
                </thead>
                <tbody>      
                <?php foreach($jugadas as $jugada) { ?>  
                    <tr>
                        <td><?= $jugada['fecha_jugada'] ?></td>
                        <td><?= $jugada['fecha_jornada'] ?></td>
                        <td><?= (is_numeric($jugada['coste_jugada']))
                         ?'Bs.'. number_format($jugada['coste_jugada'], 2, ',', '.') : $jugada['coste_jugada']?></td>
                        <td>Bs.<?= number_format($jugada['ganancia'], 2, ',', '.')  ?></td>
                        <td><?= $jugada['total_pts'] ?></td>                        
                    </tr>                
                <?php } ?>                  
                </tbody>                
            </table>    
        </div><!-- cierre col --> 
    </div><!-- cierre row -->
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
        searching: false,
        lengthChange: false
    });
})
</script>
<?= $this->endSection() ?>