<?php namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table      = 'usuarios';
    protected $primaryKey = 'usuario_id';        

    protected $allowedFields = [
        'nombre', 
        'apellido', 
        'usuario_email', 
        'usuario', 
        'password',        
        'usuario_saldo',
        'contador',
        'last_login'
    ];

    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    protected function hashPassword(array $data) {
        if (! isset($data['data']['password'])) return $data;     
                        
        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);                             

        return $data;
    }

    public function getUserByEmail(string $email) {
        return $this->builder()->where('usuario_email', $email)->get()->getRow();
    }

    public function getUserByUsuario(string $usuario) {
        $builder = $this->db->table('usuarios'); 
        $query = $builder->where('usuario', $usuario)->get()->getRowArray();
        return $query;
    }

    public function getUserByLogin(string $usuario) {
        $builder = $this->db->table('usuarios'); 
        $query = $builder->where('usuario_email', $usuario)
        ->orWhere('usuario', $usuario)
        ->get()->getRowArray();
        return $query;
    }
}