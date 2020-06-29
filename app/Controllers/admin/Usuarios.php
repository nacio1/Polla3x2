<?php namespace App\Controllers\admin;

use  App\Controllers\Basecontroller;

use App\Models\UsuarioModel;
use App\Models\AbonoModel;
use App\Models\RetiroModel;
use App\Models\JugadaModel;

class Usuarios extends BaseController
{
	public function index()
	{
		$usuarioModel = new UsuarioModel();
		$data['usuarios'] = $usuarioModel->getAll();		
		$data['title'] = 'Usuarios';
		return view('admin/usuarios', $data);
	}   
	
	public function Detalles(string $usuario) {
		$data['title'] = $usuario;		
		$abonoModel = new AbonoModel();
        $retiroModel = new RetiroModel();
		$jugadaModel = new JugadaModel();
		$usuarioModel = new UsuarioModel();
        $data['abonos'] = $abonoModel->getByUser($usuario);
		$data['retiros'] = $retiroModel->getByUser($usuario);
		$data['jugadas'] = $jugadaModel->getJugadasByUserAdmin($usuario);
		$data['usuario'] = $usuarioModel->where('usuario', $usuario)->first();
		return view('admin/usuario_datos', $data);
	}

	public function cambiarRol() {
		$usuarioModel = new UsuarioModel();
		$usuario = $usuarioModel->where('usuario', $this->request->getPost('usuario'))->first();
		
		$data = [
			'usuario_id' => $usuario['usuario_id'],
			'role' => $this->request->getPost('usuario_role'),
		];
		$usuarioModel->save($data);
		$message = setSwaMessage('Listo', 'Rol de usuario cambiado');
		return redirect()->to('usuarios')->with('message', $message);
	}

	//--------------------------------------------------------------------

}