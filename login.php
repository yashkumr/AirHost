<?php include("includes/head.php") ?>
<?php include('./Class/Config.php'); ?>




<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section background_bg overlay_bg_50 page_title_light" data-img-src="assets/images/login_bg.jpg">
    <div class="container">
        <!-- STRART CONTAINER -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title">
                    <h1>Login</h1>
                </div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Login</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- STAT SECTION LOGIN -->
<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <?php
            // Database configuration
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "Bhrit_Avi_DB";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            // Check if form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {



                // Get the form data
                $user = $_POST['user_email'];
                $pass = ($_POST['user_pass']); // Encrypt the password using md5

                // Prepare and execute the query
                $sql = "SELECT * FROM course_users WHERE email='$user' AND pass='$pass'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // User found
                    header("Location: index.php");
                    echo "Login successful!";
                    
                } else {
                    // User not found
                    
                    echo "Invalid username or password.";
                }

                // Close the connection
                $conn->close();
            }
            ?>

            <div class="container m-5">
                <h2>Please Login</h2>


                <form action="" method="post" class="container">

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="user_email" placeholder="Enter email">
                    </div>

                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" name="user_pass" placeholder="Enter password">
                    </div>

                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- END SECTION LOGIN -->

<!-- ----------------footer------------------- -->
<?php include("includes/footer.php") ?>