<div id="overviews" class="section wb">
	<div class="container">
		<div class="section-title row text-center">
			<div class="col-md-8 offset-md-2">
				<p class="lead">
					<?= $elementos[0]['estado'] === "1" ? $elementos[0]['valor'] : '' ?>	<!-- Frase -->
				</p>
			</div>
		</div><!-- end title -->

		<div class="row align-items-center">
			<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
				<div class="message-box">
					<?php
						if($elementos[1]['estado'] === "1" ){ // Sobre nosotros
							echo '<h4>Sobre nosotros</h4>
							<p>
								'.$elementos[1]['valor'].'	
							</p>';
						}
					?>
				</div><!-- end messagebox -->

				<div class="message-box">
					<?php
						if($elementos[2]['estado'] === "1")	// Historia
						{
							echo '<h4>Historia</h4>
							<p>
								'.$elementos[2]['valor'].'
							</p>';
						}
					?>
				</div><!-- end messagebox -->

			</div><!-- end col -->

			<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
				<div class="post-media wow fadeIn">
				<?php
						if($elementos[3]['estado'] === "1")	// IMG nosotros/historia
						{
							echo '<img src="administracion/'.$elementos[3]['valor'].'" alt="" class="img-fluid img-rounded">';
						}
				?>	
				</div><!-- end media -->
			</div><!-- end col -->
		</div> <!-- end row -->
	</div><!-- end container -->
</div><!-- end section -->
<hr>
<div class="hmv-box">
	<div class="container">
		<div class="row">
			<div class="col-sm col-md-6 col-12">
				<div class="inner-hmv">
					<div class="icon-box-hmv"><i class="flaticon-achievement"></i></div>
					<h3>Misión</h3>
					<div class="tr-pa">M</div>
					<p style="text-align: justify;">
						<?= $elementos[4]['valor'] ?>
					</p>
				</div>
			</div>
			<div class="col-sm col-md-6 col-12">
				<div class="inner-hmv">
					<div class="icon-box-hmv"><i class="flaticon-eye"></i></div>
					<h3>Visión</h3>
					<div class="tr-pa">V</div>
					<p style="text-align: justify;">
						<?= $elementos[5]['valor'] ?>
					</p>
				</div>
			</div>

		</div>
	</div>
</div>