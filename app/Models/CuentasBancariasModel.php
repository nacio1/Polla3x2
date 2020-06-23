<?php namespace App\Models;

use CodeIgniter\Model;

class CuentasBancariasModel extends Model {
    protected $table      = 'cuentasbancarias';
    protected $primaryKey = 'cuenta_id';    

    protected $allowedFields = [
        'usuario',
        'banco_id',
        'numero_cuenta'
    ];      

    public function getCuentasByUser(string $usuario) {
        $builder = $this->db->table('cuentasbancarias');
        $query = $builder
        ->select('cuentasbancarias.cuenta_id, cuentasbancarias.numero_cuenta, cuentasbancarias.banco_id, bancos.nombre as nombre')        
        ->join('bancos', 'cuentasbancarias.banco_id = bancos.banco_id')
        ->where('usuario', $usuario)
        ->get()->getResultArray();
        return $query;
    }
    
    public function getBancoByIdAndUser(int $banco_id, string $usuario, int $cuenta_id = null) {
        $builder = $this->db->table('cuentasbancarias');
        $builder
        ->where('banco_id', $banco_id)
        ->where('usuario', $usuario);

        if($cuenta_id){
            $builder->where('cuenta_id !=', $cuenta_id);
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getBancoByNumCuenta(string $numero_cuenta, int $cuenta_id = null) {
        $builder = $this->db->table('cuentasbancarias');
        $builder
        ->where('numero_cuenta', $numero_cuenta);
        if($cuenta_id){
            $builder->where('cuenta_id !=', $cuenta_id);
        }
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function actualizarCuenta(int $cuenta_id, string $usuario, array $data) {
        $builder = $this->db->table('cuentasbancarias');
        $builder->where('cuenta_id', $cuenta_id)
        ->where('usuario', $usuario)
        ->set($data)->update();
    }
}