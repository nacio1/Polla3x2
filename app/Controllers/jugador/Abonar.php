<?php namespace App\Controllers\jugador;

use  App\Controllers\Basecontroller;

use App\Models\AbonoModel;
use App\Models\BancosModel;
use App\Models\MisBancosModel;

class Abonar extends BaseController
{
	public function index()
	{
		$bancosModel = new BancosModel();
		$misBancosModel = new MisBancosModel();
		$data['bancos'] = $bancosModel->findAll();
		$data['mis_bancos'] = $misBancosModel->findAll();
		$data['title'] = 'Abonar';
		return view('jugador/abonar' , $data);
	}   
	
	public function insertarAbono() {
		if($data = $this->request->getPost()) {
			$rules = [
				'banco_receptor' => 'required|alpha',
                'banco_emisor' => 'required|is_not_unique[bancos.banco_id]',
                'num_ref' => 'required|numeric|max_length[20]',
                'num_cuenta' => 'required|numeric|exact_length[20]',
                'monto' => 'required|numeric',
                'fecha' => 'required|valid_date'
			];
			if(! $this->validate($rules)) { 
				$message = setSwaMessage('','',2);
				return redirect()->to('abonar')->with('message', "$message");
			}else{				
				$abonoModel = new AbonoModel();
                        
				$data['usuario'] = session()->usuario;
				$data['fecha_abono'] = date("Y-m-d", strtotime($data['fecha'])); 
				$abonoModel->save($data);
				$message = setSwaMessage('Transferencia enviada', 'Una vez confirmado los datos tu saldo será actualizado');           
				return redirect()->to('abonar')->with('message', $message);				
			}                      
        }/*else{
            return redirect()->back();
        }*/  
	}

	//--------------------------------------------------------------------

}