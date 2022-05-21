<?php 
session_start();
include 'config.php';


if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    $appid = $_POST['app_id'];
    $comment = $_POST['comment'];
    $sql = "INSERT INTO review VALUES('$appid','$email','4.7','$comment')";
    if(mysqli_query($conn,$sql)){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}else{
    header("Location: login.php?error= Please Login First !");
    exit();
}

?>