<?php
include 'config.php';
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
        <link rel="stylesheet" href="styles/download.css">
        <link rel="stylesheet" href="styles/style.css">
        <script src="https://kit.fontawesome.com/24b485c31a.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="navcontainer">
            <img src="images/logo.png" alt="logo" width="auto" height="50px">
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="">Apps</a></li>
                    <li><a href="">Games</a></li>
                    <li><a href="">Contact us</a></li>
                    <li><a href="">About us</a></li>
                    <li>
                        <form action="search.php" method="GET"><input type="search" placeholder="Search" class="search" name="search">
                        <input type="submit" value="Search" class="searchbtn"></form>
                    </li>
                    <li><p>Hello,
                        <?php 
                        if(isset($_SESSION['first_name']))
                                echo $_SESSION['first_name'] ?></p></li>
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
        <br/>
        
        <table class="downcontainer" >
            <tr>
                <td rowspan="3" class="appimg"><img src="images/<?php echo  $row['app_image'] ?>" alt="app image"></td>
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