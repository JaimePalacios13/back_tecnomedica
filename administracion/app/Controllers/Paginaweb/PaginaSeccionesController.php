<?php

namespace App\Controllers\Paginaweb;

use App\Controllers\BaseController;
use App\Models\Paginaweb\PaginasModel;
use App\Models\Paginaweb\PaginaSeccionesModel;
use App\Models\Paginaweb\SeccionDetalleModel;
use CodeIgniter\Files\File;

class PaginaSeccionesController extends BaseController
{
    private SeccionDetalleModel $seccionDetalleModel;
    protected $helpers = ['form'];
    private $errorNingunArchivo = 4;   // Ningún archivo fue subido

    public function __construct(){
        $this->seccionDetalleModel = new SeccionDetalleModel();
    }

    public function index($idPagina)
    {
        $session = session();
        if(isset($_SESSION['sesion_activa'])){
            $paginasModel = new PaginasModel();
            $data['pagina'] = $paginasModel->getPage($idPagina);
            $data['loadPaginaSeccionesJS'] = true;

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
                header("Location:".base_url()."paginas/");
                exit();
            }

            $data['errors'] = [];
            
            echo view('template/header');
            echo view('template/sidebar');
            echo view('dashboard/paginaweb/pagina_secciones', $data);
            echo view('template/footer');
        }else {
            header("Location:".base_url());
            exit();
        }
    }

    public function update()
    {
        $data = array();
        foreach ($this->request->getPost('elemento') as $key => $element){
            $data[] = array(
                'id_detalle' => $element['id_elemento'],
                'valor' => $element['valor_elemento'],
                'estado' => array_key_exists('estado_elemento', $element) ? 1 : 0
            );
        }
        
        $this->seccionDetalleModel->updateBatch($data, 'id_detalle');
        //$this->upload();
        echo json_encode("success");
    }

    public function upload()
    {
        $file = $this->request->getFile('userfile');

        if (!$file->isValid()) {
            if($file->getError() === $this->errorNingunArchivo) 
            {
                echo json_encode("success-withoutImage");
                return;
            }
        }

        $validationRule = [
            'userfile' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[userfile]',
                    'is_image[userfile]',
                    'mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[userfile,100]',
                    'max_dims[userfile,1024,768]',
                ],
            ],
        ];

        if (! $this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];

            echo json_encode(var_dump($data));
            return;
        }

        $img = $this->request->getFile('userfile');

        if (! $img->hasMoved()) {
            $filepath = WRITEPATH . 'uploads/' . $img->store();

            $data = ['uploaded_fileinfo' => new File($filepath)];

            echo json_encode("success-withImage");
            return;
        }

        $data = ['errors' => 'Este archivo ya ha sido movido.'];
        
        echo json_encode(var_dump($data));
    }

}
