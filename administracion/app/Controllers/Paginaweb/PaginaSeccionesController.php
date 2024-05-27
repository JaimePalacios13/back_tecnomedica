<?php

namespace App\Controllers\Paginaweb;

use App\Controllers\BaseController;
use App\Models\Paginaweb\PaginasModel;
use App\Models\Paginaweb\PaginaSeccionesModel;
use App\Models\Paginaweb\SeccionDetalleModel;

class PaginaSeccionesController extends BaseController
{
    private SeccionDetalleModel $seccionDetalleModel;
    protected $helpers = ['form'];

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
        catch (Exception $e) {
            CustomExceptionHandler::handleException($e);
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
                 
            throw new \InvalidArgumentException();
            $this->seccionDetalleModel->updateBatch($data, 'id_detalle');
            $this->upload();
        }
        catch (\Exception $ex) {
            echo view('template/sidebar');
            echo view('exceptions/html/exception_general');
            var_dump($ex);
        }
    }

    public function upload()
    {

        $file = $this->request->getFile('userfile');
        if (! $file->isValid()) {
            if($file->getError() === 4) // Ningún archivo fue subido
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

            return view('upload_form', $data);
        }

        $img = $this->request->getFile('userfile');

        if (! $img->hasMoved()) {
            $filepath = WRITEPATH . 'uploads/' . $img->store();

            $data = ['uploaded_fileinfo' => new File($filepath)];

            echo json_encode("success-withImage");
            return;
        }

        $data = ['errors' => 'The file has already been moved.'];

        
        return view('upload_form', $data);
    }

}
