<div class="container my-5">
    <div class="section-title text-center">
        <h3>Categorías</h3>
    </div>
    <div class="row row-cols-1 row-cols-md-3">
        <?php foreach ($categorias as $categoria) {?>
            <div class="col">
                <div class="card h-100 p-3">
                    <img src="administracion/<?=$categoria['fotografia']?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?=$categoria['nombre']?></h5>
                        <p class="card-text"><?=$categoria['descripcion']?></p>
                    </div>
                    <div class="card-footer">
                        <a href="categoria/<?=$categoria['id_categoria']?>" class="btn btn-primary">Ver productos</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div> <!-- Fin container -->