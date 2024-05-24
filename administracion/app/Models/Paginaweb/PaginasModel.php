<?php

namespace App\Models\Paginaweb;

use CodeIgniter\Model;

class PaginasModel extends Model{

    protected $table = 'pagina';
    protected $primaryKey = 'id_pagina';
    protected $DBGroup = 'administracion';
    protected $allowedFields = [
        'nombre',
        'url'
    ];

    public function getDataPage(){
        $this->select('id_pagina, nombre, url');
        return $this->findAll();
    }

    public function getPage($idPagina){
        return $this->find($idPagina);
    }
}