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
               
}