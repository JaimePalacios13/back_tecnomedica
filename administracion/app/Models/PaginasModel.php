<?php

namespace App\Models;
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
        $this->select('nombre, url');
        return $this->findAll();
    }
}