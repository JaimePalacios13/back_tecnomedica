<div class="parallax section dbcolor">
    <div class="container">
        
            <div class="row logos">
                <div class="owl-carousel owl-theme">
                    <?php foreach($marcas as $marca){?>    
    	            <div class="item">
                        <a href="#">
                            <img src="<?=$marca['fotomarca']?>" alt="" class="img-repsonsive">
                        </a>
                    </div>
                    <?php }?>
                </div>
            </div><!-- end row -->
       
    </div><!-- end container -->
</div><!-- end section -->

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm col-md col-xs-12">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h3>Sobre nosotros</h3>
                    </div>
                    <?php foreach ($contactos as $contacto) {?>
                    <p>
                        <?=$contacto['about_us']?>
                    </p>
                    <div class="footer-right">
                        <ul class="footer-links-soi">
                            <!-- <li><a target="_blank" href="<?=$contacto['web']?>"><i class="fa fa-facebook"></i></a></li> -->
                            <!-- <li><a href="#"><i class="fa fa-github"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                        </ul><!-- end links -->
                    </div>
                </div><!-- end clearfix -->
            </div><!-- end col -->

            <div class="col-sm col-md col-xs-12 ml-3">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h3>Detalles de contactos</h3>
                    </div>

                    <ul class="footer-links">

                        <li><i class="fas fa-envelope fa-2x"></i> <a href="mailto:#"><?=$contacto['correo']?></a></li>
                        <li style="display:<?=$contacto['web']== ''?'none': 'block'?>"><i class="fab fa-facebook-square fa-2x"></i> <a href="#"><?=$contacto['web']?></a></li>
                        <li><i class="fas fa-route fa-2x"></i> <?=$contacto['direccion']?></li>
                        <li><i class="fas fa-phone-square-alt fa-2x"></i> <?=$contacto['telefono']?> & (+503)<?=$contacto['celular']?></li>
                        <?php } ?>
                    </ul><!-- end links -->
                </div><!-- end clearfix -->
            </div><!-- end col -->

        </div><!-- end row -->
    </div><!-- end container -->
</footer><!-- end footer -->

<div class="copyrights">
    <div class="container">
        <div class="footer-distributed">
            <div class="footer-center">
                <p class="footer-company-name">Todos los Derechos Reservados. &copy;</p>
            </div>
        </div>
    </div><!-- end container -->
</div><!-- end copyrights -->

<a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<!-- ALL JS FILES -->
<script src="<?=base_url()?>/assets/js/all.js"></script>
<!-- ALL PLUGINS -->
<script src="<?=base_url()?>/assets/js/custom.js"></script>
<script src="<?=base_url()?>/assets/js/timeline.min.js"></script>
<!-- datatables -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script>
timeline(document.querySelectorAll('.timeline'), {
    forceVerticalMode: 700,
    mode: 'horizontal',
    verticalStartPosition: 'left',
    visibleItems: 4
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    
    cantidad = document.querySelectorAll(".item");
    cantidad = parseInt(cantidad.length);
    console.log(cantidad);

    $(".owl-carousel").owlCarousel({
    loop: cantidad >= 5 ? true : false,
    margin:20,
    nav: false,
    autoplay: cantidad >= 5 ? true : false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
</script>
</body>

</html>