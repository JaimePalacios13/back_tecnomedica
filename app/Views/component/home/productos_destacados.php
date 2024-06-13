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