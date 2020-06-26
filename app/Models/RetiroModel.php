<?php namespace App\Models;

use CodeIgniter\Model;

class RetiroModel extends Model {
    protected $table      = 'retiros';
    protected $primaryKey = 'retiro_id';    

    protected $allowedFields = [
        'usuario',
        'cuenta_id',
        'monto',
        'fecha_retiro',
        'status'
    ]; 

    public function getAll() {
        $builder = $this->db->table('retiros');
        $query = $builder
        ->select('retiros.retiro_id, retiros.usuario, retiros.monto,DATE_FORMAT(retiros.fecha_retiro, "%M %d") AS fecha_retiro, retiros.status,
        bancos.nombre as banco_nombre, cuentasbancarias.numero_cuenta')
        ->join('cuentasbancarias', 'retiros.cuenta_id = cuentasbancarias.cuenta_id')
        ->join('bancos', 'cuentasbancarias.banco_id = bancos.banco_id')
        ->orderBy("FIELD(retiros.status, 'pendiente') DESC, fecha_retiro DESC ")
        ->get()->getResultArray();
        return $query;
    }

    public function getByUser(string $usuario) {
        $builder = $this->db->table('retiros');
        $query = $builder
        ->select('retiros.retiro_id, retiros.usuario, retiros.monto,DATE_FORMAT(retiros.fecha_retiro, "%d/%m") AS fecha_retiro, retiros.status,
        bancos.nombre as banco_nombre, cuentasbancarias.numero_cuenta')
        ->join('cuentasbancarias', 'retiros.cuenta_id = cuentasbancarias.cuenta_id')
        ->join('bancos', 'cuentasbancarias.banco_id = bancos.banco_id')
        ->where('retiros.usuario', $usuario)
        ->orderBy("FIELD(retiros.status, 'pendiente') DESC, fecha_retiro DESC ")
        ->get()->getResultArray();
        return $query;
    }

    public function getRetiroById(int $retiro_id) {
        $builder = $this->db->table('retiros');
        $query = $builder
        ->select('retiros.retiro_id, retiros.usuario, retiros.monto,DATE_FORMAT(retiros.fecha_retiro, "%M %d") AS fecha_retiro, retiros.status,
        bancos.nombre as banco_nombre, cuentasbancarias.numero_cuenta, usuarios.cedula, CONCAT(usuarios.nombre, " ", usuarios.apellido) as beneficiario')
        ->join('cuentasbancarias', 'retiros.cuenta_id = cuentasbancarias.cuenta_id')
        ->join('bancos', 'cuentasbancarias.banco_id = bancos.banco_id')
        ->join('usuarios', 'retiros.usuario = usuarios.usuario')
        ->where('retiros.retiro_id', $retiro_id)       
        ->get()->getRowArray();
        return $query;
    }
}    