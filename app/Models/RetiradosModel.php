<?php namespace App\Models;

use CodeIgniter\Model;

class RetiradosModel extends Model {
    protected $table      = 'retirados';
    protected $primaryKey = 'retirados_id';    

    protected $allowedFields = [
        'jornada_id', 
        'fecha_jornada', 
        '1va_retirados',
        '2va_retirados',
        '3va_retirados',
        '4va_retirados',
        '5va_retirados',
        '6va_retirados'
    ];   

    public function getAll() {
        $builder = $this->db->table('retirados');
        $query = $builder        
        ->select('DATE_FORMAT(fecha_jornada, "%d/%m")as fecha_jornada, retirados_id, 1va_retirados, 2va_retirados, 3va_retirados, 4va_retirados, 5va_retirados, 6va_retirados,')
        ->orderBy('fecha_jornada', 'DESC')
        ->get()->getResultArray();
        return $query;
    }
    
    public function getJornadaRetirados() {
        $builder = $this->db->table('retirados');
        $query = $builder
        ->where('jornada_id', $GLOBALS['jornada_id'])
        ->select('1va_retirados, 2va_retirados, 3va_retirados, 4va_retirados, 5va_retirados, 6va_retirados,')
        ->get()->getResultArray();
        return array_values($query[0]);
    }
}