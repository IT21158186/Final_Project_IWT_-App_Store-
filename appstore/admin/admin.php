<?php
//Copy of developer dashboard
session_start();
include "../config.php";
if($_SESSION['email']){
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Upload App | AppsyStore</title>
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
                    <li ><a href="admin.php" id="active"><i class="fa-solid fa-house" ></i> Dashboard</a></li>
                    <li><a href="manage_app.php">Manage Apps</a></li>
                    <li><a href="manage_user.php">Manage Users</a></li>
                    <li><a href="manage_dev.php">Manage Developers</a></li>
                    
                    <li>
                        <p>Welcome, Admin <?php 
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
        <?php 
            if(isset($_GET['error'])){
        ?>
            <p class="error">
                <?php 
                    echo $_GET['error'];
                }
            ?>
            </p>
        
        <!--Dashboard implementation is here-->
        <div class="boxcontainer">
            <div class="box">
                <?php 
                    $sql = "SELECT * FROM apps";
                    $result =mysqli_num_rows (mysqli_query($conn,$sql));
                    echo "<h3>Apps</h3>";
                    echo "<hr>";
                    echo "<h4>$result</h4>"
                ?>     
        </div>
        <div class="box" >
                 <?php 
                    $sql = "SELECT * FROM reg_users";
                    $result =mysqli_num_rows (mysqli_query($conn,$sql));
                    echo "<h3>Users</h3>";
                    echo "<hr>";
                    echo "<h4>$result</h4>"
                ?> 
        </div>
        <div class="box">
                <?php 
                    $sql = "SELECT * FROM developer";
                    $result =mysqli_num_rows (mysqli_query($conn,$sql));
                    echo "<h3>developer</h3>";
                    echo "<hr>";
                    echo "<h4>$result</h4>"
                ?> 
        </div>
        </div>
        
            
        <footer>
            <h3>&copy MLB_07.01_06</h3>
            <h4>All Right Reserved</h4>
        </footer>
       
    </body>
</html>


<?php }else{
    header("Location:index.php?error= Please Login !");
} ?>

