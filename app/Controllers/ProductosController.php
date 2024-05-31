<?php

namespace App\Controllers;

use App\Models\PaginaSeccionesModel;
use App\Models\CategoriasModel;
use App\Models\ContactoModel;

class ProductosController extends BaseController
{
    private int $idPagina = 1;

    public function index()
    {
        $categoriasModel = new CategoriasModel();
        $ContactoModel = new ContactoModel();

        $data['categorias'] = $categoriasModel->getCategoriasActivas();
        $data['contactos'] = $ContactoModel->getDataContacto();

        echo view('head_foot/header');
        echo view('component/productos',$data);
        echo view('head_foot/footer', $data);
    }
}