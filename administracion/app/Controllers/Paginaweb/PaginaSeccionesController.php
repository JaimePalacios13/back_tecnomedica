<?php

namespace App\Controllers\Paginaweb;

use App\Controllers\BaseController;
use App\Models\Paginaweb\PaginasModel;
use App\Models\Paginaweb\PaginaSeccionesModel;
use App\Models\Paginaweb\SeccionDetalleModel;

class PaginaSeccionesController extends BaseController
{
    public function index($idPagina)
    {
        try {
            $session = session();
            if(isset($_SESSION['sesion_activa'])){
                $paginasModel = new PaginasModel();
                $data['pagina'] = $paginasModel->getPage($idPagina);

                $paginaSeccionesModel = new PaginaSeccionesModel();
                $data['secciones'] = $paginaSeccionesModel->getDataPageSectionsByPage($idPagina);

                $elementos = array();
                $seccionDetalleModel = new SeccionDetalleModel();
                foreach($data['secciones'] as $seccion){
                    $seccionDetalle = $seccionDetalleModel->getDataSectionDetailBySection($seccion['id_seccion']);
                    foreach($seccionDetalle as $detalle){
                        $elementos[] = $detalle;
                    }
                    
                }
                $data['elementos'] = $elementos;

                if(!isset($data['pagina'])){
                    header("Location:".base_url()."/paginas");
                    exit();
                }

                echo view('template/header');
                echo view('template/sidebar');
                echo view('dashboard/paginaweb/pagina_secciones', $data);
                echo view('template/footer');
            }else {
                header("Location:".base_url());
                exit();
            }
        }
        catch (\Throwable $th) {
            echo view('exceptions/html/exception_general');
            var_dump($th);
        }   
    }

}
