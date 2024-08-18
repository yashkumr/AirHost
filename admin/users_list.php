<?php include('../Class/Config.php'); $Uni->login_check_admin(); ?> 
<!doctype html>
<html class="no-js " lang="en">
<head>
<?php include('layout/header.php'); ?>

<?php
    if(isset($_GET['status']))
    {

        if($_GET['current'] == 'ACTIVE')
        {
            $data = array('status' => 'INACTIVE');
            
            $Uni->where('id',$_GET['status']);

            $Uni->update('users', $data);

            $msg_danger = 'Status Updated';

        }  

        if($_GET['current'] == 'INACTIVE')
        {
            $data = array('status' => 'ACTIVE');
            
            $Uni->where('id',$_GET['status']);

            $Uni->update('users', $data);

            $msg_success = 'Status Updated';

        } 
    }

    if(isset($_GET['trash']))
    {
        $Uni->where('id',$_GET['trash']);
        $Uni->delete('users');
        $msg_success = 'User Deleted';
    }
?>



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
                <h2>Registers Users list 
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
<h5>Users List </h5>
                    <table class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th>Sr .No</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Course Name</th>
                                <th>Status</th>
                                <th>Date</th>                                
                                <th>Action</th>                                
                            </tr>
                        </thead>
<?php  
$Uni->orderBy("id","desc");
$cat = $Uni->get("users"); 
$n = 1;
foreach ($cat as $key => $value)
{
                            ?>

                            <tbody>
                                <tr>
                                    <td class="align-middle"><?php echo $n; ?></td>                       
                                    <td class="align-middle"><?php echo $value['user_name']; ?></td>
                                    <td class="align-middle"><?php echo $value['email']; ?></td>

                                    <td class="align-middle"><?php echo $value['pass']; ?></td>
                                    <td class="align-middle" ><?php echo $value['category_name']; ?></td>
<td class="align-middle">

  <a href="users_list.php?status=<?php echo $value['id']; ?>&current=<?php echo $value['status']; ?>" class="badge rounded-pill text-white <?php echo ($value['status'] == 'INACTIVE') ?  'bg-primary' : 'bg-success' ?> ">  <?php echo $value['status']; ?>      
  </a>
</td>

                                    <td class="align-middle"><?php echo $value['date_time']; ?></td>                                                 
                                    <td class="align-middle">
<a href="users_list.php?trash=<?php echo $value['id'];?>" class="text-danger"><i class="material-icons">delete</i></a>                            
                                    </td>                                    
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