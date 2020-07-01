<?= $this->extend('templates/layout') ?>

<?= $this->section('css') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<p>Obtén el 50% de la ganancia de las jugadas de tus referidos</p>
<p>Tus links de referido: <br><b><?= base_url('').'/?r='. session('usuario')  ?></b>  <br><b><?= base_url('registro').'/?r='. session('usuario') ?></b></p>
<hr>
<h1 style="font-weight: 400" class="mb-2">Mis referidos</h1>
<table style="max-width: 300px" class="table  table-striped"> 
    <thead>
        <tr>                                      
        <th scope="col">Usuario</th>                                     
        <th scope="col">Jugadas</th>                                                            
        </tr>
    </thead>
    <tbody>    
    <?php if($usuarios) { 
        foreach($usuarios as $usuario) {
    ?> 
    <tr>
    <td><?= $usuario['usuario'] ?></td>
    <td><a href="<?= base_url('jugador/referidos').'/'.$usuario['usuario']?>" class="btn btn-primary">Ver</a></td>
    </tr>         
    <?php } ?>
    <?php }else{ ?>   
        <tr><td colspan="2">
        <h4 style="font-weight: 400" class="text-muted text-center mt-4 mb-5">Aún no tienes referidos</h3></td></tr>       
    <?php } ?>                   
    </tbody>                
</table>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<?= $this->endSection() ?>