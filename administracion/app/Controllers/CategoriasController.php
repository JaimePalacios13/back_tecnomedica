<?php

namespace App\Controllers;
use App\Models\CategoriasModel;
use App\Exceptions\CustomExceptionHandler;

class CategoriasController extends BaseController
{
    protected $helpers = ['form'];
    
    public function index()
    {
        try {
            $session = session();
            if(isset($_SESSION['sesion_activa'])){
                $CategoriasModel = new CategoriasModel();
                // Load environment variables
                $appUrl = getenv('CI_ENVIRONMENT');

                $data['categorias'] = $CategoriasModel->getDataCategorias();
                $data['appEnviroment'] = $appUrl;

                echo view('template/header');
                echo view('template/sidebar');
                echo view('dashboard/categorias',$data);
                echo view('template/footer');
            }else {
                header("Location:".base_url());
                exit();
            }
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    public function new(){
        try {
            $fotografia = '';

            // Check if the file is uploaded
            if (isset($_FILES['fotografia'])) {
                $image = $this->request->getFile('fotografia');
                if($image->isValid()){
                    $validationRule = [
                        'fotografia' => [
                            'label' => 'fotografia',
                            'rules' => [
                                'uploaded[fotografia]',
                                'is_image[fotografia]',
                                'mime_in[fotografia,image/jpg,image/jpeg,image/gif,image/png]',
                                    'max_size[fotografia,150]',
                                    'max_dims[fotografia,386,180]',
                                ],
                            ],
                    ];

                    if (! $this->validate($validationRule)) {
                        $data = ['errors' => $this->validator->getErrors()];
            
                        echo json_encode(var_dump($data));
                        return;
                    }

                    $fotografia = $this->upload_image($image);

                } else {
                    echo json_encode($image->getErrorString());
                    return;
                }
            } 

            // Ingresa los datos del formulario
            $CategoriasModel = new CategoriasModel();
            $categoria = $_POST['categoria'];
            $descripcion = $_POST['descripcion'];
            $estado = $_POST['estado'];
            

            $data = [
                'nombre' => $categoria,
                'descripcion' => $descripcion,
                'estado' => $estado,
                'fotografia' => $fotografia
            ];

            if ($CategoriasModel->insert($data)) {
                echo json_encode("success");
            }else {
                echo json_encode('error');
            }
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    public function subir_imgHistoria(){
        try {
            if (($_FILES["file"]["type"] == "image/pjpeg")
                || ($_FILES["file"]["type"] == "image/jpeg")
                || ($_FILES["file"]["type"] == "image/png")
                || ($_FILES["file"]["type"] == "image/gif")) {
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/administracion/assets/upload/historia/".$_FILES['file']['name'])) {
                    //more code here...
                    echo "images/".$_FILES['file']['name'];
                } else {
                    echo 0;
                }
            } else {
                echo 0;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }   
    }

    public function upload_image($image)
    {
        try{
            $img = $image;
            if (!$img->hasMoved()) {
                // Move the file to the desired directory
                $newName = $img->getRandomName();
                $uploadDir = 'assets/upload/categorias/';

                // Ensure the upload directory exists
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                $img->move($uploadDir, $newName);

                // Retorna la nueva url de la imagen para ser guardada en la base de datos
                return $uploadDir.$newName;

            }else{
                $data = ['errors' => 'Este archivo ya ha sido movido.'];
                echo json_encode(var_dump($data));
            }
        } catch(\Exception $e){
            echo json_encode('Se presentó un error a la hora de subir la imagen. Revisar los logs para mayor detalle');
            CustomExceptionHandler::handleExceptionNoView($e);
        } 
    }

    public function edit(){
        try {
            $fotografia = '';
            
            // Check if the file is uploaded
            if (isset($_FILES['fotografia_category'])) {
                $image = $this->request->getFile('fotografia_category');
                if($image->isValid()){
                    $validationRule = [
                        'fotografia_category' => [
                            'label' => 'fotografia_category',
                            'rules' => [
                                'uploaded[fotografia_category]',
                                'is_image[fotografia_category]',
                                'mime_in[fotografia_category,image/jpg,image/jpeg,image/gif,image/png]',
                                    'max_size[fotografia_category,150]',
                                    'max_dims[fotografia_category,386,180]',
                                ],
                            ],
                    ];

                    if (! $this->validate($validationRule)) {
                        $data = ['errors' => $this->validator->getErrors()];
            
                        echo json_encode(var_dump($data));
                        return;
                    }

                    $fotografia = $this->upload_image($image);

                } else {
                    echo json_encode($image->getErrorString());
                    return;
                }
            }

            // Ingresa los datos del formulario
            $CategoriasModel = new CategoriasModel();
            $categoria = $_POST['categoria'];
            $descripcion = $_POST['descripcion'];
            $estado = $_POST['estado'];
            $id = $_POST['id'];
            
            $data = [
                'nombre' => $categoria,
                'descripcion' => $descripcion,
                'estado' => $estado,
                'fotografia' => $fotografia,
                'id_categoria' => $id
            ];

            if ($CategoriasModel->save($data)) {
                echo json_encode("success");
            }else {
                echo json_encode('error');
            }
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }
}
