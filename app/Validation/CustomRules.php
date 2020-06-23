<?php
namespace App\Validation;

use App\Models\UsuarioModel;
use App\Models\CuentasBancariasModel;

class CustomRules {

    public function validateUser(string $str, string $fields, array $data){
        $usuarioModel = new UsuarioModel();
        $user = $usuarioModel->getUserByLogin($data['usuario']);
        if(!$user)
            return false;

        return password_verify($data['password'], $user['password']);
    }

    public function checkBancoUse(string $str, string $fields, array $data){
        $cuentasBancariasModel = new CuentasBancariasModel();
        if(!$data['cuenta_id']){
            if($cuentasBancariasModel->getBancoByIdAndUser($data['banco'], session('usuario'))){
                return false;
            }
            return true;
        }else{
            if($cuentasBancariasModel->getBancoByIdAndUser($data['banco2'], session('usuario'), $data['cuenta_id'])){
                return false;
            }
            return true;
        }        
    }    
    
    public function checkNumCuentaUse(string $str, string $fields, array $data){
        $cuentasBancariasModel = new CuentasBancariasModel();        
        if($cuentasBancariasModel->getBancoByNumCuenta($data['numero_cuenta2'], $data['cuenta_id'])){
            return false;
        }
        return true;            
    }  
}
