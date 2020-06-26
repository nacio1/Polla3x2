<?php namespace App\Models;

use CodeIgniter\Model;

class AbonoModel extends Model
{
    protected $table      = 'abonos';
    protected $primaryKey = 'abono_id';    

    protected $allowedFields = [
        'usuario',
        'banco_receptor', 
        'banco_emisor', 
        'num_ref',
        'num_cuenta',
        'monto',
        'fecha_abono',
        'status'
    ];   

    public function getAll() {
        $builder =    $this->db->table('abonos');     
        $query = $builder
        ->select('abono_id, usuario, monto, DATE_FORMAT(fecha_abono, "%M %d") AS fecha_abono, status')
        ->orderBy("FIELD(status, 'pendiente') DESC, fecha_Abono DESC ")
        ->get()->getResultArray();
        return $query;
    }

    public function getAbonoById(int $abono_id) {
        $builder =    $this->db->table('abonos');     
        $query = $builder
        ->select('abonos.abono_id, abonos.usuario, abonos.monto, DATE_FORMAT(abonos.fecha_abono, "%M %d") AS fecha_abono, abonos.status,
        abonos.banco_receptor, bancos.nombre as banco_emisor, abonos.num_cuenta, abonos.num_ref')
        ->join('bancos', 'abonos.banco_emisor = bancos.banco_id')
        ->where('abonos.abono_id', $abono_id)
        ->get()->getRowArray();
        return $query;
    }

    public function getByUser(string $usuario) {
        $builder =    $this->db->table('abonos');     
        $query = $builder
        ->select('abonos.abono_id, abonos.usuario, abonos.monto, DATE_FORMAT(abonos.fecha_abono, "%d/%m") AS fecha_abono, abonos.status,
        abonos.banco_receptor, bancos.nombre as banco_emisor, abonos.num_cuenta, abonos.num_ref')
        ->join('bancos', 'abonos.banco_emisor = bancos.banco_id')
        ->where('usuario', $usuario)
        ->orderBy("FIELD(status, 'pendiente') DESC, fecha_Abono DESC ")
        ->get()->getResultArray();
        return $query;
    }
               
}