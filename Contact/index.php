<?php
session_start();
include("../Connection/index.php");
if(isset($_POST['submit'])){
    $F_name=$_POST['first_name'];
    $L_name=$_POST['last_name'];
    $email=$_POST['email'];
    $description=$_POST['description'];
    
	$query = "INSERT INTO problems (first_name,last_name,email,description) VALUES('$F_name','$L_name','$email','$description')";
	$result = mysqli_query($connect,$query);
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
</head>
<body id="page-top">
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="/honda">Honda</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <?php
                    if(isset($_SESSION['username'])){
                        $user=$_SESSION['username'];
                        $user_q= "SELECT * FROM users where username='$user'";
                        $run =mysqli_query($connect,$user_q);
                        $row=mysqli_fetch_array($run);
                        $user_name=$row['username'];
                        if($row['admin'] == 1){
                            echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"../inbox/index.php\">Inbox</a></li>";
                            echo "<li class=\"nav-item\"><a class=\"nav-link\"><span style='color:#35A6F4;'>Welcome Admin : </span>". $user_name."</a></li>";
                            echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"../sign/logout.php\">Logout</a></li>";
                        }else{
                            echo "<li class=\"nav-item\"><a class=\"nav-link\" ><span style='color:#35A6F4;'>Welcome : </span>". $user_name."</a></li>";
                            echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"../sign/logout.php\">Logout</a></li>";
                        }
                        
                        }else{ echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"../Sign/index.php\">Login</a></li>";}
                        ?>

            </ul>
        </div>
    </div>
</nav>
<!-- Masthead-->
<header class="masthead">
    <div class="container">
	<div class="row">
		<div class="col-md-3">
			<div class="contact-info">
				<img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image"/>
				<h2>Contact Us</h2>
				<h4>We would love to hear from you !</h4>
			</div>
		</div>
		<div class="col-md-9">
			<div class="contact-form">
                <form action="" method="post">
				<div class="form-group">
				  <label class="control-label col-sm-2" for="fname">First Name:</label>
				  <div class="col-sm-10">          
					<input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="first_name" required>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="lname">Last Name:</label>
				  <div class="col-sm-10">          
					<input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="last_name"required>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="email">Email:</label>
				  <div class="col-sm-10">
					<input type="email" class="form-control" id="email" placeholder="Enter email" name="email">required
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="comment">Comment:</label>
				  <div class="col-sm-10">
					<textarea class="form-control" rows="5" id="comment" name="description" required></textarea>
				  </div>
				</div>
				<div class="form-group">        
				  <div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default" name="submit" >Submit</button>
				  </div>
				</div>
			</div>
            </form>
		</div>
</div>
    </div>
    </div>
    
</header> 

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../wwwroot/js/scripts.js"></script>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>