<?php namespace App\Models;

use CodeIgniter\Model;

class ResultadosModel extends Model {
    protected $table      = 'resultados';
    protected $primaryKey = 'resultados_id';    

    protected $allowedFields = [
        'jornada_id', 
        'fecha_jornada', 
        '1va_resultados',
        '2va_resultados',
        '3va_resultados',
        '4va_resultados',
        '5va_resultados',
        '6va_resultados'
    ];  

    public function getAll() {
        $builder = $this->db->table('resultados');
        $query = $builder        
        ->select('DATE_FORMAT(fecha_jornada, "%d/%m")as fecha_jornada, 1va_resultados, 2va_resultados, 3va_resultados, 4va_resultados, 5va_resultados, 6va_resultados,')
        ->orderBy('fecha_jornada', 'DESC')
        ->get()->getResultArray();
        return $query;
    }
}    