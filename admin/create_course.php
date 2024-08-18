<?php include('../Class/Config.php');
$Uni->login_check_admin(); ?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <?php include('layout/header.php'); ?>
</head>
<?php

// insert data code ***************
if (isset($_POST['save'])) {
    unset($_POST['save']);

    // file validation
    if (!empty($_FILES['video_name']['name'])) {
        if ($_FILES['video_name']['size'] <= 10000000) // 10 MB
        {
            if ($_FILES['video_name']['type'] == 'video/mp4') {
                // uploding ...............
                $target_dir = "../uploads_demo/";

                // Rename of upload file ****************** //
                $file_extction = explode(".", $_FILES["video_name"]["name"]);
                $new_file_name = $_POST['video_title'] . round(microtime(true)) . '.' . end($file_extction);
                $new_file_name = str_replace(" ", "", basename($new_file_name));
                $target_file = $target_dir . basename($new_file_name);
                // ************************************* // 

                if (move_uploaded_file($_FILES["video_name"]["tmp_name"], $target_file)) {
                    $_POST['video_name'] = $new_file_name;
                    $_POST['video_link'] = NULL;
                    $_POST['date_time']  = $Uni->now();

                    $Uni->insert('course_video', $_POST);
                    if (empty($Uni->getLastError()))
                        $msg_success = "Data Save Success";
                    else echo $Uni->getLastError();
                }
            } else
                $msg_danger = "Your File is not mp4 ";
        } else
            $msg_danger = "Video Size is Greater From 10 Mb Your File Size is:- " . number_format(($_FILES['video_name']['size'] / 1024) / 1024, 2) . ' MB';
    } else {
        $_POST['video_name'] = NULL;
        $_POST['date_time']  = $Uni->now();

        $Uni->insert('course_video', $_POST);
        if (empty($Uni->getLastError()))
            $msg_success = "Data Save Success";
        else echo $Uni->getLastError();
    }
    //  End file vlidation

}
//  *******************************



// Trashed 
if (isset($_GET['trash'])) {
    $Uni->where('id', $_GET['trash']);
    $data = array('trash' => '1');

    if ($Uni->update('course_video', $data))
        $msg_danger = "Trashed Video";
}




?>

<body class="theme-cyan">
    <!-- Page Loader -->
    <!--<div class="page-loader-wrapper">-->
    <!--    <div class="loader">-->
    <!--        <div class="m-t-30"><img class="zmdi-hc-spin" src="assets/images/logo.svg" width="48" height="48" alt="Compass"></div>-->
    <!--        <p>Please wait...</p>-->
    <!--    </div>-->
    <!--</div>-->
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
                    <h2>Course
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
                            <div class="card p-0">
                                <div class="header">
                                    <h2><strong>Create Course</strong> With Videos</h2>
                                </div>
                                <div class="body">

                                    <form action="" method="post" enctype="multipart/form-data">

                                        <div class="row">
                                            <div class="col">

                                                <div class="form-group">
                                                    <input type="text" name="video_title"
                                                        class="form-control bg-dark text-white"
                                                        placeholder="Enter Video Title here" required>
                                                </div>


                                                <div class="form-group">
                                                    <select class="form-control" name="category_id">
                                                        <option selected disabled>Select Course</option>
                                                        <?php
                                                        $Uni->where("status", "ACTIVE");
                                                        $Uni->where('trash', '0');
                                                        $Uni->orderBy("id", "desc");
                                                        $cat = $Uni->get("category");
                                                        $n = 1;
                                                        foreach ($cat as $key => $value) { ?>
                                                        <option value="<?php echo $value['id']; ?>"
                                                            <?php if (isset($_POST['category_id'])) echo ($value['id'] == $_POST['category_id']) ? 'selected' : ''; ?>>
                                                            <?php echo $value['name']; ?></option><?php } ?>
                                                    </select>
                                                </div>

                                            </div>




                                            <div class="col">

                                                <div class="form-group">
                                                    <input type="text" name="video_link" class="form-control"
                                                        placeholder="Video Link">
                                                </div>
                                                <!--<center>OR</center>-->
                                                <div class="form-group" style="display:none;">
                                                    <label>Upload Demo File <small>( Only Accept * Under 10 Mb )
                                                        </small></label>
                                                    <input type="file" name="video_name" class="form-control">
                                                    <label class="text-danger"><small>Upload Only Mp4 Video File
                                                            *</small></label>
                                                </div>
                                            </div>

                                        </div>

                                        <button type="submit" name="save" class="btn btn-primary btn-sm">Add
                                            This</button>


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
                            <h5>Resent Adedd Course Video</h5>
                            <table class="table table-sm table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr .No</th>
                                        <th>Course Name</th>
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
                                foreach ($course_fetch as $course_k => $course_v) {
                                    $course_name[$course_v['id']] = $course_v['name'];
                                }

                                // echo '<pre>';
                                // print_r($course_name);
                                // echo '</pre>';

                                $Uni->where('trash', '0');
                                $Uni->orderBy("id", "desc");
                                $cat = $Uni->get("course_video");
                                $n = 1;
                                foreach ($cat as $key => $value) {
                                ?>

                                <tbody>
                                    <tr>
                                        <td class="align-middle"><?php echo $n; ?></td>
                                        <td class="align-middle text-primary">
                                            <?php echo $course_name[$value['category_id']]; ?></td>
                                        <td class="align-middle"><?php echo $value['video_title']; ?></td>
                                        <td class="align-middle" style="width:20px;">
                                            <iframe width="100" height="100" src="<?php echo $value['video_link']; ?>"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                        </td>
                                        <td class="align-middle">
                                            <?php if (isset($value['video_name'])) { ?>
                                            <video width="100" controls>
                                                <source src="../uploads_demo/<?php echo $value['video_name']; ?>"
                                                    type="video/mp4">
                                            </video>
                                            <?php } ?>
                                        </td>
                                        <td class="align-middle"><?php echo $value['status']; ?></td>
                                        <td class="align-middle"><?php echo $value['date_time']; ?></td>
                                        <td class="align-middle">
                                            <!--<a href="" class="text-success"><i class="material-icons">edit</i></a> |-->
                                            <a href="create_course.php?trash=<?php echo $value['id']; ?>"
                                                class="text-danger"><i class="material-icons">delete</i></a>
                                        </td>
                                    </tr>
                                    <?php $n++;
                                } ?>

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