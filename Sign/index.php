<?php
session_start();
include("../Connection/index.php");
$error = false;
if(isset($_POST['submit'])){
$email_login =htmlentities(mysqli_real_escape_string($connect,$_POST['username'])); 
$password_login=htmlentities(mysqli_real_escape_string($connect,$_POST['password']));
    
$select_user = "select * from users where username='$email_login' AND password ='$password_login'";
$query = mysqli_query($connect,$select_user);
$check_user =mysqli_num_rows($query);
    if($check_user == 1){
		
		$_SESSION['username']=$email_login;
        $get_user = "select * from users where username='$email_login'";
         $run_user =mysqli_query($connect,$get_user);
         $row = mysqli_fetch_array($run_user);
         $user_name = $row['username'];
         $admin=$row['admin'];
         $_SESSION['admin']=$admin;
        header("location:../index.php");
    }else{
        $error ="Please Check email and password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Honda</title>
    <!--ICon-->
    <link rel="icon" type="image/x-icon" href="../assets/img/ICON.png" />
    <!-- Font Awesome icons -->
    <script src="https://kit.fontawesome.com/1a27162852.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Css File-->
    <link href="../wwwroot/Css/styles.css" rel="stylesheet" />
    <style>
.login-form {
    width: 440px;
    margin: 50px auto;
  	font-size: 15px;
      
}
.login-form form {
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
    border-radius: 15px;
}
.login-form h2 {
    margin: 0 0 15px;
}
.form-control, .btn {
    min-height: 38px;
    border-radius: 2px;
    margin-bottom: 15px;
}
.btn {        
    font-size: 15px;
    font-weight: bold;
}
</style>
</head>
<body id="page-top">
<!-- Masthead-->
<header class="masthead">
    <div class="container">
        <div class="masthead-heading text-uppercase">H o n d a</div> 
        
    </div>
    </div>
    <div class="login-form  mt-4 p-4">
        
                    <form action="" method="post" class="row g-3">
                        <h4 style="color: black;">Welcome Back</h4>
                        <?php echo"<p style=\"color: black;\">$error</p>"; ?>
                        <div class="col-12">
                            <label style="color: black;"> Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="col-12">
                            <label style="color: black;">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-dark float-end" name="submit">Login</button>
                        </div>
                    </form>
                </div>
</header>
<script src="../wwwroot/js/scripts.js"></script>
<script src="../wwwroot/js/jquery.min.js"></script>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>