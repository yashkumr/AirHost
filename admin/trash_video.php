<?php include('../Class/Config.php');  $Uni->login_check_admin(); ?>
<!doctype html>
<html class="no-js " lang="en">
<head>
<?php include('layout/header.php'); ?>
</head>
<?php 

// Restore 
if(isset($_GET['restore']))
{
    $Uni->where('id',$_GET['restore']);
    $data = array('trash' => '0');

    if($Uni->update('course_video', $data))
        $msg_success = "Restore Video";
}

// Delete
if(isset($_GET['delete']) || isset($_GET['file']))
{

	unlink('../uploads_demo/'.$_GET['file']);

	$Uni->where('id', $_GET['delete']);
	if($Uni->delete('course_video'))
    	$msg_danger = "Deleted Video";
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
<?php include('layout/nav.php'); ?>


<!-- Left Sidebar -->
<?php include('layout/left_sidebar.php'); ?>


<!-- Main Content -->
<section class="content home">

    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Trash video 
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
<h5>Trashed Videos List </h5>
                    <table class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th>Sr .No</th>
                                <th>Course Title</th>
                                <th>Video Title</th>
                                <th>Link</th>
                                <th></th>
                                <th>Status</th>                                
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
<?php  
// fetch course name
$course_fetch = $Uni->get("category");
$n = 1;
foreach ($course_fetch as $course_k => $course_v){ $course_name[$course_v['id']] = $course_v['name']; }

// echo '<pre>';
// print_r($course_name);
// echo '</pre>';

$Uni->where('trash', '1');
$Uni->orderBy("id","desc");
$cat = $Uni->get("course_video");
$n = 1;
foreach ($cat as $key => $value)
{
                            ?>

                            <tbody>
                                <tr>
                                    <td class="align-middle"><?php echo $n; ?></td>                       
                                    <td class="align-middle"><?php echo $course_name[$value['category_id']]; ?></td>
                                    <td class="align-middle"><?php echo $value['video_title']; ?></td>
                                    <td class="align-middle"><?php echo $value['video_link']; ?></td>
<td class="align-middle">
<?php if(isset($value['video_name'])){ ?>
<video width="130" controls>
  <source src="../uploads_demo/<?php echo $value['video_name']; ?>" type="video/mp4"> 

</video>
<?php } ?>
</td>
                                    <td class="align-middle"><?php echo $value['status']; ?></td>                                    
                                    <td class="align-middle"><?php echo $value['date_time']; ?></td>
                                    <td class="align-middle">
<a href="trash_video.php?restore=<?php echo $value['id'];?>" class="text-success"><i class="material-icons">restore</i></a> |
<a href="trash_video.php?delete=<?php echo $value['id'];?>&file=<?php echo $value['video_name']; ?>" class="text-danger"><i class="material-icons">delete</i></a>
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