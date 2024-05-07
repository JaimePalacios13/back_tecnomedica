<?php

namespace App\Models;
use CodeIgniter\Model;
class VitrinaProductModel extends Model{

    protected $table = 'producto';
    protected $primaryKey = 'id_producto';

    public function getDataProductos($idcate){
        $this->select('*');
        $this->join('marca','producto.id_marca = marca.idmarca');
        $this->where('id_categoria',$idcate);
        return $this->findAll();
    }
    /* public function getDataProductSelect($idproduct){
        $this->select('*');
        $this->join('marca','producto.id_marca = marca.idmarca');
        $this->where('id_producto',$idproduct);
        return $this->findAll();
    } */
}