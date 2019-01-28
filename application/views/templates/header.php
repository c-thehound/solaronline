<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?php echo $title; ?></title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url('images/logo.png'); ?>" type="image/png">

    <!-- Google Fonts -->
    <?php echo link_tag("fonts/Roboto/roboto.css"); ?>
    <?php echo link_tag("fonts/Material/material.css"); ?>
     <!-- Jquery Core Js -->
    <script src="<?php echo base_url('plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap Core Css -->
    <?php echo link_tag("plugins/bootstrap-select/css/bootstrap-select.min.css"); ?>
    <?php echo link_tag("plugins/bootstrap/css/bootstrap.css"); ?>
    <!-- Bootstrap Select Css -->
    <?php echo link_tag("css/select2-bootstrap.css"); ?>

    <!-- Waves Effect Css -->
    <?php echo link_tag("plugins/node-waves/waves.css"); ?>


    <!-- Animation Css -->
    <?php echo link_tag("plugins/animate-css/animate.css"); ?>

    <!-- Morris Chart Css-->
    <?php echo link_tag("plugins/morrisjs/morris.css"); ?>
    <!-- AmCharts export Css -->
    <?php echo link_tag("plugins/ammap/plugins/export/export.css"); ?>
    <!-- Custom Css -->
    <?php echo link_tag("css/style.css"); ?>
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <?php echo link_tag("css/themes/all-themes.css"); ?>
     <!-- Sweetalert Css -->
    <?php echo link_tag('plugins/sweetalert/sweetalert.css'); ?>
     <!-- Bootstrap Material Datetime Picker Css -->
      <?php echo link_tag('plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css'); ?>


</head>

<body class="<?php echo (isset($page) ? $page : '') . (isset($user) && (int)$user->user_level === 1 ? ' theme-red' : ' theme-green'); ?>">
	<div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <section>
