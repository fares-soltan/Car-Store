 <!-- Navigation-->
 <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="/honda">Honda</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#team">Team</a></li>
                <li class="nav-item"><a class="nav-link" href="../honda/Contact/index.php">Contact</a></li>
                    <?php
                    if(isset($_SESSION['username'])){
                        $user=$_SESSION['username'];
                        $user_q= "SELECT * FROM users where username='$user'";
                        $run =mysqli_query($connect,$user_q);
                        $row=mysqli_fetch_array($run);
                        $user_name=$row['username'];
                        if($row['admin'] == 1){
                            echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"../honda/inbox/index.php\">Inbox</a></li>";
                            echo "<li class=\"nav-item\"><a class=\"nav-link\"><span style='color:#35A6F4;'>Welcome Admin : </span>". $user_name."</a></li>";
                            echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"../honda/sign/logout.php\">Logout</a></li>";
                        }else{
                            echo "<li class=\"nav-item\"><a class=\"nav-link\" ><span style='color:#35A6F4;'>Welcome : </span>". $user_name."</a></li>";
                            echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"../honda/sign/logout.php\">Logout</a></li>";
                        }
                        
                        }else{ echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"../honda/Sign/index.php\">Login</a></li>";}
                        ?>

            </ul>
        </div>
    </div>
</nav>