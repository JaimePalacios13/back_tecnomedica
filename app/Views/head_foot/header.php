<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Site Metas -->
<title>TecnoMedica S.A de C.V</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

<!-- Site Icons -->
<link rel="shortcut icon" href="<?=base_url()?>/assets/images/logo/logo.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="<?=base_url()?>/assets/images/apple-touch-icon.png">
<!-- sweetalert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="<?=base_url()?>/assets/app/main.js"></script>
<!-- CDN fontawesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
    integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?=base_url()?>/assets/css/font-awesome.min.css">
<link rel="stylesheet" href="<?=base_url()?>/assets/css/font-awesome.css">
<!-- Site CSS -->
<link rel="stylesheet" href="<?=base_url()?>/assets/css/style.css">
<!-- ALL VERSION CSS -->
<link rel="stylesheet" href="<?=base_url()?>/assets/css/versions.css">
<!-- Responsive CSS -->
<link rel="stylesheet" href="<?=base_url()?>/assets/css/responsive.css">
<!-- Custom CSS -->
<link rel="stylesheet" href="<?=base_url()?>/assets/css/custom.css">
<link rel="stylesheet" href="<?=base_url()?>/assets/css/animate.css">
<link rel="stylesheet" href="<?=base_url()?>/assets/css/animate.min.css">
<!-- <link rel="stylesheet" href="<?=base_url()?>/assets/css/colors.css"> -->
<link rel="stylesheet" href="<?=base_url()?>/assets/css/custom.css">
<link rel="stylesheet" href="<?=base_url()?>/assets/css/flaticon.css">
<link rel="stylesheet" href="<?=base_url()?>/assets/css/destacados.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Modernizer for Portfolio -->
<script src="<?=base_url()?>/assets/js/modernizer.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<!-- datatables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="host_version">
    <!-- Start header -->
    <header class="top-navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?=base_url()?>">
                <img src="<?=base_url()?>/assets/images/logo/logo.png" alt="" style="width:235px; height:90px;" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" onclick="toogleMenu('show')"
                    aria-controls="navbars-rs-food" data-target="#navbars-host" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbars-host">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="<?=base_url()?>">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?=base_url()?>/conozcanos">Conózcanos</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?=base_url()?>/productos"">Productos</a></li>
                        <li class="nav-item"><a class="nav-link"
                                href="<?=base_url()?>/contactenos">Contactenos</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?=base_url()?>/categoria/16">Cuidados en casa</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->
    <script>
        function toogleMenu(clase){
            if (clase == 'show') {
                $('#navbars-host').addClass(clase)
                $('.navbar-toggler').attr('onclick',"toogleMenu('close')")
            }else if (clase == 'close') {
                $('#navbars-host').removeClass('show')
                $('.navbar-toggler').attr('onclick',"toogleMenu('show')")
            }
        }
    </script>