<?php
include '../config.php';
session_start();
$appid = $_GET['id'];
$query = "SELECT * FROM apps a, developer d, catergory c where a.app_id=$appid and d.developer_id = a.developer_id and c.cat_id = a.cat_id";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Home | AppsyStore</title>
        <link rel="stylesheet" href="../styles/download.css">
        <link rel="stylesheet" href="../styles/admindash.css">
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
                    <li><a href="admin.php"><i class="fa-solid fa-house"></i> Dashboard</a></li>
                    <li><a href="uploadapp.php">Upload App</a></li>
                    <li><a href="aboutusdev.php">About us</a></li>
                    
                    <li>
                        <p>Welcom Admin,<?php 
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
        <br/>
        
        <table class="downcontainer">
            <tr>
                <td rowspan="3" class="appimg"><img src="../images/<?php echo  $row['app_image'] ?>" alt="app image"></td>
                <td><h2 class="title"><?php echo $row['app_name'] ?></h2></td>
            </tr>
            <tr>
                <td class="h3"><h3>Company Name :<?php echo $row['company_name'] ?></h3></td>
            </tr>
            <tr>
                <td class="h3"><h3>Category :<?php echo $row['cat_name'] ?></h3></td>
            </tr>
            <tr>
                <td colspan="2"><a href="uploads/<?php echo $row['file_path']?>" class="downloadbtn">Download Now &darr;</a></td>
            </tr>
            
            <tr>
                <td colspan="2"><h4 class="desc"><?php echo $row['description']?></h4></td>
            </tr>
        </table>
        
        <footer>
            <h3>&copy MLB_07.01.06</h3>
            <h4>All Right Reserved</h4>
        </footer>
       
    </body>
</html>