<?php
session_start();
include "config.php";

if(isset($_POST['uname'] )&& isset($_POST['password'])){

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
$uname = validate($_POST['uname']);
$pass = validate($_POST['password']);

if(empty($uname)){
    header("Location: login.php?error= Username is required !");
    exit();
}
if(empty($pass)){
    header("Location: login.php?error= Password is required !");
    exit();
}

$sql = "SELECT * FROM reg_users WHERE email ='$uname' AND password = '$pass'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_assoc($result);
    if($row['email']== $uname && $row['password'] == $pass){
        echo "Logged In !";
        $_SESSION['email'] = $row['email'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['first_name'] = $row['first_name'];
        header("Location: index.php");
        exit();
    }else{
        header("Location: login.php?error= Username or Password Invalid !");
        exit();
        }
}else{
    header("Location: login.php?error= Username or Password Invalid !");
    exit();
    header("Location: login.php");
    exit();
}
?>