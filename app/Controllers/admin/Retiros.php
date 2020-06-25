<?php namespace App\Controllers\admin;

use  App\Controllers\Basecontroller;

use App\Models\RetiroModel;
use App\Models\UsuarioModel;

class Retiros extends BaseController
{
	public function index()
	{
		$retiroModel = new RetiroModel();
		$data['retiros'] = $retiroModel->getAll(); 
		$data['title'] = 'Retiros';
		return view('admin/retiros', $data);
	}   
	
	public function getRetiro(int $retiro_id) {
		$retiroModel = new RetiroModel();
		$retiro = $retiroModel->getRetiroById($retiro_id);
		echo json_encode($retiro);				
	}

	public function aprobarRetiro($retiro_id) {
		$retiroModel = new RetiroModel();
		$data['status'] = 'aprobado';
		
		$retiroModel->update($retiro_id, $data);
		
		$message = setSwaMessage('Listo', 'Retiro aprobado');
		return redirect()->back()->with('message', $message);
	}

	public function rechazarRetiro($usuario, $monto, $retiro_id) {
		$usuarioModel = new UsuarioModel();  		     
        $user = $usuarioModel->where('usuario', $usuario)->first();
        $data['usuario_saldo'] = $user['usuario_saldo'];//Saldo del usuario
        $data['usuario_saldo'] += $monto;//Devolver monto del retiro 
        $usuarioModel->update($user['usuario_id'], $data);//Actualizar base de datos       

		$retiroModel = new RetiroModel();
		$data['status'] = 'rechazado';
		$retiroModel->update($retiro_id, $data);		
		$message = setSwaMessage('Listo', 'Retiro rechazado');
        
        return redirect()->back()->with('message', $message);
	}
	//--------------------------------------------------------------------

}