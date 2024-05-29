<?php

namespace App\Models;

use CodeIgniter\Model;

class SeccionDetalleModel extends Model{

    protected $table = 'seccion_detalle';
    protected $primaryKey = 'id_detalle';
    protected $DBGroup = 'administracion';
    protected $allowedFields = [
        'id_seccion',
        'nombre',
        'valor',
        'estado'
    ];

    public function getDataSectionDetail(){
        return $this->findAll();
    }

    public function getDataSectionDetailBySection($idSection){
        return $this->where('id_seccion', $idSection)
                ->orderBy('id_detalle', 'asc')
                ->findAll();
    }
}