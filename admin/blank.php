<!doctype html>
<html class="no-js " lang="en">
<head>
<?php include('layout/header.php'); ?>
</head>
<body class="theme-cyan">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="assets/images/logo.svg" width="48" height="48" alt="Compass"></div>
        <p>Please wait...</p>
    </div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Top Bar -->
<?php include('layout/nav.php'); ?>


<!-- Left Sidebar -->
<?php include('layout/left_sidebar.php'); ?>


<!-- Main Content -->
<section class="content home">

    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Dashboard
                <small class="text-muted"></small>
                </h2>
            </div>            
        </div>
    </div>

<!-- main body -->
    <div class="container-fluid">       
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12">                
            </div>
            <div class="col-lg-8 col-md-12">
            </div>
        </div>
    </div>
<!-- end main body -->

</section>
</body>
</html>
<?php include('layout/js.php'); ?>