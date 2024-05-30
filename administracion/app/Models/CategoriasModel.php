<?php

namespace App\Models;
use CodeIgniter\Model;
class CategoriasModel extends Model{

    protected $table = 'categoria';
    protected $primaryKey = 'id_categoria';
    protected $allowedFields = [
        'nombre', 
        'descripcion', 
        'fotografia',
        'estado'
    ];

    public function getDataCategorias(){
        $this->select('*');
        return $this->findAll();
    }
}