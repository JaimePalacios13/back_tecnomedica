<?php

namespace App\Models;
use CodeIgniter\Model;
class HomeModel extends Model{

    protected $table = 'inicio';
    protected $primaryKey = 'id_index';

    public function getDataHome(){
        $this->select('*');
        return $this->findAll();
    }
}