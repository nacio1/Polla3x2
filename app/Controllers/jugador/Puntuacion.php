<?php namespace App\Controllers\jugador;

use  App\Controllers\Basecontroller;

use App\Models\JugadaModel;
use App\Models\JornadaModel;
use App\Models\PremioModel;

class Puntuacion extends BaseController
{
	public function index($fecha_jornada = null)
	{
		helper('funciones');
		$fecha_jornada = ($fecha_jornada) ? $fecha_jornada : $GLOBALS['fecha_jornada'];
        $jugadaModel = new JugadaModel();
		$jornadaModel = new JornadaModel();  
		$premioModel = new PremioModel();

		$data['title'] = 'Puntuación';
        $jornada = $jornadaModel->where('fecha_jornada', $fecha_jornada)->orderBy("status DESC, fecha_jornada DESC")->first();  
		$data['jornadas'] = $jornadaModel->orderBy("status DESC, fecha_jornada DESC")->findAll(10);
		
        $data['jugadas'] = $jugadaModel->getAllByJornadaId($jornada['jornada_id']);                                         
		$data['jugadas'] = chequearRetirosJugadas($data['jugadas']);          
		                               
        $data['premio'] = $premioModel->getPremioByJornadaId($jornada['jornada_id']); 
		$data['fecha_jornada'] = $jornada['fecha_jornada'];  
		$data['gratis'] = $jugadaModel->contarGratis($jornada['jornada_id']);
		$data['status'] = $jornada['status'];
		return view('jugador/puntuacion', $data);
    }   

	//--------------------------------------------------------------------

}