<?php namespace App\Controllers\jugador;

use  App\Controllers\Basecontroller;
use  App\Controllers\Usuario;

use App\Models\UsuarioModel;
use App\Models\CuentasBancariasModel;
use App\Models\RetiroModel;

use CodeIgniter\I18n\Time;

class Retirar extends BaseController
{
	public function index()	{	
		$usuarioModel = new UsuarioModel();		
		$cedula = $usuarioModel->where('usuario', session('usuario'))->findColumn('cedula');
		if(!$cedula[0]) {
			$message = setSwaMessage('Completa tu perfil', 'Debes completar tu perfil para retirar',4);
			return redirect()->to('perfil')->with('message', $message);
		}
		$cuentasBancarias = new CuentasBancariasModel();
		$cuentas = $cuentasBancarias->getCuentasByUser(session('usuario'));
		if(!$cuentas) {
			$message = setSwaMessage('No has registrado tu banco', 'Registra tu cuenta bancaria para poder retirar',4);
			return redirect()->to('mis-cuentas')->with('message', $message);
		}
		if(session('usuario_saldo') < $GLOBALS['coste_jugada']) {
			$message = setSwaMessage('Saldo insuficiente', 'El monto mínimo de retiro es Bs.'.$GLOBALS['coste_jugada'],4);
			return redirect()->to('jugar')->with('message', $message);
		}		
		$data['cuentas'] = $cuentas;
		$data['title'] = 'Retirar';
		return view('jugador/retirar', $data);
	}   
	
	public function crearRetiro() {
		$rules = [
			'banco' => 'required|is_not_unique[cuentasbancarias.cuenta_id]|checkNumCuentaOfUser[banco]',
            'monto' => 'required|is_natural|greater_than_equal_to['.$GLOBALS['coste_jugada'].']'
		];		
		if(! $this->validate($rules)) {
			$message = setSwaMessage('','', 2);
			$validation =  \Config\Services::validation();
			echo '<pre>';    
			var_dump($validation->listErrors());                             
			echo '</pre>';                                 
			//return redirect()->to('retirar')->with('message', $message); 
		}else{
			if(session('usuario_saldo') < $this->request->getVar('monto')) {//Chequear saldo								
				$message = setSwaMessage('','', 2);                                 
				return redirect()->to('retirar')->with('message', $message);
			}
			$this->actualizarSaldo($this->request->getVar('monto'));
			$usuarioController = new Usuario();
			$usuarioController->setUserSession(session('usuario'));		
			$retiroModel = new RetiroModel();
			$newData = [
                'usuario' => session('usuario'),
                'cuenta_id' => $this->request->getVar('banco'),
				'monto' => $this->request->getVar('monto'),
				'fecha_retiro' => new Time('now', 'America/Caracas', 'en_US')
			];
		
			$retiroModel->save($newData);
			$message = setSwaMessage('Retiro enviado', 'Una vez confirmado su pago será transferido');			
			return redirect()->to('jugar')->with('message', $message);
		}		
		
	}

	protected function actualizarSaldo($monto) {
		$data['usuario_saldo'] = session('usuario_saldo') - $monto;

        $usuarioModel = new UsuarioModel;
        $usuarioModel->update(session('usuario_id'), $data);
	}

	//--------------------------------------------------------------------

}