<?php namespace App\Controllers\admin;

use  App\Controllers\Basecontroller;

use App\Models\RetiradosModel;

class Retirados extends BaseController
{
	public function index()	{
		$data['title'] = 'Retirados'; 
		$retiradosModel = new RetiradosModel();
		$data['retirados'] = $retiradosModel->getAll();
		return view('admin/retirados', $data);
	}   
	
	public function retirarEjemplar() {
		$valida_retirados = $this->request->getVar('valida_retirados');
		$numero = $this->request->getVar('numero');		

		$retiradosModel = new RetiradosModel();
		$retirados = $retiradosModel->where('jornada_id', $GLOBALS['jornada_id'])->first();

		$data[$valida_retirados] = $this->ordernarRetirados($numero, $retirados, $valida_retirados);
		
		$retiradosModel->update($retirados['retirados_id'], $data);
		$message = setSwaMessage('Listo','Ejemplar retirado');
		return redirect()->to('retirados')->with('message', $message);
	}

	public function actualizarRetirados() {
		$retiradosModel = new RetiradosModel();
		$data = $this->request->getPost();
		$retiradosModel->save($data);
		$message = setSwaMessage('Listo','Retirados actualizado');
		return redirect()->to('retirados')->with('message', $message); 
	}

	protected function ordernarRetirados(int $nuevoRetirado, array $retirados, string $valida_retirados) {	
		if(!$retirados[$valida_retirados]) {//Chequear si ya hay retirados en esa valida
			$retirados[$valida_retirados] = $nuevoRetirado;//Si no, el campo sera igual al numero
		}else{
			$retirados[$valida_retirados] .= ','.$nuevoRetirado;//entonces agrega el numero al campo separado por coma
			$retirados[$valida_retirados] = explode(",", $retirados[$valida_retirados]);
			sort($retirados[$valida_retirados]);

			$retirados[$valida_retirados] = implode(",", $retirados[$valida_retirados]);
		}			
		return $retirados[$valida_retirados];
	}

	//--------------------------------------------------------------------
}