<?php
session_start();
include "config.php";
$sql = 'SELECT * FROM developer';
$result = mysqli_query($conn,$sql);

if(isset($_POST['email'] )&& isset($_POST['password'])&& isset($_POST['password2'])&& isset($_POST['company_name'])&& isset($_POST['about'])&& isset($_POST['phone'])){

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
$email = validate($_POST['email']); //validating inserted data to avoid attacking
$pass = validate($_POST['password']);
$pass = validate($_POST['password2']);
$mobile = validate($_POST['phone']);
$company_name = validate($_POST['company_name']);
$about = validate($_POST['about']);

if(empty($_POST['email']) || empty($_POST['password'])|| empty($_POST['password2'])|| empty($_POST['phone'])|| empty($_POST['company_name'])|| empty($_POST['about'])){
    header("Location: devsignup.php?error= One or More Field is missing !");
    exit();
}else if($_POST['password']!= $_POST['password2']){
    header("Location: devsignup.php?error= Password Miss match !");
    exit();
}else{
    while($row = mysqli_fetch_array($result)){ //check for the email is a taken one or not
       if ($row['email'] == $email){
        header("Location: devsignup.php?error= Email is already taken !");
        exit();
       } 
    }
    $sql = "INSERT INTO developer (company_name,about,email,password,mobile) VALUES ('$company_name','$about','$email','$pass','$mobile')";
    
    if(mysqli_query($conn,$sql)){
        echo "<script> alert('Submitted'); </script>";
        header("Location: login.php?error2= Sign in Successfull !");
        exit();
        header("Location: login.php");
        exit();
    }
    
}
?>