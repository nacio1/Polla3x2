<?php namespace App\Models;

use CodeIgniter\Model;

class JornadaModel extends Model {
    
    protected $table      = 'jornadas';
    protected $primaryKey = 'jornada_id';   

    protected $allowedFields = [
        'fecha_jornada', 'fecha_cierre', '1va_ejemplares', 
        '2va_ejemplares', '3va_ejemplares', '4va_ejemplares', 
        '5va_ejemplares', '6va_ejemplares', '1er_lugar', 
        '2do_lugar', 'coste_jugada', 'status'
    ];   

    public function getAll() {
        $builder = $this->db->table('jornadas');
        $query = $builder
        ->select('jornada_id, DATE_FORMAT(fecha_jornada, "%M %d") AS fecha_jornada, 
        DATE_FORMAT(fecha_cierre, "%h %i %p") AS fecha_cierre, 1er_lugar, 2do_lugar, coste_jugada, status')
        ->orderBy('status DESC, fecha_jornada DESC')
        ->get()->getResultArray();
        return $query;
    }   

    public function getJornadaEjemplares() {
        $builder = $this->db->table('jornadas');
        $query = $builder
        ->where('jornada_id', $GLOBALS['jornada_id'])
        ->select('1va_ejemplares, 2va_ejemplares, 3va_ejemplares, 4va_ejemplares, 5va_ejemplares, 6va_ejemplares,')
        ->get()->getResultArray();
        return array_values($query[0]);
    } 
}