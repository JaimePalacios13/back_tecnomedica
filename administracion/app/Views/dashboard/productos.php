<style>
    #descripcion {
        font-family: sans-serif, monospace;
        font-size: 15px;
        border-radius: 10px;
        padding: 20px;
        border: 1px solid #c1c1c1;
    }
</style>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-12">
                <h2><b>Productos</b></h2>
            </div>
        </div>

    </div>
    <div class="card-body">

        <div class="row mt-3">
            <div class="col-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Lista de productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Nuevo producto</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row mt-4">
                            <div class="col">
                                <table id="tbl_marcas" class="display">
                                    <thead>
                                        <tr>
                                            <th style="width: 1%">No</th>
                                            <th style="width: 15%">Nombre</th>
                                            <th>Foto</th>
                                            <th>Categoria</th>
                                            <!-- <th>Marca</th> -->
                                            <th>Descripción</th>
                                            <th>Catálogo</th>
                                            <th>Estado</th>
                                            <th style="width: 25%">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;

                                        foreach ($productos as $value) {  ?>
                                            <tr>
                                                <th><?=$i?></th>
                                                <th><?= $value["producto"] ?></th>
                                                <th><img class="img-fluid" src="<?=$value["foto_producto"] ?>" alt=""></th>
                                                <th><?= $value["categoria"] ?></th>
                                                <th><?= $value["producto_desc"] ?></th>
                                                <th>
                                                    <?= isset($value["catalogo"]) ? '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' : '' ?>
                                                </th>
                                                <th>
                                                <?= $value["estado"] ? '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' : '' ?>
                                                </th>
                                                <th>
                                                    <a href="../Productos/detalle-producto/<?=$value['id_producto']?>" class="btn btn-primary btn-xs" target=”_blank”><i class="fas fa-folder"></i> Ver </a>
                                                    <?php if($value["destacado"] == 0):?>
                                                        <a href="#" class="btn btn-primary btn-xs" onclick="destacar(1,<?= $value['id_producto'] ?>)"><i class="fas fa-highlighter"></i> Destacar </a>
                                                    <?php endif?>
                                                    <?php if($value["destacado"] == 1):?>
                                                        <a href="#" class="btn btn-secondary btn-xs" onclick="destacar(0,<?= $value['id_producto'] ?>)"><i class="far fa-highlighter"></i> No Destacar </a>
                                                    <?php endif?>
                                                    <a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit_product" 
                                                        onClick="fillForm('<?=$value['id_producto']?>')">
                                                        <i class="fas fa-pencil"></i> Editar </a>
                                                    <a href="#" class="btn btn-danger btn-xs" onclick="deleteProduct('<?= $value['id_producto'] ?>')" style="display:none"><i class="fa fa-trash-o"></i> Eliminar </a>
                                                </th>
                                            </tr>
                                        <?php $i++; }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row mt-4">
                            <div class="col-6">
                                <div class="grid">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="producto">Nombre del producto *</label>
                                            <input type="text" class="form-control input_txt" id="producto">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="categoria">Categoría *</label>
                                            <select name="" class="form-control" id="categoria">
                                                <option value="0"> Seleccione...</option>
                                                <?php foreach ($nombreCategorias as $categoria) { ?>
                                                    <option value="<?= $categoria["id_categoria"] ?>"><?= $categoria["nombre"] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="marca">Marca*</label>
                                            <select name="" class="form-control" id="marca">
                                                <option value="0"> Seleccione...</option>
                                                <?php foreach ($marcas as $marca) { ?>
                                                    <option value="<?= $marca["idmarca"] ?>"><?= $marca["marca"] ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12" style="display: none">
                                        <div class="form-group">
                                            <label for="image-productos">Seleccione una imagen</label>
                                            <input type="file" accept="image/png,image/jpeg" class="form-control-file" id="image-productos">
                                        </div>
                                    </div>
                                    <div class="col-12 container-image">
                                        <img src="" class="img-selection-upload" alt="">
                                        <input type="text" hidden value="" id="input_path_img">
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="fotografia">Seleccione una imagen*</label>
                                            <input type="file" class="form-control-file" name="fotografia" id="fotografia">
                                            <p>Instrucciones:</p>
                                            <ul>
                                                <li>Se permite la subida de imágenes</li>
                                                <li>Extensiones permitidas: jpg,jpeg,gif y png</li>
                                                <li>Peso máximo: 5 MB</li>
                                                <li>Dimensiones máximas: 600x600</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="catalogo">Seleccione un catálogo</label>
                                            <input type="file" class="form-control-file" id="catalogo">
                                            <p>Instrucciones:</p>
                                            <ul>
                                                <li>Se permite la subida de archivos</li>
                                                <li>Extensiones permitidas: pdf</li>
                                                <li>Peso máximo: 2 MB</li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="marca">Descripción*</label>
                                    <textarea class="form-control" name="" id="descripcion" cols="30" rows="10" placeholder="Descripción..."></textarea>
                                </div>
                                <div id="upload-demoProducto" style="display: none"></div>
                            </div>
                            <div class="container-img">
                                <img src="" class="img-selection" alt="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <p>* Campos requeridos</p>
                                <button type="button" class="btn btn-btn btn-block btn-warning btn-upload-image-producto" style="display: none">Recortar imagen</button>
                                <button type="button" class="btn btn-btn btn-block btn-primary btn-save-producto">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="edit_product" tabindex="-1" role="dialog" aria-labelledby="edit_productLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="new_userLabel">Editar producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nombre_product">Nombre</label>
                                <input type="text" class="form-control" id="nombre_product" value="">
                            </div>
                            <div class="form-group">
                                <label for="categoria_product">Categoría*</label>
                                <select name="" class="form-control" id="categoria_product">
                                    <option value="0"> Seleccione...</option>
                                    <?php foreach ($nombreCategorias as $categoria) { ?>
                                        <option value="<?= $categoria["id_categoria"] ?>"><?= $categoria["nombre"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="marca_product">Marca*</label>
                                <select name="" class="form-control" id="marca_product">
                                    <option value="0"> Seleccione...</option>
                                    <?php foreach ($marcas as $marca) { ?>
                                        <option value="<?= $marca["idmarca"] ?>"><?= $marca["marca"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="fotografia_product">Fotografia del producto</label>
                                <input type="file" name="fotografia_product" id="fotografia_product">
                                <p>Instrucciones:</p>
                                <ul>
                                    <li>Se permite la subida de imágenes</li>
                                    <li>Extensiones permitidas: jpg,jpeg,gif y png</li>
                                    <li>Peso máximo: 5 MB</li>
                                    <li>Dimensiones máximas: 600x600</li>
                                </ul>
                            </div>
                            <div class="form-group">
                                <label for="catalogo_product">Seleccione un catálogo</label>
                                <input type="file" class="form-control-file" id="catalogo_product">
                                <p>Instrucciones:</p>
                                <ul>
                                    <li>Se permite la subida de archivos</li>
                                    <li>Extensiones permitidas: pdf</li>
                                    <li>Peso máximo: 2 MB</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="descripcion_product">Descripción del producto</label>
                                <textarea class="form-control" id="descripcion_product" style="height: 500px;">
                                </textarea>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="estado_product">
                                <label class="form-check-label" for="estado_product">
                                    Estado
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="id_product" value="">
                <button type="button" class="btn btn-primary" id="editar-product">Guardar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>