<?php

namespace App\Controllers;

use App\Models\ContactoModel;
use App\Models\PaginaSeccionesModel;
use App\Models\SeccionDetalleModel;

class ConozcanosController extends BaseController
{
    private int $idPagina = 1;
    private int $idPaginaFooter = 3;

    public function index()
    {
        $ContactoModel = new ContactoModel();
        $paginaSeccionesModel = new PaginaSeccionesModel();
        $seccionDetalleModel = new SeccionDetalleModel();

        $data['contactos'] = $ContactoModel->getDataContacto();
        $data['secciones'] = $paginaSeccionesModel->getDataPageSectionsByPage($this->idPagina);
        $data['seccionesFooter'] = $paginaSeccionesModel->getDataPageSectionsByPage($this->idPaginaFooter);

        $elementos = array();
        foreach($data['secciones'] as $seccion){
            $seccionDetalle = $seccionDetalleModel->getDataSectionDetailBySection($seccion['id_seccion']);
            foreach($seccionDetalle as $detalle){
                $elementos[] = $detalle;
            }
        }
        $data['elementos'] = $elementos;

        // Obtiene la seccion de siguenos (RRSS)
        $elementos = array();
        foreach($data['seccionesFooter'] as $seccion){
            $seccionDetalle = $seccionDetalleModel->getDataSectionDetailBySection($seccion['id_seccion']);
            foreach($seccionDetalle as $detalle){
                $elementos[] = $detalle;
            }
        }
        $data['elementosFooter'] = $elementos;


        echo view('head_foot/header');
        echo view('component/conozcanos',$data);
        echo view('head_foot/footer', $data);
    }
}