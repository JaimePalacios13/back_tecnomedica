<link rel="stylesheet" href="<?=base_url()?>/assets/css/detalleProduct.css">

<div class="container">
  <div class="row product-card">
    <div class="col">
        <div class="image-container">
          <div class="cover-image product-image">
            <img src="<?=base_url(ADMINISTRACION_URL.$producto[0]['fotografia'])?>" alt="">
          </div>
        </div>
    </div>
    <div class="col">
      <a href="<?=base_url('categoria/'.$producto[0]["id_categoria"])?>" class="button-category"><?=$producto[0]["nombreCategoria"]?></a>
      <h3 class="product-name"><?=$producto[0]["nombre"]?></h3>
      <p class="offer-info"><?=$producto[0]["descripcion"]?></p>
      <?php if(isset($producto[0]['catalogo'])){
        echo '
        <a class="btn btn-link" href="'.base_url(ADMINISTRACION_URL.$producto[0]['catalogo']).'">
          <i class="fas fa-book"></i>
          Descargar Catálogo
        </a>';
      } ?>
      <a href="#" class="show-info-contact" data-toggle="modal" data-target="#viewData">
        <ion-icon name="add-outline"></ion-icon> Mostrar datos de contacto
      </a>
    </div>
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
            <a href="https://api.whatsapp.com/send?phone=60327515&text=Hola%2C%20me%20interesa%20el%20producto%20*<?=$producto[0]["nombre"]?>*" target="_blank" rel="noopener noreferrer"><b>&nbsp;&nbsp;Contactenos por Whatsapp</b></a>
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