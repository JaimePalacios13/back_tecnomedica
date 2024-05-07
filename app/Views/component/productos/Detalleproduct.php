<link rel="stylesheet" href="<?=base_url()?>/assets/css/detalleProduct.css">
<?php $i=1; foreach($producto as $detalle){ ?>
    <input type="hidden" name="id" value="<?=$detalle["id_producto"]?>">
    <input type="hidden" name="producto" value="<?=$detalle["nombre"]?>">
    <input type="hidden" name="marca" value="<?=$detalle["marca"]?>">
    <div class="product-card">
      <div class="image-container">
        <div class="cover-image product-image">
          <img src="<?=$detalle['fotografia']?>" alt="">
        </div>

      </div>
      <div class="product-info">
        <a href="#" class="free-shipping"><?=$detalle["nombreCategoria"]?></a>
        <h3 class="product-name"><?=$detalle["nombre"]?></h3>
        <p class="offer-info"><?=$detalle["descripcion"]?></p>
        <a href="#" class="add-to-cart" data-toggle="modal" data-target="#viewData">
          <ion-icon name="add-outline"></ion-icon> Mostrar datos de contacto
        </a>
      </div>
    </div>
    <!-- modal -->
    <div class="modal fade" id="viewData" tabindex="-1" aria-labelledby="viewDataLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel"><b>Ponte en contacto con uno de nuestros asesores</b></h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row mb-2">
              <div class="col-12 d-flex justify-content-center align-items-center">
                <i class="fab fa-whatsapp" style="font-size:1.5rem;"></i> 
                <a href="https://api.whatsapp.com/send?phone=60327515&text=Hola%2C%20me%20interesa%20el%20producto%20*<?=$detalle["nombre"]?>*" target="_blank" rel="noopener noreferrer"><b>&nbsp;&nbsp;Contactenos por Whatsapp</b></a>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-12 d-flex justify-content-center align-items-center">
                <i class="fas fa-phone" style="font-size:1.5rem;"></i>&nbsp;&nbsp;<p><b>Nuestra linea fija: 2130-1965</b></p>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-12 d-flex justify-content-center align-items-center">
              <i class="fas fa-envelope" style="font-size:1.5rem;"></i>&nbsp;&nbsp;<p><b>Email: ventas@tecnomedica-sv.com</b></p>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
<?php $i++; } ?>
