<?php

namespace App\Controllers\Paginaweb;

use App\Controllers\BaseController;
use App\Models\Paginaweb\PaginasModel;
use App\Models\Paginaweb\PaginaSeccionesModel;
use App\Models\Paginaweb\SeccionDetalleModel;

class PaginaSeccionesController extends BaseController
{
    private SeccionDetalleModel $seccionDetalleModel;

    public function __construct(){
        $this->seccionDetalleModel = new SeccionDetalleModel();
    }

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
                foreach($data['secciones'] as $seccion){
                    $seccionDetalle = $this->seccionDetalleModel->getDataSectionDetailBySection($seccion['id_seccion']);
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

    public function update()
    {
        try {

            $data = array();
            foreach ($this->request->getPost('elemento') as $key => $element){
                $data[] = array(
                    'id_detalle' => $element['id_elemento'],
                    'valor' => $element['valor_elemento'],
                    'estado' => array_key_exists('estado_elemento', $element) ? 1 : 0
                );
            }
                 
            if ($this->seccionDetalleModel->updateBatch($data, 'id_detalle')) {
                echo json_encode("success");
            }

        } catch (Exception $th) {
            echo $th;
        }
    }

}
