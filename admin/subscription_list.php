<?php include('../Class/Config.php'); $Uni->login_check_admin(); ?>
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
                <h2>Subscription list 
                <small class="text-muted"></small>
                </h2>
            </div>            
        </div>
    </div>

<!-- main body -->
<div class="container-fluid">       
<?php include('layout/Error_msg.php'); ?>
    <div class="row">    
        
        <!-- col -->
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="body">
<h5>Subscription Course List </h5>
                    <table class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th>Sr .No</th>
                                <th>Course Title</th>
                                <th>User</th>
                                <th>Tr_Id</th>
                                <th>Order_id</th>
                                <th>Amount</th>                                
                                <th>Date</th>                                
                            </tr>
                        </thead>
<?php  
// fetch course name
$course_fetch = $Uni->get("category");
foreach ($course_fetch as $course_k => $course_v){ $course_name[$course_v['id']] = $course_v['name']; }

// fetch User name
$users_fetch = $Uni->get("users");
foreach ($users_fetch as $users_k => $users_v){ $users_name[$users_v['id']] = $users_v['email']; }

$Uni->orderBy("id","desc");
$cat = $Uni->get("subscription");
$n = 1;
foreach ($cat as $key => $value)
{
                            ?>

                            <tbody>
                                <tr>
                                    <td class="align-middle"><?php echo $n; ?></td>                       
                                    <td class="align-middle"><?php echo $course_name[$value['course_id']]; ?></td>
                                    <td class="align-middle"><?php echo $users_name[$value['User_id']]; ?></td>

                                    <td class="align-middle"><?php echo $value['tr_id']; ?></td>
                                    <td class="align-middle"><?php echo  $value['order_id']; ?></td>

                                    <td class="align-middle"><?php echo $value['payment'].' Rs'; ?></td>                                    
                                    <td class="align-middle"><?php echo $value['date_time']; ?></td>                                                 
                                </tr>
<?php $n++; } ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <!-- col 1 end -->


    </div>
</div>
<!-- end main body -->

</section>
</body>
</html>
<?php include('layout/js.php'); ?>