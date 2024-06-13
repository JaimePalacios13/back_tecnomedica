<div class="container my-5">
    <div class="section-title text-center">
        <h3><?=$tituloSeccionCategorias?></h3>
    </div>
    <div class="row row-cols-1 row-cols-md-3">
        <?php foreach ($categorias as $categoria) {?>
            <div class="col">
                <div class="card h-100 p-3">
                    <div class="image-container">
                        <a href="categoria/<?=$categoria['id_categoria']?>">
                            <img src="<?=base_url()?>/administracion/<?=$categoria['fotografia']?>" class="card-img-top" alt="..." style="width: 100%; display: block;">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><?=$categoria['nombre']?></h5>
                            <p class="card-text"><?=$categoria['descripcion']?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div> <!-- Fin container -->