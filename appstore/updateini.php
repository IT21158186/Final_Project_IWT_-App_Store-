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
        header("Location: update.php?error= $error&imgerror= $imgerror ");
        exit();

    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["app"]["tmp_name"], $target_file) && move_uploaded_file($_FILES["app_image"]["tmp_name"], $target_file2)) {
        $message= "The app ".$appname . " has Successfully Updated!";
        $appname = $_POST['app_name'];
        $desc = $_POST['description'];
        $dev_id = $_SESSION['developer_id'];
        $cat = $_POST['cat_id'];
        $appid =$_POST['app_id'];
        if(isset( $_FILES["app"]["name"])){
            $filename = htmlspecialchars( basename( $_FILES["app"]["name"]));
        }
        if(isset($_FILES["app_image"]["name"])){
            $imgname = htmlspecialchars( basename( $_FILES["app_image"]["name"]));
        }
        
        $sqlupdate = "  UPDATE apps
                        SET app_name = '$appname',description = '$desc',cat_id = $cat
                        WHERE app_id = $appid ;";
       /* $sql = "INSERT INTO apps(app_name,description,developer_id,cat_id,file_path,app_image) VALUES('$appname','$desc','$dev_id','$cat','$filename','$imgname')";*/
        mysqli_query($conn,$sqlupdate);
        header("Location: dashboard.php?error=$message");
        exit();
        
        } else {
            header("Location: update.php?error2= Sorry, there was an error updating your file.");
    }
  }

}
?>