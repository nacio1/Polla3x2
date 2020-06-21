<div class="card premio" >
    <div class="card-header">
        Premio: Bs.<?= $premio['total_premio'] ?> <span class="toggle-button-premio d-md-none" style="float: right;"><i class="fas fa-plus"></i></span>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">1er lugar: Bs.<?= $premio['1er_lugar_premio'] ?></li>
        <li class="list-group-item">2do lugar: Bs.<?= $premio['2do_lugar_premio'] ?></li>
        <li class="list-group-item d-flex justify-content-between" style="font-size: 14px">
            <span>Jugadas: <br> <?= $premio['total_jugadas'] ?></span> <span>Coste Bs: <br> <?= $GLOBALS['coste_jugada'] ?></span>
        </li>
    </ul>
    <div class="card-footer text-center">
    <?php if($GLOBALS['status'] && !$GLOBALS['cierre']) { ?>
        <span>Cierre: </span><span id="cierre"></span>
    <?php }else{ ?>
        Cerrado
    <?php } ?>
        
    </div>
</div>