<?php namespace App\Controllers\jugador;

use  App\Controllers\Basecontroller;

use App\Models\JornadaModel;
use App\Models\UsuarioModel;
use App\Models\JugadaModel;

class Referidos extends BaseController
{
   public function index() {
       $usuarioModel = new UsuarioModel();
       $data['usuarios'] = $usuarioModel->where('referido', session('usuario'))->orderBy('last_login DESC')->findAll();
       $data['title'] = 'Referidos';
       return view('jugador/referidos', $data);
   }

   public function referidoJugadas(string $usuario) {
       $jugadaModel = new JugadaModel();
       $data['jugadas'] = $jugadaModel->getJugadasReferido($usuario, session('usuario'));
       $data['title'] = $usuario;
       return view('jugador/referido_jugadas', $data);
   }
   
   public function referidoJugadasAdmin(string $usuario) {
    $jugadaModel = new JugadaModel();
    $data['jugadas'] = $jugadaModel->getJugadasReferido($usuario, session('usuario'));
    $data['title'] = $usuario;
    return view('admin/referido_jugadas', $data);
}
}    