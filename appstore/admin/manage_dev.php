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
                    <li ><a href="admin.php" ><i class="fa-solid fa-house" ></i> Dashboard</a></li>
                    <li><a href="manage_app.php">Manage Apps</a></li>
                    <li><a href="manage_user.php" >Manage Users</a></li>
                    <li><a href="manage_dev.php" id="active">Manage Developers</a></li>
                    
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
        <table class="dashboardform">
        <caption>Manage Developers :</caption> 
        <thead>
            <tr>
                <td colspan="4"><center><b>Applications</b></center></td>
            </tr>
            <tr>
                <th>Email</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM developer";
            $result = mysqli_query($conn,$sql);
            if(!empty($result)){
            while($row = mysqli_fetch_array($result)){
            ?>

            <tr>
                <td><?php echo $row['email']?></td>
                
                <td><?php echo $row['company_name'] ?></td>
                <td><?php echo $row['mobile'] ?></td><!-- Add here the rating code-->
                <td><div class="smallbtncontainer"><a href="remove_dev.php?developer_id=<?php echo $row['developer_id'] ?>" class="smallbtn" value="">Remove</a>
                <a href="view.php?id=<?php echo $email ?>" class="smallbtn" value="">View</a></div></td>
            </tr>

            <?php 
            }
                } ?>
        </tbody>
        </table>
            
        <footer>
            <h3>&copy MLB_07.01_06</h3>
            <h4>All Right Reserved</h4>
        </footer>
       
    </body>
</html>


<?php }else{
    header("Location:devlogin.php?error= Please Login !");
} ?>

