<?php

namespace App\Controllers;
use App\Models\PaginasModel;

class PaginasController extends BaseController
{
    public function index()
    {
        try {
            $session = session();
            if(isset($_SESSION['sesion_activa'])){
                $paginasModel = new PaginasModel();
                $data['paginas'] = $paginasModel->getDataPage();
                echo view('template/header');
                echo view('template/sidebar');
                echo view('dashboard/paginas', $data);
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
