<?php

namespace App\Models;
use CodeIgniter\Model;
class CategoriasModel extends Model{

    protected $table = 'categoria';
    protected $primaryKey = 'id_categoria';

    public function getDataCategorias(){
        $this->select('*');
        return $this->findAll();
    }
    public function getDataCategoriaSelect($idcate){
        $this->select('*');
        $this->where('id_categoria',$idcate);
        return $this->findAll();
    }

    public function getCategoriasActivas(){
        $this->where('estado', 1);
        return $this->findAll();
    }

    public function getCategoriasActivasOrdenadas(){
        return  $this->where('estado', 1)
                ->orderBy('orden', 'asc')
                ->findAll();
    }
}