<!DOCTYPE html>
<html>
    <head>
        <title>Contact Us</title>
        <link rel="stylesheet" href="styles/contactus_1.css">
        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
        <script src="https://kit.fontawesome.com/24b485c31a.js" crossorigin="anonymous"></script>
    </head>
    <body> 
        <!--navigation Bar-->
        <div class="navcontainer">
                <img src="images/logo.png" alt="logo" width="auto" height="50px">
                <nav>
                    <ul>
                        <li><a href="index.php"><i class="fa-solid fa-house"></i> Home</a></li>
                        <li><a href="app.php">Apps</a></li>
                        <li><a href="game.php">Games</a></li>
                        <li><a id="active" href="contactUs.php">Contact us</a></li>
                        <li><a href="aboutUs.php">About us</a></li>
                        <li>
                            <form action="search.php" method="GET"><input type="search" placeholder="Search" class="search" name="search">
                            <input type="submit" value="Search" class="searchbtn"></form>
                        </li>
                        <li>
                            <p>Hello,<?php 
                                if(isset($_SESSION['first_name']))
                                    echo $_SESSION['first_name'] ?>
                            </p>
                        </li>
                        <div class="login">
                        <?php
                            if(isset($_SESSION['first_name'])){
                                echo '<a href="logout.php" id="logout">Log out</a>';
                            }else
                                echo '<a href="login.php" id="logout">Log in</a>';
                        ?>
                        </div> 
                    </ul>  
                    
                </nav>
        </div>

        <br>
            
        <section>
            <!--Contact Info-->
            <div class="contact"> 
                <div class="conInfo"> 
                        <h2> Contact Us </h2>
                        <ul class="info"> 
                            <li>
                                <span><i class='fas fa-map-marker-alt'></i></span>
                                <span class="text">SLIIT Malabe, New Kandy Road</span>
                            </li>
                            <li>
                                <span><i class="fa fa-envelope"></i></span>
                                <span class="text">appsyStore@gmail.lk</span>
                            </li>
                            <li>
                                <span><i class="fa fa-phone"></i></span>
                                <span class="text">0710125385</span>
                            </li>
                        </ul> 
                        <ul class="socm">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                </div>
                <div class="conform">   
                    <form action="">
                            <h2>Send a message</h2>
                            <div class="inputbx"> 
                                <input type="text" name="" placeholder="First Name" class="field" required>
                            </div>
                            <div class="inputbx">
                                <input type="text" name="" placeholder="Last Name" class="field"  required>
                            </div>
                            <div class="inputbx">
                                <input type="text" name="" placeholder="Email" class="field" required>   
                            </div>
                            <div class="inputbx">
                                <input type="text" name="" placeholder="Mobile Number" class="field" required>
                            </div>
                            <div class="inputbx">
                                <textarea name="" required placeholder="Write your message here..." class="field"></textarea>
                            </div>
                                <input type="submit" value="Send" class="btn">
                            
                       
                    </form>
                    
                </div>
            </div>
        </section>    
        <footer>
            <h3>&copy MLB_07.01_06</h3>
            <h4>All Right Reserved</h4>
        </footer>   
    </body>



</html>