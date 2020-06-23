<?php namespace App\Controllers\jugador;

use  App\Controllers\Basecontroller;

use App\Models\BancosModel;
use App\Models\CuentasBancariasModel;

class Bancos extends BaseController
{
    public function misCuentas() {
        $bancosModel = new BancosModel();
        $cuentasBancariasModel = new CuentasBancariasModel();
        $data['bancos'] = $bancosModel->findAll();
        $data['title'] = 'Mis cuentas';
        $data['cuentas'] = $cuentasBancariasModel->getCuentasByUser(session('usuario'));
        return view('jugador/mis-cuentas', $data);
    }

    public function registrarCuenta() {
        $rules = [
            'banco' => 'required|is_not_unique[bancos.banco_id]|checkBancoUse[banco]',
            'numero_cuenta' => 'required|is_natural|exact_length[20]|is_unique[cuentasbancarias.numero_cuenta]',            
        ];

        if(! $this->validate($rules)) {
            $message = setSwaMessage('','', 2);                                 
            return redirect()->to('mis-cuentas')->with('message', $message);
        }else{
            $cuentasBancariasModel = new CuentasBancariasModel();

            $newData = [
                'usuario' => session('usuario'),
                'banco_id' => $this->request->getVar('banco'),
                'numero_cuenta' => $this->request->getVar('numero_cuenta')
            ];

            $cuentasBancariasModel->save($newData);

            $message = setSwaMessage('Cuenta agregada','Tu cuenta fue agregada');
            
            return redirect()->to('mis-cuentas')->with('message', $message);
        }
    }

    public function editarCuenta() {
        $rules = [
            'cuenta_id' =>'required',
            'banco2' => 'required|is_not_unique[bancos.banco_id]|checkBancoUse[banco, cuenta_id]',
            'numero_cuenta2' => 'required|is_natural|exact_length[20]|checkNumCuentaUse[numero_cuenta2, cuenta_id]',            
        ];

        if(! $this->validate($rules)) {
            $message = setSwaMessage('','', 2);                                
            return redirect()->to('mis-cuentas')->with('message', $message);
        }else{
            $cuentasBancariasModel = new CuentasBancariasModel();

            $newData = [
                'cuenta_id' => $this->request->getVar('cuenta_id'),
                'usuario' => session('usuario'),
                'banco_id' => $this->request->getVar('banco2'),
                'numero_cuenta' => $this->request->getVar('numero_cuenta2')
            ];

            $cuentasBancariasModel->actualizarCuenta($this->request->getVar('cuenta_id'), session('usuario'), $newData);          

            $message = setSwaMessage('Cuenta actualizada','Tu cuenta fue actualizada');
            
            return redirect()->to('mis-cuentas')->with('message', $message);
        }
    }

    public function checkBancoUse() {
        if($this->request->isAjax()){
            $return; 
            $cuentasBancariasModel = new CuentasBancariasModel();
            $banco_id = $this->request->getPost('banco');
            if(!$this->request->getPost('cuenta_id') ){                
                if($cuentasBancariasModel->getBancoByIdAndUser($banco_id, session('usuario'))){
                    $return = false;
                }else{
                    $return = true;
                } 
            }else{
                $banco_id = $this->request->getPost('banco2');
                $cuenta_id = $this->request->getPost('cuenta_id');
                if($cuentasBancariasModel->getBancoByIdAndUser($banco_id, session('usuario'), $cuenta_id)){
                    $return = false;
                }else{
                    $return = true;
                } 
            }                       
            echo json_encode($return);
        }        
    }

    public function checkNumCuentaUse() {
        if($this->request->isAjax()){
            $return;
            $cuentasBancariasModel = new CuentasBancariasModel();
            if(!$this->request->getPost('cuenta_id')) {
                $numero_cuenta = $this->request->getPost('numero_cuenta');
                if( $cuentasBancariasModel->where('numero_cuenta', $numero_cuenta)->first() ){
                    $return = false;
                }else{
                    $return = true;
                }   
            }else{
                $cuenta_id = $this->request->getPost('cuenta_id');
                $numero_cuenta = $this->request->getPost('numero_cuenta2');
                if( $cuentasBancariasModel->getBancoByNumCuenta($numero_cuenta, $cuenta_id) ){
                    $return = false;
                }else{
                    $return = true;
                } 
            }                           
            echo json_encode($return);
        }  
    }
}