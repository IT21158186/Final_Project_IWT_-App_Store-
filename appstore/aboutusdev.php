<?php 
session_start();
include 'config.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title> About page </title>
		<link rel="stylesheet" href="styles/dashstyle.css">
		<link rel="stylesheet" href="styles/aboutUs.css">
		<script src="https://kit.fontawesome.com/24b485c31a.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
		<!--Google Fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500;700&display=swap" rel="stylesheet"> 
	</head>
	
	<body>

        <div class="navcontainer">
            <img src="images/logo.png" alt="logo" width="auto" height="50px">
            <nav>
				<ul>
                    <li><a href="dashboard.php"><i class="fa-solid fa-house"></i> Dashboard</a></li>
                    <li><a href="uploadapp.php">Upload App</a></li>
                    <li ><a href="aboutusdev.php" id="active">About us</a></li>
                    
                    <li>
                        <p>Hello,<?php 
                            if(isset($_SESSION['company_name']))
                                echo $_SESSION['company_name']; ?>
                        </p>
                    </li>
                    
                    <div class="login">
                    <?php
                        if(isset($_SESSION['company_name'])){
                            echo '<a href="logout.php" id="logout">Log out</a>';
                        }
                    ?>
                    </div> 
                </ul>    
                
            </nav>
            
        </div>





		<h1>Our Team</h1>
		<div class="slideshow-container">
			<div class="team">
				<!--person 1-->
				<div class="card">
					<div class="content">
						<div class="image">
							<img src="images/p1.jpg" alt="person1">
						</div>
						<div class="contentBx">
							<h4>Sandali Vimansa</h4>
							<h5>Director</h5>
						</div>
						<div class="scm">
							<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
				
				<!--person 2-->
				<div class="card">
					<div class="content">
						<div class="image">
							<img src="images/p2.jpg" alt="person1">
						</div>
						<div class="contentBx">
							<h4>Dewmi Herath</h4>
							<h5>Director</h5>
						</div>
						<div class="scm">
							<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			
			<!--person 3-->
				<div class="card">
					<div class="content">
						<div class="image">
							<img src="images/p3.jpg" alt="person1">
						</div>
						<div class="contentBx">
							<h4>Deneth Pinsara</h4>
							<h5>Director General</h5>
						</div>
						<div class="scm">
							<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
				
				<!--person 4-->
				<div class="card">
					<div class="content">
						<div class="image">
							<img src="images/p4.jpg" alt="person1">
						</div>
						<div class="contentBx">
							<h4>Nimsara Mahagedara</h4>
							<h5>Director</h5>
						</div>
						<div class="scm">
							<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
				
				<!--person 5-->
				<div class="card">
					<div class="content">
						<div class="image">
							<img src="images/p5.jpg" alt="person1">
						</div>
						<div class="contentBx">
							<h4>Uresh Pinidiya</h4>
							<h5>Director</h5>
						</div>
						<div class="scm">
							<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			</div>
			
			<br>
			
			<div class="history">
				<h1>History</h1>
				<p> </p>		
			</div>
		</div>

		    
        <footer>
            <h3>&copy MLB_07.01_06</h3>
            <h4>All Right Reserved</h4>
        </footer>
		
		
	</body>
</html>