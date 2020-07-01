<?php namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table      = 'usuarios';
    protected $primaryKey = 'usuario_id';        

    protected $allowedFields = [
        'nombre', 
        'apellido', 
        'cedula', 
        'usuario_email', 
        'usuario',         
        'referido',         
        'password',        
        'usuario_saldo',
        'contador',
        'fecha_creado',
        'last_login',
        'role'
    ];

    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    protected function hashPassword(array $data) {
        if (! isset($data['data']['password'])) return $data;     
                        
        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);                             

        return $data;
    }

    public function getAll() {
        $builder = $this->db->table('usuarios'); 
        $query = $builder
        ->select('usuario, usuario_saldo, DATE_FORMAT(fecha_creado, "%d/%m/%Y") as fecha_creado, DATE_FORMAT(last_login, "%d/%m %H:%i") as login, role')
        ->orderBy('last_login DESC')        
        ->get()->getResultArray();
        return $query;
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

    public function getRererido(string $usuario) {
        $builder = $this->db->table('usuarios'); 
        $query = $builder
        ->where('usuario', $usuario)  
        ->get()->getRowArray();
        return $query;
    }
}