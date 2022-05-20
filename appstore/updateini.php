<?php
    include "config.php";
    session_start();
    $app_dir = "uploads/";
    $image_dir = "images/";
    
    $uploadimg =1;
    $uploadfile = 1;
    $error = '';

    $appname = $_POST['app_name'];
    $message= "The app ".$appname . " has";
    $desc = $_POST['description'];
    $dev_id = $_SESSION['developer_id'];
    $cat = $_POST['cat_id'];
    $appid =$_POST['app_id'];

    $sql = "SELECT * FROM apps WHERE app_id= '$appid'";
    $result = mysqli_fetch_assoc(mysqli_query($conn,$sql));
    $existfile = $result['file_path'];
    $exist_img_file = $result['app_image'];

    if (empty($_FILES["app"]["name"]) && empty($_FILES["app_image"]["name"])){
        

        $sqlupdate ="UPDATE apps
                    SET app_name = '$appname',description = '$desc',cat_id = '$cat'
                    WHERE app_id = '$appid' ;";

        if(mysqli_query($conn,$sqlupdate)){
            $message = $message . "Successfully Updated !";
            header("Location: dashboard.php?error=$message");
        }else{
            $message = $message . "Not Updated !";
            header("Location: update.php?error=$message&id= $appid");
        }
        

    }else{
        //Check image file
        if(isset($_FILES["app_image"]["name"])){
            $target_file2= $image_dir . basename($_FILES["app_image"]["name"]);
            /*$imageType = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));*/

            if ($_FILES["app_image"]["size"] > 500000) {
                    $imgerror = "Sorry, your image is too large.";
                    $uploadimg = 0;
            }else if (file_exists($target_file2)) {// Check if file already exists
                    $imgerror = "Sorry, your file is already exists.";
                    $uploadimg = 0;
            }
            
        }
        //check app file
        if(isset($_FILES["app"]["name"])){
            $target_file= $app_dir . basename($_FILES["app"]["name"]);
            /*$imageType = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));*/

            if ($_FILES["app"]["size"] > 500000) {
                    $error = "Sorry, your image is too large.";
                    $uploadfile = 0;
            }else if (file_exists($target_file)) {// Check if file already exists
                    $error = "Sorry, your file is already exists.";
                    $uploadfile = 0;
            }
            
        }

        // Check if $uploadfile is set to 0 by an error
        if ($uploadimg == 0 || $uploadfile == 0) {
            $error = $error . " file is not uploaded!";
            $imgerror = $imgerror. " file is not uploaded!";
            header("Location: update.php?error= $error&imgerror= $imgerror&id= $appid");
            exit();
        }else{
             // if everything is ok, try to upload file
                if(move_uploaded_file($_FILES["app_image"]["tmp_name"], $target_file2)){
        
                    if(move_uploaded_file($_FILES["app"]["tmp_name"], $target_file)){

                        $filename = htmlspecialchars( basename( $_FILES["app"]["name"]));
                        unlink("$file_dir"."$existfile");
                    
                        $sqlupdate ="UPDATE apps
                                    SET file_path = '$filename'
                                    WHERE app_id = '$appid' ;";

                        mysqli_query($conn,$sqlupdate);
                    }else{
                        header("Location: update.php?error2= Sorry, there was an error updating your file.&id= $appid");
                        exit();

                    }
                    $imgname = htmlspecialchars( basename( $_FILES["app_image"]["name"]));
                    unlink("$image_dir"."$exist_img_file");
                
                    $sqlupdate ="UPDATE apps
                                SET app_image = '$imgname'
                                WHERE app_id = '$appid' ;";

                    mysqli_query($conn,$sqlupdate);

                }else{
                    header("Location: update.php?error2= Sorry, there was an error updating your file.&id= $appid");
                    exit();
                }

                $sqlupdate ="UPDATE apps
                        SET app_name = '$appname',description = '$desc',cat_id = '$cat'
                        WHERE app_id = '$appid' ;";

                if(mysqli_query($conn,$sqlupdate)){
                    $message = $message . "Successfully Updated !";
                    header("Location: dashboard.php?error=$message");
                }else{
                    $message = $message . "Not Updated !";
                    header("Location: update.php?error=$message&id= $appid");
                }


            //File Uploading
            

        }

    }

?>