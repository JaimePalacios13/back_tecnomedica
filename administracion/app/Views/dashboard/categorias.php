<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div id="liveAlertPlaceholder"></div>
                
                <h2><b>Categorias</b></h2>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true"> Categorias creadas </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false"> Crear categoria </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="sort-tab" data-toggle="tab" href="#sort" role="tab"
                            aria-controls="sort" aria-selected="false"> Ordenar categorías </a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row mt-4">
                            <div class="col">
                                <table id="tbl_categorias" class="display">
                                    <thead>
                                        <tr>
                                            <th>#No</th>
                                            <th>Categoria</th>
                                            <th>Estado</th>
                                            <th>Descripción</th>
                                            <th>#Editar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                            foreach ($categorias as $value) {
                                                $estado = '';
                                                if ($value['estado'] == 1) {
                                                    $estado = 'ACTIVO';
                                                }else {
                                                    $estado = 'INACTIVO';
                                                }
                                                echo '
                                                <tr>
                                                    <td>'.$i.'</td>
                                                    <td>'.$value['nombre'].'</td>
                                                    <td>'.$estado.'</td>
                                                    <td>'.$value['descripcion'].'</td>
                                                    <td>
                                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit_category"
                                                            onClick="fillForm(\''.$value['nombre'].'\', 
                                                                                \''.$value['descripcion'].'\',
                                                                                '.$value['estado'].',  
                                                                                '.$value['id_categoria'].'
                                                            )"
                                                        >
                                                            <i class="fas fa-pencil"></i>
                                                            Editar
                                                        </button>
                                                    </td>
                                                </tr>
                                                ';
                                                $i++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row mt-4">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <h2>Crear nueva categoría</h2>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="categoria_input">Nombre de la categoria</label>
                                                            <input type="text" class="input_txt form-control" id="categoria_input">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="descripcion_input">Descripción de la categoria (300 chars max)</label>
                                                            <textarea class="form-control" id="descripcion_input" maxlength="300", row="3">
                                                            </textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="fotografia">Fotografia de la categoria</label>
                                                            <input type="file" name="fotografia" id="fotografia">
                                                            <p>Instrucciones:</p>
                                                            <ul>
                                                                <li>Se permite la subida de imágenes</li>
                                                                <li>Extensiones permitidas: jpg,jpeg,gif y png</li>
                                                                <li>Peso máximo: 150 KB</li>
                                                                <li>Dimensiones máximas: 386x180</li>
                                                            </ul>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="estado_input">Estado de la categoria</label>
                                                            <input type="checkbox" id="estado_input">
                                                        </div>
                                                    </div>
                                                    <div class="col-2" style="margin-top:26px;">
                                                        <button type="button" id="nueva-categoria" class="btn btn-block btn-primary"> Agregar </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="sort" role="tabpanel" aria-labelledby="sort-tab">
                        <div class="row mt-4">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">

                                                        <p>Modica el orden en el que aparecen las categorías en la página web
                                                            (página productos)
                                                        </p>

                                                        <!-- Simple List -->
                                                        <ul id="simpleList" class="list-group">
                                                            <?php foreach ($ordenCategorias as $categoria) 
                                                                echo '<li class="list-group-item" data-id="'.$categoria['id_categoria'].'">'.$categoria['nombre']
                                                                    .'</li>';
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Fin sort tab -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="edit_category" tabindex="-1" role="dialog" aria-labelledby="edit_categoryLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="new_userLabel">Editar categoría</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nombre_category">Nombre</label>
                                <input type="text" class="form-control" id="nombre_category" value="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="descripcion_category">Descripción de la categoria (300 chars max)</label>
                                <textarea class="form-control" id="descripcion_category" maxlength="300", row="3">
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="fotografia_category">Fotografia de la categoria</label>
                                <input type="file" name="fotografia_category" id="fotografia_category">
                                <p>Instrucciones:</p>
                                <ul>
                                    <li>Se permite la subida de imágenes</li>
                                    <li>Extensiones permitidas: jpg,jpeg,gif y png</li>
                                    <li>Peso máximo: 150 KB</li>
                                    <li>Dimensiones máximas: 386x180</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="estado_category">
                                <label class="form-check-label" for="estado_category">
                                    Activo
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="id_category" value="">
                <button type="button" class="btn btn-primary" id="editar-category">Guardar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<script>
        // Rendered environment variables
        const APP_ENVIROMENT = '<?= $appEnviroment ?>';
</script>