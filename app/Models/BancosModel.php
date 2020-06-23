<?php namespace App\Models;

use CodeIgniter\Model;

class BancosModel extends Model {
    protected $table      = 'bancos';
    protected $primaryKey = 'banco_id';    

    protected $allowedFields = [];          
}