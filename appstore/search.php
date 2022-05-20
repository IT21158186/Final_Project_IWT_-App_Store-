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
                    <li><a href="index.php">Home</a></li>
                    <li><a href="app.php">Apps</a></li>
                    <li><a href="game.php">Games</a></li>
                    <li><a href="">Contact us</a></li>
                    <li><a href="aboutUs.php">About us</a></li>
                    <li>
                        <form action="search.php"><input type="search" placeholder="Search" class="search" name="search">
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
        <div class="container">
            <?php
                $query = "SELECT * FROM apps a, developer d  where a.developer_id = d.developer_id and (a.app_name LIKE '%$_GET[search]%' OR 
                a.description LIKE '%$_GET[search]%' OR d.company_name LIKE '%$_GET[search]%')";
                $result = mysqli_query($conn,$query);
                if(empty($result)){
                    echo '<script> alert("No Results !"); </script>';
                    echo '<h1>No Results</h1>';
                }else{
                    while($row = mysqli_fetch_array($result)){?>

                    <a href="download.php?action=add&id=<?php echo $row['app_id']?>" class="item">
                    <img src="images/<?php echo $row['app_image']?>" alt="appimage" width="100px">
                    <h4><?php echo $row['app_name'] ?></h4>
                    <h5><?php echo $row['company_name']?></h5>
                    </a>
           <?php } 
                }
            ?>
        </div>
        
        <footer>
            <h3>&copy MLB_07.01_06</h3>
            <h4>All Right Reserved</h4>
        </footer>
       
    </body>
</html>