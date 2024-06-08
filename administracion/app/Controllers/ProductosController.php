<?php

namespace App\Controllers;
use App\Models\ProductosModel;
use App\Models\CategoriasModel;
use App\Models\MarcasModel;

class ProductosController extends BaseController
{

    public $ProductosModel;
    public $MarcasModel;
    public $CategoriasModel;
    private $loadProductosJS = true;

    public function __construct()
    {
        $this->ProductosModel = new ProductosModel();
        $this->MarcasModel = new MarcasModel();
        $this->CategoriasModel = new CategoriasModel();    
        
    }

    public function index()
    {
        try {
            $session = session();
            if(isset($_SESSION['sesion_activa'])){
                $data['productos'] = $this->ProductosModel
                ->select("*, producto.descripcion as producto_desc, categoria.nombre as categoria, producto.nombre as producto, producto.fotografia as foto_producto")
                ->join("marca","marca.idmarca = producto.id_marca")
                ->join("categoria","categoria.id_categoria = producto.id_categoria")
                ->findAll();

                $data['marcas'] = $this->MarcasModel->findAll();
                $data['categorias'] = $this->CategoriasModel->findAll();
                $data['nombreCategorias'] = $this->CategoriasModel->getNombreCategoriasActivas();
                $data['loadProductosJS'] = $this->loadProductosJS;

                echo view('template/header');
                echo view('template/sidebar');
                echo view('dashboard/productos',$data);
                echo view('template/footer');
            }else {
                header("Location:".base_url());
                exit();
            }
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }





    public function croppie(){
        $image = $_POST['image'];
        
        $img_array1 = explode(";",$image);
        $img_array2 = explode(",",$img_array1[1]);

        $image = base64_decode($img_array2[1]);

        $image_name = time().'.png';

        $path =  $_SERVER['DOCUMENT_ROOT'].'/administracion/assets/upload/productos/'.$image_name;

        file_put_contents($path, $image);
        $img = '/assets/upload/productos/'.$image_name;
        echo json_encode($img);
    }



    public function insert(){
        $urlCatalogo = ''; 

        // Check if the file is uploaded
        if (isset($_FILES['catalogo'])) {
            $catalogo = $this->request->getFile('catalogo');
            if($catalogo->isValid()){
                $validationRule = [
                    'catalogo' => [
                        'label' => 'catalogo',
                        'rules' => [
                            'uploaded[catalogo]',
                            'ext_in[catalogo,pdf]',
                            'max_size[catalogo,2000]',
                            ],
                        ],
                ];

                if (! $this->validate($validationRule)) {
                    $data = ['errors' => $this->validator->getErrors()];
        
                    echo json_encode(var_dump($data));
                    return;
                }

                $urlCatalogo = $this->upload_catalogo($catalogo);

            } else {
                echo json_encode($catalogo->getErrorString());
                return;
            }
        } 

        $data= [
            'nombre' => $this->request->getPost('nombre'),
            'id_categoria' => $this->request->getPost('id_categoria'),
            'id_marca' => $this->request->getPost('id_marca'),
            'descripcion' => $this->request->getPost('descripcion'),
            'fotografia' => $this->request->getPost('image'),
            'catalogo' => $urlCatalogo
        ];

/*             echo json_encode($data); */

        if ($this->ProductosModel->insert($data)) {
            echo json_encode('success');
        }else{
            echo json_encode('error');
        }
    }

    public function deleteProduct(){
        try {
            $id = $this->request->getPost('idproducto');
            if ($this->ProductosModel->where('id_producto', $id)->delete()) {
                echo json_encode('success');
            }else {
                echo json_encode('error');
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function destacarProducto(){
        try {
            $id = $this->request->getPost('idproducto');
            $destacado = $this->request->getPost('destacado');

            $cantDestacados = $this->ProductosModel->countDestacados();
            if (count($cantDestacados) < 5) {
                if ($this->ProductosModel->updateDestacado($id,$destacado)) {
                    echo json_encode('success');
                }else {
                    echo json_encode('error');
                }
            }else{
                echo json_encode('mx');
            }
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    public function upload_catalogo($catalogo)
    {
        $cat = $catalogo;
        if (!$cat->hasMoved()) {
            // Move the file to the desired directory
            $newName = $cat->getRandomName();
            $uploadDir = 'assets/upload/productos/catalogos/';

            // Ensure the upload directory exists
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $cat->move($uploadDir, $newName);

            // Retorna la nueva url de la imagen para ser guardada en la base de datos
            return $uploadDir.$newName;

        }else{
            $data = ['errors' => 'Este archivo ya ha sido movido.'];
            echo json_encode(var_dump($data));
        }
    }
}
