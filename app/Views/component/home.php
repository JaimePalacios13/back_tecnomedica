	<!-- END LOADER -->
	<?php foreach($carousel as $mostrarCarousel):?>
	<style>
	        @media only screen and (max-width : 600px) {
                
                
                .banner-uno-img{
                    background-image:url(<?=base_url('/upload/carousel/bannepmobil.png')?>);
                    background-repeat: no-repeat;
                    background-size: 100% 100% !important;
                }
                .banner-dos-img{
                    background-image:url(<?=base_url('/upload/carousel/banner1.jpeg')?>);
                    background-repeat: no-repeat;
                    background-size: 100% 100% !important;
                }
                .banner-tres-img{
                    background-image:url(<?=base_url('/upload/carousel/banner2.jpeg')?>);
                    background-repeat: no-repeat;
                    background-size: 100% 100% !important;
                }
            }
            @media only screen and (min-width : 601px) {
                
				.banner-uno-img{
                    background-image:url(<?=$mostrarCarousel["carousel1"]?>);
                    background-repeat: no-repeat;
                    background-size: 100% 100% !important;
                }
                .banner-dos-img{
                    background-image:url(<?=$mostrarCarousel["carousel2"]?>);
                    background-repeat: no-repeat;
                    background-size: 100% 100% !important;
                }
                .banner-tres-img{
                    background-image:url(<?=$mostrarCarousel["carousel3"]?>);
                    background-repeat: no-repeat;
                    background-size: 100% 100% !important;
                }
            }
	    </style>
	
	<div id="carouselExampleControls" class="carousel slide bs-slider box-slider" data-ride="carousel" data-pause="hover"
	    data-interval="false">
	    <!-- Indicators -->
	    <ol class="carousel-indicators">
	        <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
	        <li data-target="#carouselExampleControls" data-slide-to="1"></li>
	        <li data-target="#carouselExampleControls" data-slide-to="2"></li>
	    </ol>
	    <div class="carousel-inner" role="listbox">
	        <div class="carousel-item active">
	            <div id="home" class="first-section banner-uno-img">
	                <div class="dtab">
	                    <div class="container">
	                        <div class="row">
	                            <div class="col-md-12 col-sm-12 text-center">
	                                <div class="big-tagline">
	                                    <!--<h2 data-animation="animated zoomInRight"><?=$mostrarCarousel["lema1"]?></h2>
	                                    <p class="lead" data-animation="animated fadeInLeft">
	                                        <?=$mostrarCarousel["sublema1"]?>
	                                    </p>
	                                     <a href="#" class="hover-btn-new"><span>Contact Us</span></a>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<a href="#" class="hover-btn-new"><span>Read More</span></a> -->
	                                </div>
	                            </div>
	                        </div><!-- end row -->
	                    </div><!-- end container -->
	                </div>
	            </div><!-- end section -->
	        </div>
	        <div class="carousel-item">
	            <div id="home" class="first-section banner-dos-img">
	                <div class="dtab">
	                    <div class="container">
	                        <div class="row">
	                            <div class="col-md-12 col-sm-12 text-right">
	                                <div class="big-tagline">
	                                    <!--<h2><?=$mostrarCarousel["lema2"]?></h2>
                                        <p class="lead" data-animation="animated fadeInLeft">
	                                        <?=$mostrarCarousel["sublema2"]?></p>
	                                    <p class="lead"></p>
	                                     <a href="#" class="hover-btn-new"><span>Contact Us</span></a>
	                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                                    <a href="#" class="hover-btn-new"><span>Read More</span></a> -->
	                                </div>
	                            </div>
	                        </div><!-- end row -->
	                    </div><!-- end container -->
	                </div>
	            </div><!-- end section -->
	        </div>
	        <div class="carousel-item">
	            <div id="home" class="first-section banner-tres-img">
	                <div class="dtab">
	                    <div class="container">
	                        <div class="row">
	                            <div class="col-md-12 col-sm-12 text-left">
	                                <div class="big-tagline">
	                                    <!--<h2 data-animation="animated zoomInRight"><?=$mostrarCarousel["lema3"]?></h2>
	                                    <p class="lead" data-animation="animated fadeInLeft">
	                                        <?=$mostrarCarousel["sublema3"]?></p>-->
	                                </div>
	                            </div>
	                        </div><!-- end row -->
	                    </div><!-- end container -->
	                </div>
	            </div><!-- end section -->
	        </div>
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
	<?php endforeach?>
	<?php foreach($datos as $mostrarBody):?>
	<div id="overviews" class="section wb">
	    <div class="container">
	        <div class="section-title row text-center">
	            <div class="col-md-8 offset-md-2">
	                <p class="lead">
	                    <?=$mostrarBody["frase"]?>
	                </p>
	            </div>
	        </div><!-- end title -->

	        <div class="row align-items-center">
	            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
	                <div class="message-box">
	                    <h4>Historia</h4>
	                    <p>
	                        <?=$mostrarBody["historia"]?>
	                    </p>
	                    <!-- <a href="#" class="hover-btn-new orange"><span>Learn More</span></a> -->
	                </div><!-- end messagebox -->
	            </div><!-- end col -->

	            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
	                <div class="post-media wow fadeIn">
	                    <img src="<?=$mostrarBody["img_historia"]?>" alt="" class="img-fluid img-rounded">
	                </div><!-- end media -->
	            </div><!-- end col -->
	        </div>
	    </div><!-- end container -->
	</div><!-- end section -->
	<hr>
	<div class="hmv-box">
	    <div class="container">
	        <div class="row">
	            <div class="col-sm col-md-6 col-12">
	                <div class="inner-hmv">
	                    <div class="icon-box-hmv"><i class="flaticon-achievement"></i></div>
	                    <h3>Mission</h3>
	                    <div class="tr-pa">M</div>
	                    <p style="text-align: justify;">
	                        <?=$mostrarBody["mision"]?>
	                    </p>
	                </div>
	            </div>
	            <div class="col-sm col-md-6 col-12">
	                <div class="inner-hmv">
	                    <div class="icon-box-hmv"><i class="flaticon-eye"></i></div>
	                    <h3>Vision</h3>
	                    <div class="tr-pa">V</div>
	                    <p style="text-align: justify;">
	                        <?=$mostrarBody["vision"]?>
	                    </p>
	                </div>
	            </div>

	        </div>
	    </div>
	</div>
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

	        <!-- <div class="row">
	            <div class="col-md-12">
	                <div class="tab-content">
	                    <div class="tab-pane active fade show" id="tab1">
	                        <div class="row text-center">
	                            <div class="col-sm">
	                                <div class="pricing-table pricing-table-highlighted">
	                                    <div class="pricing-table-header grd1">
	                                        <h2>Nuestra</h2>
	                                        <h3>Politica</h3>
	                                    </div>
	                                    <div class="pricing-table-space"></div> esto estaba comentado
	                                    <div class="pricing-table-features">
	                                        <p>
	                                            <?=$mostrarBody["politica"]?>
	                                        </p>
	                                    </div>
	                                    <div class="pricing-table-sign-up">este div estaba comentado
                                            <a href="#" class="hover-btn-new orange"><span>Order Now</span></a>
                                        </div>
	                                </div>
	                            </div>
	                            <div class="col-sm">
	                                <div class="pricing-table pricing-table-highlighted">
	                                    <div class="pricing-table-header grd1">
	                                        <h2>Nuestro</h2>
	                                        <h3>Compromiso</h3>
	                                    </div>
	                                    <div class="pricing-table-space"></div> esto estaba comentado
	                                    <div class="pricing-table-features">
	                                        <p>
	                                            <?=$mostrarBody["compromiso"]?>
	                                        </p>
	                                    </div>
	                                    <div class="pricing-table-sign-up">este div estaba comentado
                                            <a href="#" class="hover-btn-new orange"><span>Order Now</span></a>
                                        </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div> --><!-- end row -->
	    </div><!-- end container -->
	</div><!-- end section -->
	<?php endforeach?>
	