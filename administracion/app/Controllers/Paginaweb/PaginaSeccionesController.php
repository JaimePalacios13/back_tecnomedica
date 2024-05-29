<?php

namespace App\Controllers\Paginaweb;

use App\Controllers\BaseController;
use App\Models\Paginaweb\PaginasModel;
use App\Models\Paginaweb\PaginaSeccionesModel;
use App\Models\Paginaweb\SeccionDetalleModel;
use CodeIgniter\Files\File;
use App\Exceptions\CustomExceptionHandler;

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
        // Get the files
        $files = $this->request->getFiles();

         // Check if files are uploaded
         if ($files) {
            foreach ($files['images'] as $key => $image){
                if($image->isValid()){
                    $validationRule = [
                        'images' => [
                            'label' => 'images['.$key.']',
                            'rules' => [
                                'uploaded[images]',
                                'is_image[images]',
                                'mime_in[images,image/jpg,image/jpeg,image/gif,image/png]',
                                    'max_size[images,150]',
                                    'max_dims[images,455,243]',
                                ],
                            ],
                    ];

                    if (! $this->validate($validationRule)) {
                        $data = ['errors' => $this->validator->getErrors()];
            
                        echo json_encode(var_dump($data));
                        return;
                    }

                } else {
                    echo json_encode($image->getErrorString());
                    return;
                }
            }
        } 

        // Ingresa los datos del formulario
        $data = array();
        foreach ($this->request->getPost('elemento') as $key => $element){

            if ( $element['tipo_elemento'] == "file" ){
                $data[] = array(
                    'id_detalle' => $element['id_elemento'],
                    'estado' => array_key_exists('estado_elemento', $element) ? 1 : 0
                );
            } else{
                $data[] = array(
                    'id_detalle' => $element['id_elemento'],
                    'valor' => $element['valor_elemento'],
                    'estado' => array_key_exists('estado_elemento', $element) ? 1 : 0
                );
            }
        }
        
        
        $this->seccionDetalleModel->updateBatch($data, 'id_detalle');
        if($files)
        {
            foreach ($files['images'] as $key => $image){
                $this->upload_image($key, $image);
            }
            
        }
        echo json_encode("success");
    }

    public function upload_image($id_elemento, $image)
    {
        try{
            $img = $image;
            if (!$img->hasMoved()) {
                // Move the file to the desired directory
                $newName = $img->getRandomName();
                $img->move('assets/upload/historia/', $newName);

                // Copia la nueva url de la imagen a la base de datos
                $data = [
                    'valor' => 'assets/upload/historia/'.$newName,
                ];
                $this->seccionDetalleModel->update($id_elemento, $data);

            }else{
                $data = ['errors' => 'Este archivo ya ha sido movido.'];
                echo json_encode(var_dump($data));
            }
        } catch(\Exception $e){
            echo json_encode('Se presentó un error a la hora de subir la imagen. Revisar los logs para mayor detalle');
            CustomExceptionHandler::handleExceptionNoView($e);
        } 
    }
}
