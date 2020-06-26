<?php namespace App\Controllers\admin;

use  App\Controllers\Basecontroller;

use App\Models\AbonoModel;
use App\Models\UsuarioModel;

class Abonos extends BaseController
{
	public function index()
	{
		$data['title'] = 'Abonos'; 
		$abonoModel = new AbonoModel();		
		$usuarioModel = new UsuarioModel();
		$data['abonos'] = $abonoModel->getAll();
		$data['usuarios'] = $usuarioModel->findAll();		
		 
		return	view('admin/abonos', $data);			
	}   

	public function getAbono(int $abono_id) {
		$abonoModel = new AbonoModel();	
		$abono = $abonoModel->getAbonoById($abono_id);
		echo json_encode($abono);				
	}

	public function abonar($usuario, $monto, $abono_id = NULL) {

		$usuarioModel = new UsuarioModel();  		     
        $user = $usuarioModel->where('usuario', $usuario)->first();//Usuario a abonar
        $data['usuario_saldo'] = $user['usuario_saldo'];//Saldo del usuario
        $data['usuario_saldo'] += $monto;//Nuevo saldo  
        $usuarioModel->update($user['usuario_id'], $data);//Actualizar base de datos       

        if($abono_id) {//Cambiar status del abono a aprobado
            $abonoModel = new AbonoModel();
            $data['status'] = 'aprobado';
            $abonoModel->update($abono_id, $data);
		}
		
		$message = setSwaMessage('Listo', 'Saldo actualizado');
        
        return redirect()->back()->with('message', $message);

    }

	//Rechazar Abono********************************************************
    public function rechazarAbono($abono_id) {
        $abonoModel = new AbonoModel();
		$data['status'] = 'rechazado';
		
		$abonoModel->update($abono_id, $data);
		
		$message = setSwaMessage('Listo', 'Abono rechazado');
		return redirect()->back()->with('message', $message);
          
    }

	//--------------------------------------------------------------------

}