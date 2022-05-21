<?php
session_start();
include "config.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Upload App | AppsyStore</title>
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
                    <li ><a href="uploadapp.php" id="active">Upload App</a></li>
                    <li><a href="aboutusdev.php">About us</a></li>
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
               
                        <form action="uploadapp.php" method="POST" enctype="multipart/form-data" class="form">
                            <center><h2>Upload Application</h2></center>
                        <?php if(isset($_GET['error2'])){?>
                            <p class='error2'> <?php echo $_GET['error2'];?></p>
                        <?php } ?>
                            <input type="text" placeholder="App Name" class="field" name="app_name" maxlength = "10" required>
                            
                            <input type="hidden" name="developer_id">

                            <textarea name="description" cols="30" rows="7" class="field" placeholder="Description"></textarea>
                            
                           Select app image to upload (use a 1:1 png file):<?php if(isset($_GET['imgerror'])){?>
                            <p class='error'> <?php echo $_GET['imgerror'];?></p>
                            <?php } ?>
                            <input type="file" name="app_image" class="field">
                            
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

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $app_dir = "uploads/";
    $image_dir = "images/";
    $target_file = $app_dir . basename($_FILES["app"]["name"]);
    $target_file2= $image_dir . basename($_FILES["app_image"]["name"]);
    $uploadimg =1;
    $uploadfile = 1;
    $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $imageType = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
    $error = '';
    // Check file size
    if ($_FILES["app"]["size"] > 1000000) {
        $error = "Sorry, your file is too large.";
        $uploadfile = 0;
    }else if (file_exists($target_file)) {// Check if file already exists
        $error = "Sorry, your file is already exists.";
        $uploadfile= 0;
    }
    if ($_FILES["app_image"]["size"] > 500000) {
        $imgerror = "Sorry, your image is too large.";
        $uploadimg = 0;
    }else if (file_exists($target_file2)) {// Check if file already exists
        $imgerror = "Sorry, your file is already exists.";
        $uploadimg = 0;
    }


    // Check if $uploadfile is set to 0 by an error
    if ($uploadfile == 0 || $uploadimg == 0) {
        $error = $error . " file is not uploaded!";
        $imgerror = $imgerror. " file is not uploaded!";
        header("Location: uploadapp.php?error= $error&imgerror= $imgerror ");
        exit();

    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["app"]["tmp_name"], $target_file) && move_uploaded_file($_FILES["app_image"]["tmp_name"], $target_file2)) {
        $message= "The app ". htmlspecialchars( basename( $_FILES["app"]["name"])). " has been uploaded Successfully!";
        $appname = $_POST['app_name'];
        $desc = $_POST['description'];
        $dev_id = $_SESSION['developer_id'];
        $cat = $_POST['cat_id'];
        $filename = htmlspecialchars( basename( $_FILES["app"]["name"]));
        $imgname = htmlspecialchars( basename( $_FILES["app_image"]["name"]));
        $sql = "INSERT INTO apps(app_name,description,developer_id,cat_id,file_path,app_image) VALUES('$appname','$desc','$dev_id','$cat','$filename','$imgname')";
        mysqli_query($conn,$sql);
        header("Location: uploadapp.php?error2=$message");
            exit();
        
        } else {
            header("Location: uploadapp.php?error= Sorry, there was an error uploading your file.");
    }
  }

}
    
?>
