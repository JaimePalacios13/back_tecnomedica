<?php

namespace App\Models;
use CodeIgniter\Model;
class DetalleProductoModel extends Model{

    protected $table = 'producto';
    protected $primaryKey = 'id_producto';

    /* public function getDataProductos($idcate){
        $this->select('*');
        $this->join('marca','producto.id_marca = marca.idmarca');
        $this->where('id_categoria',$idcate);
        return $this->findAll();
    } */
    public function getDataProductSelect($idproduct){
        $this->select('producto.*,marca.*, categoria.nombre as nombreCategoria');
        $this->join('marca','producto.id_marca = marca.idmarca');
        $this->join('categoria','producto.id_categoria = categoria.id_categoria');
        $this->where('producto.id_producto',$idproduct);
        return $this->findAll();
    }

    public function getDestacados(){
        $this->select('*');
        $this->where('destacado',1);
        return $this->findAll();
    }

    public function getDataActiveProductSelect($idproduct){
        $this->select('producto.*,marca.*, categoria.nombre as nombreCategoria');
        $this->join('marca','producto.id_marca = marca.idmarca');
        $this->join('categoria','producto.id_categoria = categoria.id_categoria');
        $this->where('producto.id_producto',$idproduct);
        $this->where('producto.estado',1);
        return $this->findAll();
    }

    public function getDestacadosActivos(){
        $this->select('*');
        $this->where('destacado',1);
        $this->where('estado',1);
        return $this->findAll();
    }
}