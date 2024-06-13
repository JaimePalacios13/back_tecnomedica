<?php

namespace App\Controllers;
use App\Models\HomeModel;
use App\Models\ContactoModel;
use App\Models\CarouselModel;
use App\Models\CategoriasModel;
use App\Models\MarcasModel;
use App\Models\DetalleProductoModel;
use App\Models\VitrinaProductModel;
use App\Models\PaginaSeccionesModel;
use App\Models\SeccionDetalleModel;
use \Config\Services;

class HomeController extends BaseController
{
    private int $idPagina = 2;

    public function index()
    {
        try {
            $DetalleProductoModel = new DetalleProductoModel();
            $HomeModel = new HomeModel();
            $ContactoModel = new ContactoModel();
            $CarouselModel = new CarouselModel();
            $CategoriasModel = new CategoriasModel();
            $MarcasModel = new MarcasModel();
            $paginaSeccionesModel = new PaginaSeccionesModel();
            $seccionDetalleModel = new SeccionDetalleModel();

            $data['datos'] = $HomeModel->getDataHome();
            $data['contactos'] = $ContactoModel->getDataContacto();
            $data['categorias'] = $CategoriasModel->getCategoriasDestacadas();
            $data['marcas'] = $MarcasModel->getDataMarcas();
            $data['destacados'] = $DetalleProductoModel->getDestacados();
            $data['secciones'] = $paginaSeccionesModel->getDataPageSectionsByPage($this->idPagina);
            $data['tituloSeccionCategorias'] = 'Categorías Destacadas';

            $elementos = array();
            foreach($data['secciones'] as $seccion){
                $seccionDetalle = $seccionDetalleModel->getDataSectionDetailBySection($seccion['id_seccion']);
                foreach($seccionDetalle as $detalle){
                    $elementos[] = $detalle;
                }
            }
            $data['elementos'] = $elementos;
            
            echo view('head_foot/header',$data);
            echo view('component/home',$data);
            echo view('component/productos',$data);
            echo view('head_foot/footer',$data);
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    public function contactenenos(){
        try {
            $ContactoModel = new ContactoModel();
            $CategoriasModel = new CategoriasModel();
            $MarcasModel = new MarcasModel();
            
            $data['contactos'] = $ContactoModel->getDataContacto();
            $data['categorias'] = $CategoriasModel->getDataCategorias();
            $data['marcas'] = $MarcasModel->getDataMarcas();
            
            echo view('head_foot/header',$data);
            echo view('component/contactenos',$data);
            echo view('head_foot/footer',$data);
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    public function categoriaShow($idcate){
        try {
            $VitrinaProductModel = new VitrinaProductModel();
            $ContactoModel = new ContactoModel();
            $CategoriasModel = new CategoriasModel();
            $MarcasModel = new MarcasModel();
            
            $data['categoriaSelect'] = $CategoriasModel->getDataCategoriaSelect($idcate);
            $data['productos'] = $VitrinaProductModel->getDataProductosActivos($idcate);
            $data['contactos'] = $ContactoModel->getDataContacto();
            $data['categorias'] = $CategoriasModel->getDataCategorias();
            $data['marcas'] = $MarcasModel->getDataMarcas();
            
            echo view('head_foot/header',$data);
            echo view('component/productos/vitrinaProducto',$data);
            echo view('head_foot/footer',$data);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function detalleProduct($idproducto){

        $DetalleProductoModel = new DetalleProductoModel();
        $ContactoModel = new ContactoModel();
        $CategoriasModel = new CategoriasModel();
        $MarcasModel = new MarcasModel();
        
        $data['producto'] = $DetalleProductoModel->getDataActiveProductSelect($idproducto);
        $data['contactos'] = $ContactoModel->getDataContacto();
        
        if(empty($data['producto'])){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        

        echo view('head_foot/header',$data);
        echo view('component/productos/Detalleproduct',$data);
        echo view('head_foot/footer',$data);

    }
    public function SendMail(){
        try {
            $message = view('correos/contactenos');
            $email = Services::email();
            $email->setFrom('contactenosnoreply@tecnomedica-sv.com', 'contactenosnoreply@tecnomedica-sv.com');
            $email->setTo('jaimepalacios998@gmail.com');
            $email->setSubject('Panel | Facturación Electrónica');
            $email->setMessage($message);//your message here
            $email->send();
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    public function productosDestacados(){
        try {
            $DetalleProductoModel = new DetalleProductoModel();
            $dataReturn = $DetalleProductoModel->getDestacados();

            echo json_encode($dataReturn);
            exit();

        } catch (\Throwable $th) {
            
        }
    }
}