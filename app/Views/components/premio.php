<div class="card premio" >
    <div class="card-header">
        Premio: Bs.<?= number_format($premio['total_premio'],'2',',','.') ?> <span class="toggle-button-premio d-md-none" style="float: right;"><i class="fas fa-plus"></i></span>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">1er lugar: Bs.<?= number_format($premio['1er_lugar_premio'],'2',',','.') ?></li>
        <li class="list-group-item">2do lugar: Bs.<?= number_format($premio['2do_lugar_premio'],'2',',','.') ?></li>
        <li class="list-group-item d-flex justify-content-between" style="font-size: 14px">
            <span>Jugadas: <br> <?= $premio['total_jugadas'] ?></span> <span>Coste Bs: <br> <?= number_format($GLOBALS['coste_jugada'],'2',',','.') ?></span>
        </li>
        <?php if(session('usuario_role') == 'admin') { ?>
        <li style="font-size: 14px" class="list-group-item">Gratis: <br> <?= $gratis ?></li>
        <?php } ?>
    </ul>
    <div class="card-footer text-center">
    <?php if(isset($status) && $status == 0) { ?>
        Cerrado
    <?php }elseif($GLOBALS['status'] && !$GLOBALS['cierre']) { ?>    
        <span>Cierre: </span><span id="cierre"></span>
    <?php }else{ ?>
        Cerrado
    <?php } ?>        
    </div>
</div>