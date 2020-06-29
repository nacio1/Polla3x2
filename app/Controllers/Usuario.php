<?php namespace App\Controllers;

use App\Models\UsuarioModel;
use App\Models\BancosModel;
use CodeIgniter\I18n\Time;

class Usuario extends BaseController
{     
    public function login() {  
        $data = [];                 
        if($this->request->getMethod() == 'post') {
            $rules = [
                'usuario' => 'required|min_length[3]|max_length[20]',
                'password' => 'required|min_length[8]|validateUser[email,password]'                
            ];           

            if(! $this->validate($rules)) {
                $data['error'] = 'Usuario o contraseña incorrectos';                           
            }else{                
                $this->setUserSession($this->request->getVar('usuario'));
                $this->updateLastLogin(session('usuario_id'));
                if(session('usuario_role') == 'admin') {
                    return redirect()->to('admin');
                }
                return redirect()->to('jugador');
            }
        }
        return view('login', $data);
    }

    protected function updateLastLogin(int $usuario_id) {
        $data = [
            'usuario_id' => $usuario_id,
            'last_login'=> new Time('now', 'America/Caracas', 'en_US')
        ];        
        $usuarioModel = new UsuarioModel();
        $usuarioModel->save($data);
    }

    public function setUserSession(string $usuario) {
        $usuarioModel = new UsuarioModel();
        $user = $usuarioModel->getUserByLogin($usuario);        

        $newData = [
            'usuario_id'  => $user['usuario_id'],
            'usuario'  => $user['usuario'],                    
            'usuario_email'     => $user['usuario_email'],
            'usuario_saldo' => $user['usuario_saldo'],                    
            'usuario_role' => $user['role'],
            'usuario_contador' => $user['contador'],
            'isLoggedIn' => TRUE
        ];

        session()->set($newData);
        
        return true;
    }
    
    public function registro() {
        $data = [];         
        if($this->request->getMethod() == 'post') {
            $rules = [
                'usuario' => 'required|alpha_dash|min_length[3]|max_length[20]|is_unique[usuarios.usuario]',
                'password' => 'required|min_length[8]',
                'email' => 'required|max_length[50]|valid_email|is_unique[usuarios.usuario_email]',
                'confirm_password' => 'required_with[password]|matches[password]'
            ];

            if(! $this->validate($rules)) {
                $message = setSwaMessage('','', 2);
                
                return redirect()->to('registro')->with('message', $message);
            }else{
                $usuarioModel = new UsuarioModel();

                $newUser = [
                    'usuario' => $this->request->getVar('usuario'),
                    'usuario_email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                    'fecha_creado' => new Time('now', 'America/Caracas', 'en_US')
                ];

                $usuarioModel->save($newUser);

                $message = setSwaMessage('Registro Exitoso','Ya puedes iniciar sesión');
                
                return redirect()->to('login')->with('message', $message);
            }
        }

        return view('registro', $data);
    }

    public function perfil() {
        $usuarioModel = new UsuarioModel();
        $data['usuario'] = $usuarioModel->getUserByUsuario(session('usuario'));
        $data['title'] = 'Perfil';
        if($postData = $this->request->getPost()) {
            if(!$data['usuario']['cedula']) {
                $rules = [
                    'nombre' => 'required|min_length[2]|max_length[20]',
                    'apellido' => 'required|min_length[2]|max_length[20]',                
                    'cedula' => 'required|min_length[7]|max_length[8]|is_natural|is_unique[usuarios.cedula]',                
                ];
                if($postData['password'] != '') {
                    $rules['password'] = 'min_length[8]';
                }
    
                if(! $this->validate($rules)) {
                    $message = setSwaMessage('','', 2);                    
                    return redirect()->to('perfil')->with('message', $message);
                }else{
                    $newUser = [
                        'usuario_id' => session('usuario_id'),
                        'nombre' => $postData['nombre'],
                        'apellido' => $postData['apellido'],                   
                        'cedula' => $postData['cedula']                   
                    ];
                    if($postData['password'] != '') {
                        $newUser['password'] = $postData['password'];
                    }
    
                    $usuarioModel->save($newUser);
    
                    $message = setSwaMessage('Perfil actualizado','Tu perfil fue actualizado');
                    
                    return redirect()->to('perfil')->with('message', $message);
                }
            }else{//if exist cedula 
                $rules['password'] = 'min_length[8]';
                if(! $this->validate($rules)) {
                    $message = setSwaMessage('','', 2);                    
                    return redirect()->to('perfil')->with('message', $message);
                }else{
                    $newUser['password'] = $this->request->getPost('password');
                    $newUser['usuario_id'] = session('usuario_id');
                    $usuarioModel->save($newUser);
    
                    $message = setSwaMessage('Contraseña actualizada','Tu contraseña ha sido cambiada');
                    
                    return redirect()->to('perfil')->with('message', $message);
                }
            }//else           
        }//if post data
        return view('jugador/perfil', $data);
    }

    public function emailExists() {
        if ($this->request->isAJAX()) {
            
            $email = $this->request->getPost('email');
       
            $usuarioModel = new UsuarioModel();           
            $return = ($usuarioModel->getUserByEmail($email)) ? false : true;
            
            echo json_encode($return);
        }            
    }

    public function cedulaExists() {
        if ($this->request->isAJAX()) {
            
            $cedula = $this->request->getPost('cedula');
       
            $usuarioModel = new UsuarioModel();           
            $return = ($usuarioModel->where('cedula', $cedula)->first()) ? false : true;
            
            echo json_encode($return);
        }            
    }

    public function userExists() {
        if ($this->request->isAJAX()) {
            
            $usuario = $this->request->getPost('usuario');
       
            $usuarioModel = new UsuarioModel();           
            $return = ($usuarioModel->getUserByUsuario($usuario)) ? false : true;
            
            echo json_encode($return);
        }            
    }

    public function cerrarSesion() {
        session()->destroy();
        return redirect()->to('/');
    }
	//--------------------------------------------------------------------
    public function test() {
        $usuarioModel = new UsuarioModel();
        $user = $usuarioModel->getUserByLogin('nacio');
        echo '<pre>';
        var_dump($user);
        echo '</pre>';
    }
}
