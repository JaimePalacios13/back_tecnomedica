<!-- END LOADER -->

<style>
	@media only screen and (min-width : 601px) {
		<?php foreach ($elementos as $elemento) : ?>
			<?php if($elemento["estado"]==="1") { ?>
				.banner-<?=$elemento["id_detalle"]?>-img{
					background-image:url(<?=base_url(ADMINISTRACION_URL.$elemento["valor"])?>);
					background-repeat: no-repeat;
					background-size: 100% 100% !important;
				}
			<?php } ?>
		<?php endforeach; ?>
	}
</style>
	
<div id="carouselExampleControls" class="carousel slide bs-slider box-slider" data-ride="carousel" data-pause="hover"
	data-interval="false">

	<!-- Indicators -->
	<ol class="carousel-indicators">
		<?php $i=0; foreach( $elementos as $elemento) : ?>
			<?php if($elemento["estado"]==="1") { ?>
				<li data-target="#carouselExampleControls" data-slide-to="<?=$i?>" <?=$i===0?'class="active"':''?>></li>
			<?php } else{continue;} ?>
		<?php $i++; endforeach ?>
	</ol>

	<div class="carousel-inner" role="listbox">
		<?php $i=0; foreach( $elementos as $elemento) : ?>
			<?php if($elemento["estado"]==="1") { ?>
				<div class="carousel-item <?=$i===0?'active':''?>">
					<div id="home" class="first-section banner-<?=$elemento["id_detalle"]?>-img">
					</div><!-- end section -->
				</div>
			<?php } else{continue;} ?>
		<?php $i++; endforeach ?>

		<!-- Left Control -->
		<a class="new-effect carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
			<span class="fa fa-angle-left" style="color:black;" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<!-- Right Control -->
		<a class="new-effect carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
			<span class="fa fa-angle-right" style="color:black;" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>

<?php foreach($datos as $mostrarBody):?>
	<div id="plan" class="section lb">
	    <div class="container contenedorDest">
	        <div class="section-title text-center">
	            <h3>Productos Destacados</h3>
	        </div>
			<div class="row" style="margin-top: -65px;">
				<div class="col">
					<div class="container">
					<div class="slider">
						<input type="radio" name="testimonial" id="t-1" />
						<input type="radio" name="testimonial" id="t-2" />
						<input type="radio" name="testimonial" id="t-3" checked/>
						<input type="radio" name="testimonial" id="t-4" />
						<input type="radio" name="testimonial" id="t-5" />
						<div class="testimonials mb-8">
						<?php $i= 1; foreach($destacados as $viewDesct):?>
						<label class="item" for="t-<?=$i?>">
						<div class="mycard">
							<p class="cardtitle"  style="color:#00C23F !important;">Destacado</p>
							<div>
							<img src="<?=$viewDesct['fotografia']?>" alt="nivel<?=$i?>" class="cardimg" />
							</div>
							<div>
							<p class="carddescription" style="color:#0086DD !important;"><?=$viewDesct['nombre']?></p>
							</div>
							<div class="row">
								<div class="col">
									<a href="<?=base_url()?>/Productos/detalle-producto/<?=$viewDesct['id_producto']?>" target="_blank">VER PRODUCTO</a>
								</div>
							</div>
						</div>
						</label>
						<?php $i++; endforeach?>
					</div>
					<div class="dots">
						<label for="t-1"></label>
						<label for="t-2"></label>
						<label for="t-3"></label>
						<label for="t-4"></label>
						<label for="t-5"></label>
					</div>
					</div>
				</div>
					</div>
			</div>
	    </div><!-- end container -->
	</div><!-- end section -->
<?php endforeach?>
	