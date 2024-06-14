	<!-- LOADER -->
	<div id="preloader">
	    <div class="loader-container">
	        <div class="progress-br float shadow">
	            <div class="progress__item"></div>
	        </div>
	    </div>
	</div>
	<!-- END LOADER -->

	<div class="all-title-box" style="background-image:url('<?=base_url()?>/assets/images/banner/insumosmed.jpg');">
	    <div class="container text-center">
	        <h1>Contactenos</h1>
	    </div>
	</div>

	<div id="contact" class="section wb">
	    <div class="container">
	        <div class="section-title text-center">
	            <h3>¿Necesitas ayuda?</h3>
	            <p class="lead">
	                Quieres más detalles sobre nuestros productos. Por favor, rellene el siguiente formulario, <br>Para
	                poder Brindarle mas informacion.
	            </p>
	        </div><!-- end title -->
	        <div class="row">
	            <div class="col-xl-12 col-md-12 col-sm-12">
	                <div class="contact_form">
	                    <!-- <div id="message"></div> -->
	                    <form action="<?=base_url()?>Contactenos/contactenos" name="contactform" method="POST">
	                        <div class="row row-fluid">
	                            <div class="col-lg-6 col-md-6 col-sm-6">
	                                <input type="text" name="nombre" id="nombre" class="form-control" required
	                                    placeholder="Nombre">
	                            </div>
	                            <div class="col-lg-6 col-md-6 col-sm-6">
	                                <input type="text" name="apellido" id="apellido" class="form-control" required
	                                    placeholder="Apellido">
	                            </div>
	                            <div class="col-lg-6 col-md-6 col-sm-6">
	                                <input type="email" name="email" id="email" class="form-control" required
	                                    placeholder="Email">
	                            </div>
	                            <div class="col-lg-6 col-md-6 col-sm-6">
	                                <input type="text" name="phone" id="phone" class="form-control" required
	                                    placeholder="Su teléfono">
	                            </div>
	                            <div class="col-lg-12 col-md-12 col-sm-12">
	                                <input class="form-control" name="asunto" id="asunto" required placeholder="Asunto">
	                            </div>
	                            <div class="col-lg-12 col-md-12 col-sm-12">
	                                <textarea class="form-control" name="comments" id="comments" rows="6" required
	                                    placeholder="Danos más detalles..."></textarea>
	                            </div>
	                            <div class="text-center pd">
	                                <button type="submit" name="enviar" id="submit"
	                                    class="btn btn-light btn-radius btn-brd grd1 btn-block">Enviar</button>
	                                <!-- <input type="submit" name="btn" class="btn" value="btn"> -->
	                            </div>
	                        </div>
	                    </form>
	                </div>
	            </div><!-- end col -->
			</div><!-- end row -->
			<div class="row">
			<div class="col-sm col-md col-xs-12 bg-light text-center">
                <div class="widget clearfix">
                    <div class="widget-title">
						<div class="row mt-4">
							<div class="col-sm">
								<h1 class="font-weight-bolder"><?=$seccionesFooter[0]['nombre']?></h1>
							</div>
	                	</div>
                    </div>
                    <div class="footer-icons">
                        <ul>
                            <?php if($elementosFooter[0]['estado']==="1") { ?>
                                <li><a href="<?=$elementosFooter[0]['valor']?>" target="_blank"><i  class="fab fa-facebook-f fa-2x" ></i></a></li>
                            <?php } ?>
                            <?php if($elementosFooter[0]['estado']==="1") { ?>
                                <li><a href="<?=$elementosFooter[1]['valor']?>" target="_blank"><i class="fab fa-instagram fa-2x"></i></a></li>
                            <?php } ?>
                            <?php if($elementosFooter[0]['estado']==="1") { ?>
                                <li><a href="<?=$elementosFooter[2]['valor']?>" target="_blank"><i  class="fab fa-linkedin-in fa-2x" ></i></a></li>
                            <?php } ?>
                            <?php if($elementosFooter[0]['estado']==="1") { ?>
                                <li><a href="<?=$elementosFooter[3]['valor']?>" target="_blank"><i class="fab fa-whatsapp fa-2x"></i></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div><!-- end clearfix -->
            </div><!-- end col -->
	            <div class="col-xl-6 col-md-12 col-sm-12 bg-light text-center">
	                <div class="row mt-4">
	                    <div class="col-sm">
	                        <h1 class="font-weight-bolder">Detalles de Contacto</h1>
	                    </div>
	                </div>
	                <?php foreach ($contactos as $contacto) {?>
	                <div class="row mt-4">
	                    <div class="col-sm">
	                        <i class="fas fa-envelope fa-2x"></i>
	                        <h2><a href="mailto:#" class="text-info"><?=$contacto['correo']?></a></h2>
	                    </div>
	                </div>
	                <div class="row mt-4">
	                    <div class="col-sm">
	                        <i class="fas fa-globe fa-2x"></i>
	                        <h2><a href="#" class="text-info"><?=$contacto['web']?></a></h2>
	                    </div>
	                </div>
	                <div class="row mt-4">
	                    <div class="col-sm">
	                        <i class="fas fa-route fa-2x"></i>
	                        <p class="bg-gradient-primary"><?=$contacto['direccion']?></p>
	                    </div>
	                </div>
	                <div class="row mt-4">
	                    <div class="col-sm">
	                        <i class="fas fa-phone-square-alt fa-2x"></i>
	                        <p><?=$contacto['telefono']?><br>(+503) <?=$contacto['celular']?></p>
	                    </div>
	                </div>
	                <?php } ?>
	            </div>
			</div><!-- end row -->
	    </div><!-- end container -->
	</div><!-- end section -->