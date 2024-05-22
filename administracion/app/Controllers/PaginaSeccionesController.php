<?php

namespace App\Controllers;
use App\Models\PaginasModel;
use App\Models\PaginaSeccionesModel;

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
                $data['paginaSecciones'] = $paginaSeccionesModel->getDataPageSections();
                
                if(!isset($data['pagina'])){
                    header("Location:".base_url()."/paginas");
                    exit();
                }

                echo view('template/header');
                echo view('template/sidebar');
                echo view('dashboard/pagina_secciones', $data);
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
