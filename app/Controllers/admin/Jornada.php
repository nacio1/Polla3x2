<?php namespace App\Controllers\admin;

use  App\Controllers\Basecontroller;

use App\Models\JornadaModel;
use App\Models\PremioModel;
use App\Models\RetiradosModel;

class Jornada extends BaseController
{
	public function index()
	{
		$data['title'] = 'Jornadas'; 
		$jornadaModel = new JornadaModel();
		$data['jornadas'] = $jornadaModel->getAll();
		
		return view('admin/jornadas', $data);
	}   
	
	public function crearJornada() {
		$jornadaModel = new JornadaModel();
		$data = $this->request->getPost();
		//Chequear que no haya otra jornada abierta
		if(!$jornadaModel->where('status', '1')->countAllResults()){ 			
			$jornadaModel->save($data);
			$db = \Config\Database::connect();
			$jornada_id = $db->insertID();//ID de la jornada creada                    
			$this->createPremio($jornada_id);//Crear premio con el id de la jornada
			$this->createRetirados($jornada_id);//Crear retirados con el id de la jornada

			$message = setSwaMessage('Jornada creada', 'Nueva jornada creada con éxito');
			return redirect()->to('jornadas')->with('message', $message);
		}else{
			return redirect()->to('jornadas')->with('message', "Swal.fire('Jornada NO creada','Ya hay una jornada abierta','error')");
		}
	}

	protected function createPremio($jornada_id) {
        $premioModel = new PremioModel();
        $data['jornada_id'] = $jornada_id;
        $premioModel->save($data);    
    }

	protected function createRetirados($jornada_id) {
        $retiradosModel = new RetiradosModel();
        $jornadaModel = new JornadaModel();        
        $jornada = $jornadaModel->where('jornada_id', $jornada_id)->first();        
        $data = [
            'jornada_id' => $jornada_id,
            'fecha_jornada' => $jornada['fecha_jornada']
        ];
        $retiradosModel->save($data);
	}	
	
    public function cerrarJornada($jornada_id) {
        $jornadaModel = new JornadaModel();
        $data['status'] = '0';
		$jornadaModel->update($jornada_id, $data);
		$message = setSwaMessage('Jornada cerrada', 'La jornada fue cerrada');
        return redirect()->back()->with('message', $message);
        //echo $jornada_id;
    } 


}