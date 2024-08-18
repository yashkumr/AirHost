<?php include('../Class/Config.php');
$Uni->login_check_admin(); ?>
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
                    <h2>Query Admission
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="body">
                            <h5>Query Admission List</h5>
                            <table class="table table-sm table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr .No</th>
                                        <th>Student Name</th>
                                        <th>Email</th>
                                        <th>Mobile 1</th>
                                        <th>Mobile 2</th>
                                        <!-- <th>Course</th> -->
                                        <th>Dob</th>
                                        <th>Gender</th>
                                        <th>aadhar</th>
                                        <th>fname</th>
                                        <th>qualification</th>
                                        <th>Course Name</th>
                                        <th>state</th>
                                        <th>house</th>
                                        <th>village</th>
                                        <th>ward</th>
                                        <th>tehsil</th>
                                        <th>city</th>
                                        <th>pin</th>
                                        <th>landmark</th>
                                        <th>Doc</th>
                                        <th>date time</th>
                                    </tr>
                                </thead>
                                <?php
                                $Uni->orderBy("id", "desc");
                                $ad_data = $Uni->get("admission");

                                // echo '<pre>';
                                // print_r($ad_data);
                                // echo '</pre>';

                                // fetch course name
                                $course_fetch = $Uni->get("category");

                                foreach ($course_fetch as $course_k => $course_v) {
                                    $course_name[$course_v['id']] = $course_v['name'];
                                }


                                $n = 1;
                                foreach ($ad_data as $key => $value) {
                                ?>

                                    <tbody>
                                        <tr>
                                            <td class="align-middle"><?php echo $n; ?></td>
                                            <td class="align-middle"><?php echo $value['customername']; ?></td>
                                            <td class="align-middle"><?php echo $value['email']; ?></td>

                                            <td class="align-middle"><?php echo $value['contactno']; ?></td>
                                            <td class="align-middle"><?php $value['phone']; ?></td>

                                            <!-- <td class="align-middle"><?php echo $value['price'] . ' Rs'; ?></td>                                     -->
                                            <td class="align-middle"><?php echo $value['dob']; ?></td>
                                            <td class="align-middle"><?php echo $value['gender']; ?></td>
                                            <td class="align-middle"><?php echo $value['aadhar']; ?></td>
                                            <td class="align-middle"><?php echo $value['fname']; ?></td>
                                            <td class="align-middle"><?php echo $value['fname']; ?></td>
                                            <td class="align-middle"><?php echo $course_name[$value['course']]; ?></td>
                                            <td class="align-middle"><?php echo $value['state']; ?></td>
                                            <td class="align-middle"><?php echo $value['house']; ?></td>
                                            <td class="align-middle"><?php echo $value['village']; ?></td>
                                            <td class="align-middle"><?php echo $value['ward']; ?></td>
                                            <td class="align-middle"><?php echo $value['tehsil']; ?></td>
                                            <td class="align-middle"><?php echo $value['city']; ?></td>
                                            <td class="align-middle"><?php echo $value['pin']; ?></td>
                                            <td class="align-middle"><?php echo $value['landmark']; ?></td>
                                            <td class="align-middle">

                                                <?php if (!empty($value['doc1'])) { ?>
                                                    <a href="../<?php echo $value['doc1']; ?>" download> Doc 1 </a>
                                                <?php } ?>

                                                <?php if (!empty($value['doc2'])) { ?>
                                                    <a href="../<?php echo $value['doc2']; ?>" download> Doc 2 </a>
                                                <?php } ?>

                                                <?php if (!empty($value['doc3'])) { ?>
                                                    <a href="../<?php echo $value['doc3']; ?>" download> Doc 3 </a>
                                                <?php } ?>

                                            </td>

                                            <td class="align-middle"><?php echo $value['date_time']; ?></td>
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