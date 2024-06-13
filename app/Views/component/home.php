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
	