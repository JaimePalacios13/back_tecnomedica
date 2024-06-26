<?php

namespace App\Controllers;

use App\Models\PaginaSeccionesModel;
use App\Models\CategoriasModel;
use App\Models\ContactoModel;
use App\Models\SeccionDetalleModel;

class ProductosController extends BaseController
{
    private int $idPagina = 1;
    private int $idPaginaFooter = 3;
    private int $idPaginaHeader = 4;

    public function index()
    {
        $categoriasModel = new CategoriasModel();
        $ContactoModel = new ContactoModel();
        $paginaSeccionesModel = new PaginaSeccionesModel();
        $seccionDetalleModel = new SeccionDetalleModel();

        $data['categorias'] = $categoriasModel->getCategoriasActivasOrdenadas();
        $data['contactos'] = $ContactoModel->getDataContacto();
        $data['seccionesFooter'] = $paginaSeccionesModel->getDataPageSectionsByPage($this->idPaginaFooter);
        $seccionesHeader = $paginaSeccionesModel->getDataPageSectionsByPage($this->idPaginaHeader);
        $data['tituloSeccionCategorias'] = 'Categorías';

        // Obtiene la seccion de siguenos (RRSS)
        $elementos = array();
        foreach($data['seccionesFooter'] as $seccion){
            $seccionDetalle = $seccionDetalleModel->getDataSectionDetailBySection($seccion['id_seccion']);
            foreach($seccionDetalle as $detalle){
                $elementos[] = $detalle;
            }
        }
        $data['elementosFooter'] = $elementos;

        // Obtiene las secciones de header
        $elementos = array();
        foreach($seccionesHeader as $seccion){
            $seccionesDetalle[] = $seccionDetalleModel->getDataSectionDetailBySection($seccion['id_seccion']);
        }
        $data['seccionesHeader'] = $seccionesDetalle;

        return view('head_foot/header', $data)
            .view('component/productos')
            .view('head_foot/footer');
    }
}