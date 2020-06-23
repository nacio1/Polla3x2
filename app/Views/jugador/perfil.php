<?= $this->extend('templates/layout') ?>

<?= $this->section('css') ?>
<style>
form {
    max-width: 500px;
}
</style>
<?= $this->endSection() ?> 

<?= $this->section('content') ?>
<form id="perfil-form" method="POST" action="perfil">
    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="email" value="<?= $usuario['usuario_email'] ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="Password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="password" name="password" placeholder="Cambia tu contraseña si lo deseas">
        </div>
    </div>    
    <div class="form-group row">
        <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?= $usuario['nombre'] ?>">
        </div>    
    </div>
    <div class="form-group row">
        <label for="apellido" class="col-sm-2 col-form-label">Apellido</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="<?= $usuario['apellido'] ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="cedula" class="col-sm-2 col-form-label">Cédula</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Ingresa tu cédula" value="<?= $usuario['cedula'] ?>">
        </div>
    </div>
    <?php if(!$usuario['cedula']) { ?>
    <div class="form-check text-muted" style="font-size: 14px">
        <input type="checkbox" class="form-check-input" id="checkbox" name="checkbox">
        <label class="form-check-label" for="exampleCheck1">Me comprometo a asegurar que los datos ingresados son correctos</label>
    </div>
    <?php } ?>
    <div class="text-center mt-3">
        <button type="submit" class="btn btn-primary  ">Guardar</button>
    </div>    
</form>
<?= $this->endSection() ?> 

<?= $this->section('js') ?>
<?php if(isset($usuario['cedula'])) { ?>
<script>
$(document).ready(function(){
    $('input[type=text]').removeClass('form-control');
    $('input[type=text]').addClass('form-control-plaintext');
});
</script>
    
<script src="<?= base_url('js/perfil.js') ?>"></script>
<?php } ?>

<?= $this->endSection() ?> 