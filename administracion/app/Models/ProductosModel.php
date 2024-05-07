<?php

namespace App\Models;
use CodeIgniter\Model;
class ProductosModel extends Model{

    protected $table = 'producto';
    protected $primaryKey = 'id_producto';
    protected $allowedFields = [
        "id_marca",
        "id_categoria",
        "nombre",
        "descripcion",
        "fotografia",
        "destacado"
    ];

    public function updateDestacado($id,$estado){
        $this->set('destacado', $estado);
        $this->where('id_producto', $id);
        return $this->update();
    }

    public function countDestacados(){
        $this->select('*');
        $this->where('destacado',1);
        return $this->findAll();
    }

}