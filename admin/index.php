<?php include('../Class/Config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
if( isset($_POST['login']) )
{
        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';

        $Uni->where("admin_email", $_POST['admin_email']);
        $Uni->where("admin_pass", $_POST['admin_pass']);
      
        $user = $Uni->getOne("admin");

        if( $Uni->count > 0 )
        {
            echo $Uni->redirect('dashboard.php',2);
            $msg_success = 'Login Plz Wait..';
            $_SESSION['SESS_USER_ADMIN'] = '1989';      

        }
        else
        {
            $msg_danger = 'Invalid Login ...';
        }    
}
?>

    <div class="container m-5">
        <h2>Admin Login</h2>

        <?php include('layout/Error_msg.php'); ?>
        <form action="" method="post">

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="admin_email" placeholder="Enter email">
            </div>

            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" name="admin_pass" placeholder="Enter password">
            </div>

            <button type="submit" class="btn btn-primary" name="login">Login</button>
        </form>

    </div>

</body>

</html>