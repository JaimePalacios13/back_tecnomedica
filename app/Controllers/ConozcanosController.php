<?php

namespace App\Controllers;

use App\Models\ContactoModel;
use App\Models\PaginaSeccionesModel;
use App\Models\SeccionDetalleModel;

class ConozcanosController extends BaseController
{
    private int $idPagina = 1;

    public function index()
    {
        $ContactoModel = new ContactoModel();
        $paginaSeccionesModel = new PaginaSeccionesModel();
        $seccionDetalleModel = new SeccionDetalleModel();

        $data['contactos'] = $ContactoModel->getDataContacto();
        $data['secciones'] = $paginaSeccionesModel->getDataPageSectionsByPage($this->idPagina);

        $elementos = array();
        foreach($data['secciones'] as $seccion){
            $seccionDetalle = $seccionDetalleModel->getDataSectionDetailBySection($seccion['id_seccion']);
            foreach($seccionDetalle as $detalle){
                $elementos[] = $detalle;
            }
        }
        $data['elementos'] = $elementos;


        echo view('head_foot/header');
        echo view('component/conozcanos',$data);
        echo view('head_foot/footer', $data);
    }
}