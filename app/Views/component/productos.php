<div class="container-fluid my-5">
    <div class="row flex-xl-nowrap">
        <div class="col-12 col-md-3 col-xl-2 bd-sidebar">
        </div>
        <main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content" role="main">
            <div class="section-title text-center">
                <h3><?=$tituloSeccionCategorias?></h3>
            </div>
            <div class="row row-cols-2 row-cols-xl-3" style="row-gap: 35px">
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
        </main>
        <div class="col-12 col-md-3 col-xl-2 bd-sidebar">
        </div>
    </div> <!-- Fin row -->
</div> <!-- Fin container -->