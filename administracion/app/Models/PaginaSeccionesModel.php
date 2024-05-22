<?php

namespace App\Models;
use CodeIgniter\Model;
class PaginaSeccionesModel extends Model{

    protected $table = 'pagina_seccion';
    protected $primaryKey = 'id_seccion';
    protected $DBGroup = 'administracion';
    protected $allowedFields = [
        'nombre'
    ];

    public function getDataPageSections(){
        return $this->findAll();
    }
}