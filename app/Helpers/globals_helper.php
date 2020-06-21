<?php

use App\Models\JornadaModel;
use App\Models\RetiradosModel;

$jornadaModel = new JornadaModel();
$jornada = $jornadaModel->orderBy('status DESC, fecha_jornada DESC')->first();

$GLOBALS['status'] = $jornada['status'];
$GLOBALS['jornada_id'] = $jornada['jornada_id'];
$GLOBALS['fecha_jornada'] = $jornada['fecha_jornada'];
$GLOBALS['fecha_cierre'] = $jornada['fecha_cierre'];
$GLOBALS['coste_jugada'] = $jornada['coste_jugada'];
$GLOBALS['1er_lugar'] = $jornada['1er_lugar'];
$GLOBALS['2do_lugar'] = $jornada['2do_lugar'];
$GLOBALS['1va_ejemplares'] = $jornada['1va_ejemplares'];
$GLOBALS['2va_ejemplares'] = $jornada['2va_ejemplares'];
$GLOBALS['3va_ejemplares'] = $jornada['3va_ejemplares'];
$GLOBALS['4va_ejemplares'] = $jornada['4va_ejemplares'];
$GLOBALS['5va_ejemplares'] = $jornada['5va_ejemplares'];
$GLOBALS['6va_ejemplares'] = $jornada['6va_ejemplares'];

use CodeIgniter\I18n\Time;
$fecha_cierre = Time::parse($GLOBALS['fecha_cierre']);//Fecha cierre de la jornada
$today = new Time('now', 'America/Caracas', 'en_US');//Fecha de HOY
$stard = $today->toDateTimeString();     
$end = $fecha_cierre->toDateTimeString();
$GLOBALS['cierre'] = false;
if($stard > $end){//Si fecha de hoy mayor a la de cierre, cierre = true
    $GLOBALS['cierre'] = true;
}

