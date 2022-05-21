<!DOCTYPE html>
<html>
    <head>
        <title>Contact Us</title>
        <link rel="stylesheet" href="styles/contactUs.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <body> 
        <!--navigation Bar-->
        <div class="navcontainer">
                <img src="images/logo.png" alt="logo" width="auto" height="50px">
                <nav>
                    <ul>
                        <li><a href="index.php"><i class="fa-solid fa-house"></i> Home</a></li>
                        <li><a href="">Apps</a></li>
                        <li><a href="">Games</a></li>
                        <li><a href="contactUs.php">Contact us</a></li>
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
                    <div>
                        <h2> Contact Us </h2>
                        <ul class="info"> 
                            <li>
                                <span><i class='fas fa-map-marker-alt' style='font-size:48px;color:red'></i></span>
                                <span>SLIIT Malabe Campus, New Kandy Road, Malabe.</span>
                            </li>
                            <li>
                                <span><i class="fa fa-envelope" style="font-size:48px;color:red"></i></span>
                                <span>appsyStore@gmail.lk</span>
                            </li>
                            <li>
                                <span><i class="fa fa-phone" style="font-size:48px;color:red"></i></span>
                                <span>0710125385</span>
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
                </div>
                <div class="conform"> 
                    <h2>Send a message</h2>
                    <div class="fbox"> 
                        <div class="inputbx"> 
                            <input type="text" name="" required>
                            <label>First Name</label>
                        </div>
                        <div class="inputbx">
                            <input type="text" name="" required>
                            <label>Last Name</label>
                        </div>
                        <div class="inputbx">
                            <input type="text" name="" required>
                            <label>Email</label>
                        </div>
                        <div class="inputbx">
                            <input type="text" name="" required>
                            <label>Mobile Number</label>
                        </div>
                        <div class="inputbx">
                            <textarea name="" required></textarea>
                            <span>Write your message here...</span>
                        </div>
                        <div class="inputbx">
                            <input type="submit" value="Send">
                        </div>
                    </div>
                </div>
            </div>
        </section>       
    </body>



</html>