<?php
include 'config.php';
session_start()
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Home | AppsyStore</title>
        <link rel="stylesheet" href="styles/style.css">
        <script src="https://kit.fontawesome.com/24b485c31a.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="navcontainer">
            <img src="images/logo.png" alt="logo" width="auto" height="50px">
            <nav>
                <ul>
                    <li><a href="index.php"><i class="fa-solid fa-house"></i> Home</a></li>
                    <li><a href="app.php" id="active">Apps</a></li>
                    <li><a href="game.php">Games</a></li>
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
        <br/>
        <h3>Popular Apps :</h3>
        <div class="container">
            <?php
                $query = "SELECT * FROM apps a, developer d, rating r where d.developer_id = a.developer_id and r.app_id = a.app_id and  (cat_id = 100 or cat_id = 300 or cat_id = 400 or cat_id = 500) ORDER BY(r.rate) DESC";
                $result = mysqli_query($conn,$query);
                $count = 0;
                while($row = mysqli_fetch_array($result)){
                    if($count >= 11){
                        break;
                    }
            ?>
            <a href="download.php?action=add&id=<?php echo $row['app_id']?>" class="item">
                <img src="images/<?php echo $row['app_image']?>" alt="appimage" width="100px">
                <h4><?php echo $row['app_name'] ?></h4>
                <h5><?php echo $row['company_name']?></h5>
                </a>

        <?php $count++; } ?>
           
        </div>
        <h3>Related Apps :</h3>
        <div class="container">
            <?php
                $query = "SELECT * FROM apps a, developer d where d.developer_id = a.developer_id and cat_id = 100  ORDER BY RAND()";
                $result = mysqli_query($conn,$query);
                $count = 0;
                while($row = mysqli_fetch_array($result)){
                    if($count >= 22){
                        break;
                    }?>
            
            <a href="download.php?action=add&id=<?php echo $row['app_id']?>" class="item">
                <img src="images/<?php echo $row['app_image']?>" alt="appimage" width="100px">
                <h4><?php echo $row['app_name'] ?></h4>
                <h5><?php echo $row['company_name']?></h5>
                </a>

        <?php $count++;} ?>
           
        </div>

        <h3>Commercial Apps :</h3>
        <div class="container">
            <?php
                $query = "SELECT * FROM apps a, developer d where d.developer_id = a.developer_id and cat_id = 300 ORDER BY RAND()";
                $result = mysqli_query($conn,$query);
                $count = 0;
                while($row = mysqli_fetch_array($result)){
                    if($count >= 22){
                        break;
                    }?>
            
            <a href="download.php?action=add&id=<?php echo $row['app_id']?>" class="item">
                <img src="images/<?php echo $row['app_image']?>" alt="appimage" width="100px">
                <h4><?php echo $row['app_name'] ?></h4>
                <h5><?php echo $row['company_name']?></h5>
                </a>

        <?php $count++;} ?>
           
        
        </div>
        <h3>Educational Apps :</h3>
        <div class="container">
            <?php
                $query = "SELECT * FROM apps a, developer d where d.developer_id = a.developer_id and cat_id = 400 ORDER BY RAND()";
                $result = mysqli_query($conn,$query);
                $count = 0;
                while($row = mysqli_fetch_array($result)){
                    if($count >= 22){
                        break;
                    }?>
            
            <a href="download.php?action=add&id=<?php echo $row['app_id']?>" class="item">
                <img src="images/<?php echo $row['app_image']?>" alt="appimage" width="100px">
                <h4><?php echo $row['app_name'] ?></h4>
                <h5><?php echo $row['company_name']?></h5>
                </a>

        <?php $count++;} ?>
           
        </div>

        <h3>Media Apps :</h3>
        <div class="container">
            <?php
                $query = "SELECT * FROM apps a, developer d where d.developer_id = a.developer_id and cat_id = 500 ORDER BY RAND()";
                $result = mysqli_query($conn,$query);
                $count = 0;
                while($row = mysqli_fetch_array($result)){
                    if($count >= 22){
                        break;
                    }?>
            
            <a href="download.php?action=add&id=<?php echo $row['app_id']?>" class="item">
                <img src="images/<?php echo $row['app_image']?>" alt="appimage" width="100px">
                <h4><?php echo $row['app_name'] ?></h4>
                <h5><?php echo $row['company_name']?></h5>
                </a>

        <?php $count++;} ?>
           
        </div>

        <footer>
            <h3>&copy MLB_07.01_06</h3>
            <h4>All Right Reserved</h4>
        </footer>
       
    </body>
    
</html>