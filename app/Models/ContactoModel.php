<?php

namespace App\Models;
use CodeIgniter\Model;
class ContactoModel extends Model{

    protected $table = 'contactos';
    protected $primaryKey = 'id_contactos';

    public function getDataContacto(){
        $this->select('*');
        return $this->findAll();
    }
}