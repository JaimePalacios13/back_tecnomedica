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
        'estado',
        'orden'
    ];

    public function getDataCategorias(){
        $this->select('*');
        return $this->findAll();
    }

    public function getOrdenCategorias(){
        return $this->select('id_categoria, nombre')
                ->where('estado', 1)
                ->orderBy('orden', 'asc')
                ->findAll();
    }

    public function getNombreCategoriasActivas(){
        return $this->select('id_categoria, nombre')
                ->where('estado', 1)
                ->findAll();
    }

}