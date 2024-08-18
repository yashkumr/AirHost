<?php include("includes/head.php") ?>


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
                $name = $_POST['name'];
                $email = ($_POST['email']);
                $password = $_POST['password'];
                $course = ($_POST['course']);

                // Prepare and execute the query
                $sql = "INSERT INTO course_users( user_name, email, pass , category_name)  VALUES
                ('$name', '$email', '$password', '$course')";
                $result = $conn->query($sql);

                if ($result) {
                    // User found
                    header("Location: login.php");
                    echo "Signup  successful!";
                    
                } else {
                    // User not found
                    
                    echo "Invalid username or password.";
                }

                // Close the connection
                $conn->close();
            }
            ?>


<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section background_bg overlay_bg_50 page_title_light" data-img-src="assets/images/login_bg.jpg">
    <div class="container">
        <!-- STRART CONTAINER -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title">
                    <h1>Register</h1>
                </div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Register</li>
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
            <div class="col-md-6">
                <div class="padding_eight_all login_wrap">
                    <div class="heading_s1">
                        <h4>Create your new account</h4>
                    </div>
                    <form method="post">
                        <div class="form-group">
                            <input type="text" required="" class="form-control" name="name"
                                placeholder="Enter Your Name">
                        </div>
                        <div class="form-group">
                            <input type="text" required="" class="form-control" name="email"
                                placeholder="Enter Your Email">
                        </div>
                        <div class="form-group">
                            <input class="form-control" required="" type="password" name="password"
                                placeholder="Password">
                        </div>
                        <!-- <div class="form-group">
                            <input class="form-control" required="" type="password" name="password"
                                placeholder="Confirm Password">
                        </div> -->
                        <div class="form-group">
                            <select class="form-control" name="course" id="">
                                <option value="Select course">Select Your course</option>
                                <option value="">Hotel Management</option>
                                <option value="">Cabin Crew</option>
                                <option value="">Diploma in Air Hostess</option>
                                <option value="">Diploma in Airport Management</option>
                                <option value="">Diploma in Hotel Management</option>
                            </select>
                        </div>
                        <div class="login_footer form-group">
                            <div class="chek-form">
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox"
                                        id="exampleCheckbox2" value="">
                                    <label class="form-check-label" for="exampleCheckbox2"><span>I agree to terms &amp;
                                            Policy.</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default btn-block" name="register">Register</button>
                        </div>
                    </form>
                    <div class="different_login">
                        <span> or</span>
                    </div>
                    <ul class="btn-login list_none text-center">
                        <li><a href="#" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>
                        <li><a href="#" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>
                    </ul>
                    <div class="form-note text-center">Already have an account? <a href="login.php">Login Here!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION LOGIN -->

<!-- ----------------footer------------------- -->
<?php include("includes/footer.php") ?>