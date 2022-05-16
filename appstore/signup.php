<!DOCTYPE html>
<html>
    <head>
        <title>Sign up | AppsyStore</title>
        <link rel="stylesheet" href="styles/form.css">
    </head>

    <body>
        <form action="signup.php" method="POST" class="form">
        <a href="index.php"><img src="images/logo.png" alt="logo" class="logo" width="150px"></a>
            <h2 class="title">User | Sign Up</h2>
            <?php if(isset($_GET['error'])){?>
                <p class="error"> <?php echo $_GET['error'];?></p>
            <?php } ?>
            <!--<label for="email">Email :</label>-->
            <input type="email" placeholder="Email" class="field" name="email">
            
            <!--<label for="first_name">First Name :</label>-->
            <input type="text" placeholder="First Name" name="first_name" class="field">

            <!--<label for="last_name">Last Name :</label>-->
            <input type="text" placeholder="Last Name" name="last_name" class="field">

            <!--<label for="phone">Mobile No :</label>-->
            <input type="tel" placeholder="Mobile Number Pattern :0712345678" name="phone" class="field" pattern="[0]{1}[0-9]{9}">

            <!--<label for="password">Password :</label>-->
            <input type="password" name="password" class="field" placeholder="Password">

            <!--<label for="password2">Re-Type Password : </label>-->
            <input type="password" name="password2" class="field" placeholder="Re-Type Password">

            <input type="submit" value="Sign Up" class="btn">
            <a href="login.php">Login ?</a><br>
            <a href="devsignup.php">Are you a Developer ?</a>
        </form>
    </body>
</html>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    session_start();
include "config.php";
$sql = 'SELECT * FROM reg_users';
$result = mysqli_query($conn,$sql);

if(isset($_POST['email'] )&& isset($_POST['password'])&& isset($_POST['password2'])&& isset($_POST['first_name'])&& isset($_POST['last_name'])&& isset($_POST['phone'])){

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
$first_name = validate($_POST['first_name']);
$last_name = validate($_POST['last_name']);

if(empty($_POST['email']) || empty($_POST['password'])|| empty($_POST['password2'])|| empty($_POST['phone'])|| empty($_POST['first_name'])|| empty($_POST['last_name'])){
    header("Location: signup.php?error= One or More Field is missing !");
    exit();
}else if($_POST['password']!= $_POST['password2']){
    header("Location: signup.php?error= Password Miss match !");
    exit();
}else{
    while($row = mysqli_fetch_array($result)){ //check for the email is a taken one or not
       if ($row['email'] == $email){
        header("Location: signup.php?error= Email is already taken !");
        exit();
       } 
    }
    $sql = "INSERT INTO reg_users VALUES ('$email','$first_name','$last_name','$pass','$mobile')";
    
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