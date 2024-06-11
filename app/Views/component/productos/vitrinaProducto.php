<<link rel="stylesheet" href="<?=base_url()?>/assets/css/404.css">
<div id="overviews" class="section wb">
    <div class="container">
        <div class="section-title row text-center">
            <h3>Disponibilidad de productos</h3>
        </div>
            <section class="page_404" style="display:<?=count($productos) == 0?'block':'none'?>;">
                <div class="container">
                    <div class="row d-flex justify-content-center align-items-center">	
                    <div class="col-sm-12" style="display: contents;">
                    <div class="col-sm-10 col-sm-offset-1  text-center">
                    <div class="four_zero_four_bg">
                        <h1 class="text-center ">0</h1>
                    </div>
                    
                    <div class="contant_box_404">
                    <h3 class="h2">
                        Sin productos
                    </h3>
                    
                    <p>Por el momento no hay productos en la categoría seleccionada</p>
                </div>
                    </div>
                    </div>
                    </div>
                </div>
            </section>
        <div class="row h-100 album" style="display:flex;">
            <?php foreach ($productos as $product){ ?>
          <!-- ----------------------------------------------- -->
            <div class="col-sm-12 col-md-4 col-xl-4 col-lg-4 mb-3" style="display:<?=count($productos) > 0?'block':'none'?>;">
                <div class="card h-100">
                    <div class="d-flex justify-content-between position-absolute w-100">
                    <div class="label-new">
                        <span class="text-white bg-success small d-flex align-items-center px-2 py-1">
                        <i class="fa fa-tag" aria-hidden="true"></i>
                            <span class="ml-1"><?=$categoriaSelect[0]["nombre"]?></span>
                        </span>
                    </div>
                    <div class="label-sale" style="display:<?=$product["destacado"] == 1? 'flex' : 'none'?>;">
                        <span class="text-white bg-primary small d-flex align-items-center px-2 py-1">
                        <i class="fa fa-star" aria-hidden="true"></i>
                            <span class="ml-1"><?=$product["destacado"] == 1? 'Producto Destacado' : ''?></span>
                        </span>
                    </div>
                    </div>
                    <a href="#">
                    <img src="<?=base_url(ADMINISTRACION_URL.$product["fotografia"])?>" class="card-img-top" alt="Product">
                    </a>
                    <div class="card-body px-2 pb-2 pt-1">
                    <div class="d-flex justify-content-between">
                        <div style="min-height: 85px;max-height: 85px;">
                        <p class="h4 text-primary"><?=$product["nombre"];?></p>
                        </div>
                    </div>
                    <!-- <p class="mb-1">
                        <small>
                        <a href="#" class="text-secondary">Brands</a>
                        </small>
                    </p> -->
                    <div class="d-flex justify-content-between">
                        <div class="col px-0">
                            <a href="<?=base_url()?>/Productos/detalle-producto/<?=$product['id_producto']?>" class="btn btn-outline-primary btn-block">
                                Ver Detalles
                                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <?php }?> 
        </div>
        <div class="row d-flex justify-content-center align-items-center">
            <a href="../productos" class="link_404">Regresar</a>
        </div>
    </div>
</div>
