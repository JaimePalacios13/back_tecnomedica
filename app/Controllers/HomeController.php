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

class HomeController extends BaseController
{
    private int $idPagina = 2;
    private int $idPaginaFooter = 3;
    private int $idPaginaHeader = 4;

    public function index()
    {

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
        $data['destacados'] = $DetalleProductoModel->getDestacadosActivos();
        $data['secciones'] = $paginaSeccionesModel->getDataPageSectionsByPage($this->idPagina);
        $data['seccionesFooter'] = $paginaSeccionesModel->getDataPageSectionsByPage($this->idPaginaFooter);
        $seccionesHeader = $paginaSeccionesModel->getDataPageSectionsByPage($this->idPaginaHeader);
        $data['tituloSeccionCategorias'] = 'Categorías Destacadas';

        $elementos = array();
        foreach($data['secciones'] as $seccion){
            $seccionDetalle = $seccionDetalleModel->getDataSectionDetailBySection($seccion['id_seccion']);
            foreach($seccionDetalle as $detalle){
                $elementos[] = $detalle;
            }
        }
        $data['elementos'] = $elementos;

        // Obtiene la seccion de siguenos (RRSS)
        $elementos = array();
        foreach($data['seccionesFooter'] as $seccion){
            $seccionDetalle = $seccionDetalleModel->getDataSectionDetailBySection($seccion['id_seccion']);
            foreach($seccionDetalle as $detalle){
                $elementos[] = $detalle;
            }
        }
        $data['elementosFooter'] = $elementos;

        // Obtiene las secciones de header
        $elementos = array();
        foreach($seccionesHeader as $seccion){
            $seccionesDetalle[] = $seccionDetalleModel->getDataSectionDetailBySection($seccion['id_seccion']);
        }
        $data['seccionesHeader'] = $seccionesDetalle;
        
        return view('head_foot/header', $data)
            .view('component/home')
            .view('component/productos')
            .view('component/home/productos_destacados')
            .view('head_foot/footer');
    }

    public function contactenenos($enviado){
        
        $ContactoModel = new ContactoModel();
        $CategoriasModel = new CategoriasModel();
        $MarcasModel = new MarcasModel();
        $paginaSeccionesModel = new PaginaSeccionesModel();
        $seccionDetalleModel = new SeccionDetalleModel();
        
        $data['contactos'] = $ContactoModel->getDataContacto();
        $data['categorias'] = $CategoriasModel->getDataCategorias();
        $data['marcas'] = $MarcasModel->getDataMarcas();
        $data['seccionesFooter'] = $paginaSeccionesModel->getDataPageSectionsByPage($this->idPaginaFooter);
        $seccionesHeader = $paginaSeccionesModel->getDataPageSectionsByPage($this->idPaginaHeader);

        // Obtiene la seccion de siguenos (RRSS)
        $elementos = array();
        foreach($data['seccionesFooter'] as $seccion){
            $seccionDetalle = $seccionDetalleModel->getDataSectionDetailBySection($seccion['id_seccion']);
            foreach($seccionDetalle as $detalle){
                $elementos[] = $detalle;
            }
        }
        $data['elementosFooter'] = $elementos;

        // Obtiene las secciones de header
        $elementos = array();
        foreach($seccionesHeader as $seccion){
            $seccionesDetalle[] = $seccionDetalleModel->getDataSectionDetailBySection($seccion['id_seccion']);
        }
        $data['seccionesHeader'] = $seccionesDetalle;
        
        if(filter_var($enviado, FILTER_VALIDATE_BOOLEAN)===true){
            $data['enviado'] = $enviado;
        }

        return view('head_foot/header', $data)
            .view('component/contactenos')
            .view('head_foot/footer');
        
    }

    public function categoriaShow($idcate){
        
        $VitrinaProductModel = new VitrinaProductModel();
        $ContactoModel = new ContactoModel();
        $CategoriasModel = new CategoriasModel();
        $MarcasModel = new MarcasModel();
        $paginaSeccionesModel = new PaginaSeccionesModel();
        $seccionDetalleModel = new SeccionDetalleModel();
        
        $data['categoriaSelect'] = $CategoriasModel->getDataCategoriaSelect($idcate);
        $data['productos'] = $VitrinaProductModel->getDataProductosActivos($idcate);
        $data['contactos'] = $ContactoModel->getDataContacto();
        $data['categorias'] = $CategoriasModel->getDataCategorias();
        $data['marcas'] = $MarcasModel->getDataMarcas();
        $data['seccionesFooter'] = $paginaSeccionesModel->getDataPageSectionsByPage($this->idPaginaFooter);
        $seccionesHeader = $paginaSeccionesModel->getDataPageSectionsByPage($this->idPaginaHeader);

        // Obtiene la seccion de siguenos (RRSS)
        $elementos = array();
        foreach($data['seccionesFooter'] as $seccion){
            $seccionDetalle = $seccionDetalleModel->getDataSectionDetailBySection($seccion['id_seccion']);
            foreach($seccionDetalle as $detalle){
                $elementos[] = $detalle;
            }
        }
        $data['elementosFooter'] = $elementos;

        // Obtiene las secciones de header
        $elementos = array();
        foreach($seccionesHeader as $seccion){
            $seccionesDetalle[] = $seccionDetalleModel->getDataSectionDetailBySection($seccion['id_seccion']);
        }
        $data['seccionesHeader'] = $seccionesDetalle;
        
        return view('head_foot/header',$data)
            .view('component/productos/vitrinaProducto')
            .view('head_foot/footer');
    }

    public function detalleProduct($idproducto){

        $DetalleProductoModel = new DetalleProductoModel();
        $ContactoModel = new ContactoModel();
        $CategoriasModel = new CategoriasModel();
        $MarcasModel = new MarcasModel();
        $paginaSeccionesModel = new PaginaSeccionesModel();
        $seccionDetalleModel = new SeccionDetalleModel();
        
        $data['producto'] = $DetalleProductoModel->getDataActiveProductSelect($idproducto);
        $data['contactos'] = $ContactoModel->getDataContacto();
        $data['seccionesFooter'] = $paginaSeccionesModel->getDataPageSectionsByPage($this->idPaginaFooter);
        $seccionesHeader = $paginaSeccionesModel->getDataPageSectionsByPage($this->idPaginaHeader);
        
        if(empty($data['producto'])){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
        // Obtiene la seccion de siguenos (RRSS)
        $elementos = array();
        foreach($data['seccionesFooter'] as $seccion){
            $seccionDetalle = $seccionDetalleModel->getDataSectionDetailBySection($seccion['id_seccion']);
            foreach($seccionDetalle as $detalle){
                $elementos[] = $detalle;
            }
        }
        $data['elementosFooter'] = $elementos;

        // Obtiene las secciones de header
        $elementos = array();
        foreach($seccionesHeader as $seccion){
            $seccionesDetalle[] = $seccionDetalleModel->getDataSectionDetailBySection($seccion['id_seccion']);
        }
        $data['seccionesHeader'] = $seccionesDetalle;

        return view('head_foot/header',$data)
            .view('component/productos/Detalleproduct')
            .view('head_foot/footer');

    }
    public function SendMail(){

            $nombre = $this->request->getPost('nombre');
            $apellido = $this->request->getPost('apellido');
            $email = $this->request->getPost('email');
            $phone = $this->request->getPost('phone');
            $asunto = $this->request->getPost('asunto');
            $detalles = $this->request->getPost('comments');

            $data['nombre'] = $nombre;
            $data['apellido'] = $apellido;
            $data['email'] = $email;
            $data['phone'] = $phone;
            $data['asunto'] = $asunto;
            $data['detalles'] = $detalles;

            $message = view('correos/contactenos', $data);
            $email = service('email');
            $email->setFrom('contactenosnoreply@tecnomedica-sv.com', 'contactenosnoreply');
            $email->setTo('ventas@tecnomedica-sv.com');
            $email->setSubject('Página Web | Formulario de contacto');
            $email->setMessage($message);//your message here
            if (! $email->send(false)) {
                // echo $email->printDebugger();
            } else{
                header('Location:'.base_url('/contactenos/enviado'));
                exit();
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