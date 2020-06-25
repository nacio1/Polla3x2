<?= $this->extend('templates/layout') ?>

<?= $this->section('content') ?>
<div class="dashboard">
    <h2 class="text-center mb-2">Admin</h2>
    <nav class="nav nav-pills flex-column flex-sm-row">
        <a class="flex-sm-fill text-center nav-link" href="#">Usuarios</a>
        <a class="flex-sm-fill text-center nav-link" href="<?= base_url('admin/jornadas') ?>">Jornadas</a>
        <a class="flex-sm-fill text-center nav-link" href="<?= base_url('admin/abonos') ?>">Abonos</a>
        <a class="flex-sm-fill text-center nav-link" href="<?= base_url('admin/retiros') ?>">Retiros</a>    
        <a class="flex-sm-fill text-center nav-link" href="<?= base_url('admin/resultados') ?>">Resultados</a>    
        <a class="flex-sm-fill text-center nav-link" href="<?= base_url('admin/retirados') ?>">Retirados</a>    
    </nav>
</div>
<?= $this->endSection() ?>