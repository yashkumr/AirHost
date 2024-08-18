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
            <div class="m-t-30"><img class="zmdi-hc-spin" src="assets/images/logo.svg" width="48" height="48"
                    alt="Compass"></div>
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
        <div class="container-fluid">
            <div class="card widget_2">
                <ul class="row clearfix list-unstyled m-b-0">
                    <li class="col-lg-3 col-md-6 col-sm-12">
                        <div class="body">
                            <div class="row">
                                <div class="col-7">
                                    <h5 class="m-t-0">Registers Users</h5>
                                    <p class="text-small">Total Registers User Count</p>
                                </div>
                                <div class="col-5 text-right">
                                    <h2 class="">
                                        <?php
                                        $users = $Uni->get("users");
                                        if ($Uni->count > 0)
                                            echo '<b class="text-danger">' . $Uni->count . '</b>';
                                        ?></h2> <small>of 1000</small>
                                </div>
                                <div class="col-12">
                                    <div class="progress m-t-20">
                                        <div class="progress-bar l-amber" role="progressbar" aria-valuenow="45"
                                            aria-valuemin="0" aria-valuemax="100"
                                            style="width: <?php echo $Uni->count / 10; ?>%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="col-lg-3 col-md-6 col-sm-12">
                        <div class="body">
                            <div class="row">
                                <div class="col-7">
                                    <h5 class="m-t-0">Onlie Course</h5>
                                    <p class="text-small">Differt Courser Running Count</p>
                                </div>
                                <div class="col-5 text-right">
                                    <h2 class="">
                                        <?php
                                        $course = $Uni->get("category");
                                        if ($Uni->count > 0)
                                            echo '<b class="text-danger">' . $Uni->count . '</b>';
                                        ?>
                                    </h2>
                                    <small class="info">of 100</small>
                                </div>
                                <div class="col-12">
                                    <div class="progress m-t-20">
                                        <div class="progress-bar l-blue" role="progressbar" aria-valuenow="38"
                                            aria-valuemin="0" aria-valuemax="100"
                                            style="width: <?php echo $Uni->count / 10; ?>%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="col-lg-3 col-md-6 col-sm-12">
                        <div class="body">
                            <div class="row">
                                <div class="col-7">
                                    <h5 class="m-t-0">Course Video </h5>
                                    <p class="text-small">Count of Total Video Created Yet</p>
                                </div>
                                <div class="col-5 text-right">
                                    <h2 class="">
                                        <?php
                                        $course = $Uni->get("course_video");
                                        if ($Uni->count > 0)
                                            echo '<b class="text-danger">' . $Uni->count . '</b>';
                                        ?>

                                    </h2>
                                    <small class="info">of 100</small>
                                </div>
                                <div class="col-12">
                                    <div class="progress m-t-20">
                                        <div class="progress-bar l-parpl" role="progressbar" aria-valuenow="39"
                                            aria-valuemin="0" aria-valuemax="100"
                                            style="width: <?php echo $Uni->count / 10; ?>%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="col-lg-3 col-md-6 col-sm-12">
                        <div class="body">
                            <div class="row">
                                <div class="col-7">
                                    <h5 class="m-t-0">Sell Course</h5>
                                    <p class="text-small">Total Sell Course Yet!</p>
                                </div>
                                <div class="col-5 text-right">
                                    <h2 class="">
                                        <?php
                                        $course = $Uni->get("subscription");
                                        if ($Uni->count > 0)
                                            echo '<b class="text-danger">' . $Uni->count . '</b>';
                                        ?>

                                    </h2>
                                    <small class="info">of 100</small>
                                </div>
                                <div class="col-12">
                                    <div class="progress m-t-20">
                                        <div class="progress-bar l-turquoise" role="progressbar" aria-valuenow="89"
                                            aria-valuemin="0" aria-valuemax="100"
                                            style="width: <?php echo $Uni->count / 10; ?>%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Sales</strong> Report</h2>
                        </div>
                        <div class="body">
                            <div class="row text-center">
                                <div class="col-sm-3 col-6">
                                    <h4 class="m-t-0">
                                        <?php
                                        $d  = date('Y-m-d');
                                        $Uni->where("DATE(date_time)", $d);
                                        $course = $Uni->get("subscription");
                                        echo $Uni->count;
                                        ?>
                                        <i class="zmdi zmdi-trending-up col-green"></i>
                                    </h4>
                                    <p class="text-muted"> Today's Sales</p>
                                </div>
                                <!-- <div class="col-sm-3 col-6">
                                <h4 class="m-t-0">$ 907 <i class="zmdi zmdi-trending-down col-red"></i></h4>
                                <p class="text-muted">This Week's Sales</p>
                            </div> -->
                                <div class="col-sm-3 col-6">
                                    <h4 class="m-t-0">
                                        <?php
                                        $d  = date('m');
                                        $Uni->where("MONTH(date_time)", $d);
                                        $course = $Uni->get("subscription");
                                        echo $Uni->count;
                                        ?>
                                        <i class="zmdi zmdi-trending-up col-green"></i>
                                    </h4>
                                    <p class="text-muted">This Month's Sales</p>
                                </div>
                                <div class="col-sm-3 col-6">
                                    <h4 class="m-t-0">
                                        <?php
                                        $d  = date('Y');
                                        $Uni->where("YEAR(date_time)", $d);
                                        $course = $Uni->get("subscription");
                                        echo $Uni->count;
                                        ?>
                                        <i class="zmdi zmdi-trending-up col-green"></i>
                                    </h4>
                                    <p class="text-muted">This Year's Sales</p>
                                </div>
                            </div>
                            <div id="area_chart" class="graph"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 
        <div class="row clearfix">
            <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                <div class="card tasks_report">
                    <div class="body">
                        <input type="text" class="knob dial1" data-width="90" data-height="90" data-thickness="0.1" data-fgColor="#666" readonly>
                        <h6 class="m-t-20">Satisfaction Rate</h6>
                        <p class="displayblock m-b-0">10% Average <i class="zmdi zmdi-trending-up"></i></p>                        
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                <div class="card tasks_report">
                    <div class="body">
                        <input type="text" class="knob dial2" value="26" data-width="90" data-height="90" data-thickness="0.1" data-fgColor="#7b69ec" readonly>
                        <h6 class="m-t-20">Project Panding</h6>
                        <p class="displayblock m-b-0">13% Average <i class="zmdi zmdi-trending-down"></i></p>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                <div class="card tasks_report">
                    <div class="body">
                        <input type="text" class="knob dial3" value="76" data-width="90" data-height="90" data-thickness="0.1" data-fgColor="#f9bd53" readonly>
                        <h6 class="m-t-20">Productivity Goal</h6>
                        <p class="displayblock m-b-0">75% Average <i class="zmdi zmdi-trending-up"></i></p>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                <div class="card tasks_report">
                    <div class="body">
                        <input type="text" class="knob dial4" value="88" data-width="90" data-height="90" data-thickness="0.1" data-fgColor="#00adef" readonly>
                        <h6 class="m-t-20">Total Revenue</h6>
                        <p class="displayblock m-b-0">54% Average <i class="zmdi zmdi-trending-up"></i></p>
                        
                    </div>
                </div>
            </div>            
        </div> -->

            <div class="row clearfix">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="card project_list">
                        <div class="header">
                            <h2><strong>Resent Sell </strong> Course</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width:50px;">Users</th>
                                            <th></th>
                                            <th>Course</th>
                                            <th class="hidden-md-down">Team</th>
                                            <th class="hidden-md-down" width="150px">Status</th>
                                            <th>Poplerty</th>
                                            <th>Due Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // fetch course name
                                        $course_fetch = $Uni->get("category");
                                        foreach ($course_fetch as $course_k => $course_v) {
                                            $course_name[$course_v['id']] = $course_v['name'];
                                        }

                                        $Uni->orderBy("id", "desc");
                                        $cat = $Uni->get("subscription", 5);
                                        foreach ($cat as $key => $value) {
                                        ?>
                                        <tr>
                                            <td>
                                                <img class="rounded avatar"
                                                    src="assets/images/xs/avatar<?php echo rand(1, 10); ?>.jpg" alt="">
                                            </td>
                                            <td>
                                                <?php
                                                    $Uni->where("id", $value['id']);
                                                    $users_fetch = $Uni->getOne("users");
                                                    ?>
                                                <a class="single-user-name"
                                                    href="#"><?php echo $users_fetch['user_name']; ?></a><br>
                                                <small><?php echo $users_fetch['email']; ?></small>

                                            </td>
                                            <td>
                                                <strong><?php echo $course_name[$value['course_id']]; ?></strong><br>
                                                <small><?php echo $value['payment'] . ' Rs'; ?></small>
                                            </td>
                                            <td class="hidden-md-down">
                                                <ul class="list-unstyled team-info margin-0">
                                                    <li>
                                                        <img src="assets/images/xs/avatar2.jpg" alt="Avatar">
                                                    </li>
                                                    <li>
                                                        <img src="assets/images/xs/avatar3.jpg" alt="Avatar">
                                                    </li>
                                                    <li>
                                                        <img src="assets/images/xs/avatar4.jpg" alt="Avatar">
                                                    </li>
                                                    <li>
                                                        <img src="assets/images/xs/avatar6.jpg" alt="Avatar">
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="hidden-md-down">
                                                <div class="progress">
                                                    <div class="progress-bar l-amber" role="progressbar"
                                                        aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: <?php echo rand(10, 100); ?>%;"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge badge-info">Medium</span></td>
                                            <td><?php echo $value['date_time']; ?></td>
                                        </tr>
                                        <?php } ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">

                <div class="col-lg-12 col-md-12">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <ul class="row profile_state list-unstyled">
                                    <li class="col-lg-3 col-md-3 col-6">
                                        <div class="body">
                                            <i class="zmdi zmdi-eye col-amber"></i>
                                            <h4><?php echo rand(10, 20); ?></h4>
                                            <span>Last One Minute View</span>
                                        </div>
                                    </li>
                                    <li class="col-lg-3 col-md-3 col-6">
                                        <div class="body">
                                            <i class="zmdi zmdi-thumb-up col-blue"></i>
                                            <h4><?php echo rand(10, 100); ?></h4>
                                            <span>Interst Users</span>
                                        </div>
                                    </li>
                                    <li class="col-lg-3 col-md-3 col-6">
                                        <div class="body">
                                            <i class="zmdi zmdi-comment-text col-red"></i>
                                            <h4><?php echo rand(1, 50); ?></h4>
                                            <span>Visit View</span>
                                        </div>
                                    </li>
                                    <li class="col-lg-3 col-md-3 col-6">
                                        <div class="body">
                                            <i class="zmdi zmdi-account text-success"></i>
                                            <h4><?php echo rand(1, 20); ?></h4>
                                            <span>Online Users</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
<?php include('layout/js.php'); ?>