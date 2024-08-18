<?php include("includes/head.php") ?>
<?php include("includes/header.php") ?>


<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section background_bg overlay_bg_50 page_title_light" data-img-src="assets/images/404_bg.jpg">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title">
            		<h1>Page Not Found</h1>
                </div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Error Page</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START 404 SECTION -->
<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10 animation" data-animation="fadeInUp" data-animation-delay="0.2s">
                <div class="text-center">
                    <div class="error_txt">Page Not Found</div>
                    <h5 class="mb-2 mb-sm-4">oops! The page you requested was not found!</h5> 
                    <p>The page you are looking for was moved, removed, renamed  or might never existed.</p>
                    <div class="search_form pb-3 pb-sm-4">
                        <form method="post">
                            <input name="text" id="text" type="text" placeholder="Search..." class="form-control">
                            <button type="submit" class="btn icon_search"><i class="ion-ios-search-strong"></i></button>
                        </form>
                    </div>
                    <a href="index.php" class="btn btn-default">Back To Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END 404 SECTION -->

<!-- ----------------footer------------------- -->
<?php include("includes/footer.php") ?>