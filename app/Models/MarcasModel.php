<?php

namespace App\Models;
use CodeIgniter\Model;
class MarcasModel extends Model{

    protected $table = 'marca';
    protected $primaryKey = 'idmarca';

    public function getDataMarcas(){
        $this->select('*');
        $this->where('estado','1');
        return $this->findAll();
    }
}