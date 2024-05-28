<?php

namespace App\Controllers\Paginaweb;

use App\Controllers\BaseController;
use App\Models\Paginaweb\PaginasModel;

class PaginasController extends BaseController
{
    public function index()
    {
        $session = session();
        if(isset($_SESSION['sesion_activa'])){
            $paginasModel = new PaginasModel();
            $data['paginas'] = $paginasModel->getDataPage();
            $data['loadPaginasJS'] = true;

            echo view('template/header');
            echo view('template/sidebar');
            echo view('dashboard/paginaweb/paginas', $data);
            echo view('template/footer');
        }else {
            header("Location:".base_url());
            exit();
        } 
    }
}
