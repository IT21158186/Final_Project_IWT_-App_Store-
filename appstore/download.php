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
                    <li><a href="app.php">Apps</a></li>
                    <li><a href="game.php">Games</a></li>
                    <li><a href="">Contact us</a></li>
                    <li><a href="aboutUs.php">About us</a></li>
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
        
        <table class="downcontainer">
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
        <div class="reviewcontainer">
           <strong>Write a Review : </strong> 
            <form action="review.php" method="post">
                <textarea name="comment" id="commentarea" cols="10" rows="3" maxlength="100"></textarea>

                <input type="submit" value="Post" class="postbtn">
            </form>
        </div>
        <?php 
            $sql = "SELECT * FROM review WHERE app_id = $appid";
            $result = mysqli_query($conn,$sql);
            if($result){
                while($row = mysqli_fetch_array($result)){
        ?>
        <div class="commentscontainer">
             <div class="comments">
                <strong> <?php echo $row['email'] ?> </strong>
                <hr>
            <p><?php echo $row['comment'] ?></p>
            </div>
        </div>

        <?php }
                } ?>
       
        
        <footer>
            <h3>&copy MLB_07.01.06</h3>
            <h4>All Right Reserved</h4>
        </footer>
       
    </body>
</html>