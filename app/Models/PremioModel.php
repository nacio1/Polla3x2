<?php namespace App\Models;

use CodeIgniter\Model;

class PremioModel extends Model {
    protected $table      = 'premios';
    protected $primaryKey = 'premio_id';    

    protected $allowedFields = [
        'jornada_id',
        'total_jugadas',
        'total_premio', 
        '1er_lugar_premio', 
        '2do_lugar_premio'
    ];  
    
    public function getPremioByJornadaId(int $jornada_id) {
        $builder = $this->db->table('premios');
        $query = $builder
        ->select('jornada_id, total_jugadas, total_premio, 1er_lugar_premio, 2do_lugar_premio')
        ->where('jornada_id', $jornada_id)        
        ->get()->getRowArray();
        return $query;
    }
}