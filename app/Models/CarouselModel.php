<?php

namespace App\Models;
use CodeIgniter\Model;
class CarouselModel extends Model{

    protected $table = 'carousel';
    protected $primaryKey = 'id_carousel';

    public function getDataCarousel(){
        $this->select('*');
        $this->where('id_carousel',1);
        return $this->findAll();
    }
}