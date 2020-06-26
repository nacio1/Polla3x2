<?php namespace App\Controllers\jugador;

use  App\Controllers\Basecontroller;

use App\Models\AbonoModel;
use App\Models\RetiroModel;

class Transacciones extends BaseController
{
    public function index() {
        $abonoModel = new AbonoModel();
        $retiroModel = new RetiroModel();
        $data['abonos'] = $abonoModel->getByUser(session('usuario'));
        $data['retiros'] = $retiroModel->getByUser(session('usuario'));
        $data['title'] = 'Transacciones';
        return view('jugador/mis-transacciones', $data);
    }
}    