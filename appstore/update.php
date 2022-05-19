<?php
session_start();
include "config.php";
if($_SESSION['developer_id']|| $_SESSION['developer_id'] == 0){
$appid = $_GET['id'];
$sql = "SELECT * FROM apps WHERE app_id = $appid";
$result = mysqli_fetch_assoc(mysqli_query($conn,$sql));


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update App | AppsyStore</title>
        <link rel="stylesheet" href="styles/dashstyle.css">
        <link rel="stylesheet" href="styles/uploadform.css">
        <script src="https://kit.fontawesome.com/24b485c31a.js" crossorigin="anonymous"></script>
        <!--Google Fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500;700&display=swap" rel="stylesheet"> 
    </head>
    <body>
    <div class="navcontainer">
            <img src="images/logo.png" alt="logo" width="auto" height="50px">
            <nav>
                <ul>
                    <li><a href="dashboard.php"><i class="fa-solid fa-house"></i> Dashboard</a></li>
                    <li><a href="uploadapp.php">Upload App</a></li>
                    <li><a href="">About us</a></li>
                    <li>
                        <p>Hello,<?php 
                            if(isset($_SESSION['company_name']))
                                echo $_SESSION['company_name']; ?>
                        </p>
                    </li>
                    <div class="login">
                    <?php
                        if(isset($_SESSION['company_name'])){
                            echo '<a href="logout.php" id="logout">Log out</a>';
                        }
                    ?>
                    </div> 
                </ul>  
                
            </nav>
            
        </div>
           <div class="formcontainer">

                <form action="updateini.php" method="POST" enctype="multipart/form-data" class="form">
                    <center><h2>Update Application</h2></center>
                    <?php if(isset($_GET['error2'])){?>
                        <p class='error2'> <?php echo $_GET['error2'];?></p>
                    <?php } ?>

                    <input type="text" placeholder="App Name" class="field" name="app_name" maxlength = "10" value="<?php echo $result['app_name']?>" required>
                            
                    <input type="hidden" name="app_id" value="<?php echo $appid?>">

                    <textarea name="description" cols="30" rows="7" class="field" placeholder="Description"  ><?php echo $result['description']?></textarea>
                            
                    Select app image to upload (use a 1:1 png file):<?php if(isset($_GET['imgerror'])){?>
                    <p class='error'> <?php echo $_GET['imgerror'];?></p>
                    <?php } ?>

                    <input type="file" name="app_image" class="field" value="uploads/<?php echo $result['file_path']?>">
                            
                    Select Your App File:<?php if(isset($_GET['error'])){?>
                                                    <p class="error"> <?php echo $_GET['error'];?></p>
                                                <?php } ?>
                    <input type="file" name="app" class="field">

                    Select the category :
                    <?php
                        $sqlcat = 'SELECT * FROM catergory';
                        $result = mysqli_query($conn,$sqlcat); 
                        echo '<select class="select" name="cat_id">';
                        while($row = mysqli_fetch_array($result)){?>
                            <option value=<?php echo $row['cat_id']?>;><?php echo $row['cat_name'] ?></option>
        
                             <?php } ?>
                            <!--<input type="password" name="password" class="field" placeholder="Password">-->
                            <input type="submit" value="Upload" class="btn">
                            <a href="" >Cancel</a><br>
                        </form>
           </div>
        <footer>
            <h3>&copy MLB_07.01_06</h3>
            <h4>All Right Reserved</h4>
        </footer>
       
    </body>
</html>


<?php }else{
    header("Location:devlogin.php?error= Please Login !");
} ?>




