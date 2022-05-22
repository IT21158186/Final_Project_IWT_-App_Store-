<?php 
session_start();
include 'config.php';


if(isset($_SESSION['email'])){
        $rate = $_POST['phprating'];
        $email = $_SESSION['email'];
        $appid = $_POST['app_id'];
        $comment = $_POST['comment'];
    
            $sql = "INSERT INTO review VALUES('$appid','$email','$rate','$comment')";
            $sql2="UPDATE rating SET rate = rate + $rate  where app_id = $appid";
            $sql3="INSERT INTO rating VALUES('$appid', '$rate')";
            $sql4="SELECT* FROM rating WHERE app_id = '$appid'";

            
            $result = mysqli_fetch_assoc(mysqli_query($conn,$sql4));
            

            if(mysqli_query($conn,$sql)){
                if(!empty($result) ) {
                    if(mysqli_query($conn,$sql2)){
                        header('Location: ' . $_SERVER['HTTP_REFERER'].'&error=Review and the Rating added Successfully!');

                    }else{
                        header('Location: ' . $_SERVER['HTTP_REFERER'].'&error=Rating Error !');
                    }
                }else{
                    mysqli_query($conn,$sql3);
                    header ('Location: ' . $_SERVER['HTTP_REFERER'].'&error= Review places successfully !');
                }


          }else{header ('Location: ' . $_SERVER['HTTP_REFERER'].'&error=21st line error !');

          }   
        
}else{
    header("Location: login.php?error= Please Login First !");
    exit();
}

?>