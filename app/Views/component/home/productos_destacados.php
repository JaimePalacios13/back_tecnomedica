<?php foreach($datos as $mostrarBody):?>
	<div id="plan" class="section lb">
	    <div class="container">
	        <div class="section-title text-center">
	            <h3>Productos Destacados</h3>
	        </div>
			<div class="row" style="margin-top: -65px;">
				<div class="col">
					<div class="container custom-card-container">
					<div class="slider">

						<?php $i= 1; foreach($destacados as $viewDesct):?>
							<input type="radio" name="testimonial" id="t-<?=$i?>" <?=$i==ceil(count($destacados)/2)?'checked':''?>/>
						<?php $i++; endforeach?>

						<div class="testimonials mb-8">
						<?php $i= 1; foreach($destacados as $viewDesct):?>
						<label class="item" for="t-<?=$i?>">
							<div class="mycard container-1" style="background: url(<?=base_url(ADMINISTRACION_URL.$viewDesct['fotografia'])?>);
																background-repeat: no-repeat;
																background-size: 250px 300px;">
								<div>
									<p class="carddescription" style="color:#0086DD !important; background-color: rgba(255, 255, 255, 0.2);"><?=$viewDesct['nombre']?></p>
								</div>
								<div class="row">
									<div class="col">
										<a href="<?=base_url()?>/Productos/detalle-producto/<?=$viewDesct['id_producto']?>" target="_blank" style="background-color: rgba(255, 255, 255, 0.2);">VER PRODUCTO</a>
									</div>
								</div>
							</div>
						</label>
						<?php $i++; endforeach?>
					</div>
					<div class="dots">
						<?php $i= 1; foreach($destacados as $viewDesct):?>
							<label for="t-<?=$i?>"></label>
						<?php $i++; endforeach?>
					</div>
					</div>
				</div>
					</div>
			</div>
	    </div><!-- end container -->
	</div><!-- end section -->
<?php endforeach?>

<style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
 
        .custom-card-container {
            display: flex;
        }
 
        .container-1 {
            width: 250px;
            height: 300px;
            border: 0.25rem solid #3b344d;
            margin-left: 10%;
            margin-top: 5%;
            margin-right: 10%;
        }
    </style>