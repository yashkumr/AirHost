<?php include('../Class/Config.php'); $Uni->login_check_admin(); ?> 
<!doctype html>
<html class="no-js " lang="en">
<head>
<?php include('layout/header.php'); ?>
</head>
<?php 

// insert data code ***************
if(isset($_POST['save']))
{
    $Uni->where("name", $_POST['name']);    
    $user = $Uni->get("category");

    if($Uni->count > 0)
    {
        $msg_danger = "Duplicate Data";
    }
    else
    {
        unset($_POST['save']);       
        $_POST['date_time'] = $Uni->now();
        if( $Uni->insert('category',$_POST) )
        $msg_success = "Data Save Success";        
    }
}
//  *******************************


// Upade data code ***************
if(isset($_POST['update']))
{
    $Uni->where('id', $_POST['t_id']);
    unset($_POST['t_id']);
    unset($_POST['update']); 

    if($Uni->update('category', $_POST))
         $msg_success = "Update Success ";  

}
//  *******************************


// Change Status 
if(isset($_GET['status']))
{

    if($_GET['current'] == 'ACTIVE')
    {
        $data = array('status' => 'INACTIVE');
        
        $Uni->where('id',$_GET['status']);

        $Uni->update('category', $data);

        $msg_danger = 'Status Updated';

    }  

    if($_GET['current'] == 'INACTIVE')
    {
        $data = array('status' => 'ACTIVE');
        
        $Uni->where('id',$_GET['status']);

        $Uni->update('category', $data);

        $msg_success = 'Status Updated';

    } 
}

// Delete Before Check Videos 

if($_GET['d_id'])
{
     $Uni->where('category_id',$_GET['d_id']);     
     $user = $Uni->get("course_video");    
  

     if($Uni->count > 0)
     {
        $msg_danger = 'Can not  Delete This Course Because Video Added on this Course <br> Please  First Delete This Course Video';
     }
     else
     {
        $Uni->where('id',$_GET['d_id']);    
        $Uni->delete('category');
        $msg_success = 'Successfully Deleted This Course';
     }

}



?>
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
<?php  include('layout/nav.php'); ?>


<!-- Left Sidebar -->
<?php  include('layout/left_sidebar.php'); ?>


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
<?php include('layout/Error_msg.php'); ?>
    <div class="row">    
        <!-- col -->
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="body">
                    <div class="card">
                        <div class="header">
<?php if(isset($_GET['t_id'])) { ?>
<h2><strong>Update Course</strong> Here</h2>
<?php } else { ?>
<h2><strong>Create Course</strong> Title here</h2>
<?php } ?>
                        </div>
                        <div class="body">

<?php if(isset($_GET['t_id'])) { ?>
    <a href="title.php" class="btn btn-info btn-sm float-right">+ Create New </a>
    <br><br>
<?php } ?>


<?php


// Upade data code for fetch ***************
if(isset($_GET['t_id']))
{
    $Uni->where("id", $_GET['t_id']);    
    $cat_fetch = $Uni->getOne("category");

    // print_r($cat_fetch);
    
}
 // *******************************

?>


<form action="" method="post">

<?php if(isset($_GET['t_id'])) { ?>
    <input type="hidden" name="t_id" value="<?php echo $cat_fetch['id']; ?>">
<?php } ?>

<div class="form-group">
<input type="text" name="name" class="form-control" placeholder="Add Title here"  required value="<?php echo (isset($_GET['t_id'])) ? $cat_fetch['name'] : '' ; ?>" >
</div>

<div class="form-group" style='display:none' >
<label>Enter Course Price <small>( Rs )</small></label>
<input type="number" name="amount" class="form-control"  value="<?php echo (isset($_GET['t_id'])) ? $cat_fetch['amount'] : '' ; ?>" >
</div>


<div class="form-group" style='display:none'>
<label class="text-danger">Enter Full Course Download Link ...<small>After Purchase User Access This link</small></label>
<input type="text" name="d_link" class="form-control"  value="<?php echo (isset($_GET['t_id'])) ? $cat_fetch['d_link'] : '' ; ?>" placeholder="http://my_first_course.zip" >
</div>




<div class="col-lg-6 col-md-6 col-sm-6">
<?php if(isset($_GET['t_id'])) { ?>
<button type="submit" name="update" class="btn btn-success btn-sm">Update This</button>   
<?php } else { ?>       
<button type="submit" name="save" class="btn btn-info btn-sm">Add This</button>   
<?php } ?>
</div>

</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- col 1 end -->

        <!-- col -->
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="body">
<h5>Course Title list</h5>
                    <table class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th>Sr .No</th>
                                <th>Name</th>
                                <!--<th>Price</th>-->
                                <th>Status</th>
                                <th>Video Count</th>
                                <!--<th>Full Course Link</th>-->
                                <th>date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
<?php  
$Uni->orderBy("id","desc");
$cat = $Uni->get("category");
$n = 1;
foreach ($cat as $key => $value)
{
                            ?>

                            <tbody>
                                <tr>
                                    <td><?php echo $n; ?></td>                                
                                    <td><?php echo $value['name']; ?></td>              
                                    <!--<td><b><?php echo $value['amount'].' Rs'; ?></b></td>              -->
<td>

<a href="title.php?status=<?php echo $value['id']; ?>&current=<?php echo $value['status']; ?>" class="badge rounded-pill text-white <?php echo ($value['status'] == 'INACTIVE') ?  'bg-primary' : 'bg-success' ?> ">  <?php echo $value['status']; ?>      
  </a>

</td>           




<td align="center"class="text-danger">
<?php
    $Uni->where("category_id", $value['id']);
    $users = $Uni->get("course_video");
    if($Uni->count > 0 )
        echo '<b class="text-danger">'.$Uni->count.'</b>';
?>
</b>
</td>            
                                    <!--<td><?php echo $value['d_link']; ?></td>         -->
                                    <td><?php echo $value['date_time']; ?></td>         
                                    <td>
<a href="title.php?t_id=<?php echo $value['id']; ?>" class="text-success edit_class">
    <i class="material-icons">edit</i></a> |
<a href="title.php?d_id=<?php echo $value['id']; ?>" class="text-danger"><i class="material-icons">delete</i></a>
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

