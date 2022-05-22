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
        if(!isset($_SESSION['appid'])){
             $_SESSION['appid'] = $_GET['appid'];
        } 
        ?>
        <div class="confirm_msg">
            <div class="msgcontainer">
                <p>Are You Sure to Permenently Delete this app ?</p>
                        <div class="btncontainer">
                            <center>
                                <a href="remove.php?state=1" class="smallbtn">Yes</a>
                                <a href="admin.php" class="smallbtn">No</a>
                            </center>
                            
                        </div>
            </div>
                        
                        

        </div>
        <?php 
        if(isset($_GET['state'])){
            $appid = $_SESSION['appid'];
            $_SESSION['appid'] = null;
            $sql1 = "SELECT * FROM apps WHERE app_id = $appid";
            $result = mysqli_fetch_assoc(mysqli_query($conn,$sql1));
           
            $sql = "DELETE FROM review WHERE app_id = $appid";
            $sql2 = "DELETE FROM apps WHERE app_id = $appid "; 
            // PHP program to delete a file named gfg.txt
            // using unlink() function
            $filepath = $result['file_path'];
            $imgpath = $result['app_image'];
            $image_pointer = "../images/$imgpath";
            $file_pointer = "../uploads/$filepath";
            
            // Use unlink() function to delete a file
            if (unlink($file_pointer)) {
                unlink($image_pointer);
                mysqli_query($conn,$sql);
                mysqli_query($conn,$sql2);
                header("Location: admin.php?error=$file_pointer has been deleted");
            }
            else {
               header("Location: admin.php?error=$file_pointer cannot be deleted due to an error");
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

