<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

use App\Models\UsuarioModel;

class actualizarSaldo implements FilterInterface {

    public function before(RequestInterface $request)
    {   
        $usuarioModel = new UsuarioModel();

        $user =$usuarioModel->where('usuario', session('usuario'))->first();
        session()->set('usuario_saldo', $user['usuario_saldo']);         
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // Do something here
    }
}