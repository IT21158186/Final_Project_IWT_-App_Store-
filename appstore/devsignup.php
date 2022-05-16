<!DOCTYPE html>
<html>
    <head>
        <title>Developer Sign up | AppsyStore</title>
        <link rel="stylesheet" href="styles/form.css">
    </head>

    <body>
        <form action="devsignup.php" method="POST" class="form">
        <a href="index.php"><img src="images/logo.png" alt="logo" class="logo" width="150px"></a>
            <h2 class="title">Developer | Sign Up</h2>
            <?php if(isset($_GET['error'])){?>
                <p class="error"> <?php echo $_GET['error'];?></p>
            <?php } ?>
            <!--<label for="email">Email :</label>-->
            <input type="email" placeholder="sample@mail.com" class="field" name="email">
            
            <!--<label for="company Name">Company Name :</label>-->
            <input type="text" placeholder="Company/Studio Name" name="company_name" class="field">

            <!--<label for="about">About :</label>-->
            <textarea name="about" id="" cols="30" rows="5" class="field" placeholder="Tell us bit about you"></textarea>

            <!--<label for="phone">Mobile No :</label>-->
            <input type="phone" placeholder="Mobile No " name="phone" class="field" pattern="[0]{1}[0-9]{9}">

            <!--<label for="password">Password :</label>-->
            <input type="password" name="password" class="field" placeholder="Password">

            <!--<label for="password2">Re-Type Password : </label>-->
            <input type="password" name="password2" class="field" placeholder="Re-Type Password">

            <input type="submit" value="Sign Up" class="btn">
            <a href="login.php">Login ?</a><br>
            <a href="signup.php">Are you a User ?</a>
        </form>
    </body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"]=='POST'){
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
}
?>