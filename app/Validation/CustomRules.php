<?php
namespace App\Validation;

use App\Models\UsuarioModel;

class CustomRules {

    public function validateUser(string $str, string $fields, array $data){
        $usuarioModel = new UsuarioModel();
        $user = $usuarioModel->getUserByLogin($data['usuario']);
        if(!$user)
            return false;

        return password_verify($data['password'], $user['password']);
    }    
}
