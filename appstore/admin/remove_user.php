<?php
session_start();
include "../config.php";
if($_SESSION['email']){
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Upload App | AppsyStore</title>
        <link rel="stylesheet" href="../styles/confirm_msg.css">
        <link rel="stylesheet" href="../styles/admindash.css">
        <link rel="stylesheet" href="../styles/uploadform.css">
        <script src="https://kit.fontawesome.com/24b485c31a.js" crossorigin="anonymous"></script>
        <!--Google Fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500;700&display=swap" rel="stylesheet"> 
    </head>
    <body>
        <div class="navcontainer">
            <img src="../images/logo.png" alt="logo" width="auto" height="50px">
            <nav>
                <ul>
                    <li ><a href="admin.php" ><i class="fa-solid fa-house" ></i> Dashboard</a></li>
                    <li><a href="manage_app.php">Manae Apps</a></li>
                    <li><a href="manage_user.php" id="active">Manage Users</a></li>
                    <li><a href="manage_dev.php">Manage Developers</a></li>
                    
                    <li>
                        <p>Hello,<?php 
                            if(isset($_SESSION['admin_name']))
                                echo $_SESSION['admin_name']; ?>
                        </p>
                    </li>
                    
                    <div class="login">
                    <?php
                        if(isset($_SESSION['admin_name'])){
                            echo '<a href="../logout.php" id="logout">Log out</a>';
                        }
                    ?>
                    </div> 
                </ul>  
                
            </nav>
            
        </div>
        <!--Confirm message is here-->
        <?php
        if(!isset($_SESSION['target_email'])){
             $_SESSION['target_email'] = $_GET['email'];
        } 
        ?>
        <div class="confirm_msg">
            <div class="msgcontainer">
                <p>Are You Sure to Permenently Delete this app ?</p>
                        <div class="btncontainer">
                            <center>
                                <a href="remove_user.php?state=1" class="smallbtn">Yes</a>
                                <a href="admin.php" class="smallbtn">No</a>
                            </center>
                            
                        </div>
            </div>
                        
                        

        </div>
        <?php 
        if(isset($_GET['state'])){
            $target_email = $_SESSION['target_email'];
            $_SESSION['target_email'] = null;

            $sql = "DELETE FROM review WHERE email = '$target_email'";
            $sql2 = "DELETE FROM reg_users WHERE email = '$target_email' "; 
        
            if(mysqli_query($conn,$sql)){
                if(mysqli_query($conn,$sql2)){
                    header("Location: manage_user.php?error=User Removed Successfully !");
                    exit();
                }
                header("Location: manage_user.php?error=User Remove ERROR !");
                exit();
            }else{
                header("Location: manage_user.php?error=Removing Reviews ERROR !");
                exit();
            }
        }
        ?>
        
        
        
        <footer>
            <h3>&copy MLB_07.01_06</h3>
            <h4>All Right Reserved</h4>
        </footer>
       
    </body>
</html>


<?php }else{
    header("Location:devlogin.php?error= Please Login !");
} ?>

