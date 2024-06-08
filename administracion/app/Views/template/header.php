<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="<?=base_url()?>/assets/image/logo.ico" type="image/ico" />

    <title>BackOficce || TecnoMedica</title>

    <!-- Bootstrap -->
    <link href="<?= base_url() ?>/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <link href="<?= base_url() ?>/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url() ?>/assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url() ?>/assets/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url() ?>/assets/build/css/custom.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?= base_url() ?>/assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="<?= base_url() ?>/assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?= base_url() ?>/assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="<?= base_url() ?>/assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <link href="<?= base_url() ?>/assets/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    <link href="<?= base_url() ?>/assets/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/build/css/croppie.css" rel="stylesheet">

    <!-- jQuery 
    <script src="<?=base_url()?>/assets/vendors/jquery/dist/jquery.min.js"></script>-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/carousel.css">
   
    <!-- jsDelivr :: Sortable :: Latest (https://www.jsdelivr.com/package/npm/sortablejs) -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

    <!-- Sentry install -->
    <script src="https://js.sentry-cdn.com/4c3717ab13fcca0366ba1b3b89190d0e.min.js" crossorigin="anonymous"></script>

    <script>
        var baseURL = '<?= base_url() ?>/';
        const env = '<?= env("CI_ENVIRONMENT") ?>';

        
        // Disable console debug, warn and error on production
        if (env === 'production') {
            console.debug = function () {};
            console.log = function () {};
            console.error = function () {};
        }
    </script>
</head>