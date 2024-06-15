<div class="parallax section dbcolor">
</div><!-- end section -->

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm col-md col-xs-12">
                <div class="widget clearfix">
                    <?php if(($elementosFooter[0]['estado']==="1") || $elementosFooter[1]['estado']==="1" ||
                        ($elementosFooter[2]['estado']==="1") || ($elementosFooter[3]['estado']==="1") ) 
                        {
                    ?>
                        <div class="widget-title">
                            <h3><?=$seccionesFooter[0]['nombre']?></h3>
                        </div>
                        <div class="footer-icons">
                            <ul>
                                <?php if($elementosFooter[0]['estado']==="1") { ?>
                                    <li><a href="<?=$elementosFooter[0]['valor']?>" target="_blank"><i  class="fab fa-facebook-f fa-2x" ></i></a></li>
                                <?php } ?>
                                <?php if($elementosFooter[1]['estado']==="1") { ?>
                                    <li><a href="<?=$elementosFooter[1]['valor']?>" target="_blank"><i class="fab fa-instagram fa-2x"></i></a></li>
                                <?php } ?>
                                <?php if($elementosFooter[2]['estado']==="1") { ?>
                                    <li><a href="<?=$elementosFooter[2]['valor']?>" target="_blank"><i  class="fab fa-linkedin-in fa-2x" ></i></a></li>
                                <?php } ?>
                                <?php if($elementosFooter[3]['estado']==="1") { ?>
                                    <li><a href="<?=$elementosFooter[3]['valor']?>" target="_blank"><i class="fab fa-whatsapp fa-2x"></i></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>
                </div><!-- end clearfix -->
            </div><!-- end col -->
            
            <div class="col-sm col-md col-xs-12 ml-3">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h3>Detalles de contactos</h3>
                    </div>

                    <ul class="footer-links">
                        <?php foreach ($contactos as $contacto) {?>
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
    });
</script>

    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

    <style>
        .footer-icons {
        justify-content: space-between;
        padding: 16px 64px 0px 0px}

        .footer-icons ul {
        list-style-type: none;}

        .footer-icons li {
            display: inline-block;
            padding: 0px 10px 0px 10px
        }

    </style>
</body>

</html>