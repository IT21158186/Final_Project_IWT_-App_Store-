<!DOCTYPE html>
<html>
    <head>
        
        <title>Admin | AppsyStore</title>
        <link href="../styles/adminform.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="form">
        <form action="index.php" method="POST">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo" width="150px"></a>
            <h2 class="title">Admin | Login</h2>
            <?php if(isset($_GET['error'])){?>
                    <p class='error'> <?php echo $_GET['error'];?></p>
            <?php } ?>
            <?php if(isset($_GET['error2'])){?>
                    <p class='error2'> <?php echo $_GET['error2'];?></p>
            <?php } ?>

        <input type="text" name="uname" placeholder="Email" class="field">
        <input type="password" name="password" placeholder="Password" class="field"> 

        <input type="submit" value="Sign in" class="btn">
        <a href="">Forgot Password?</a>
        </form>
            </div>
        
    </body>
</html>

<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    session_start();
    include "../config.php";

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
        header("Location: index.php?error= Username is required !");
        exit();
    }
    if(empty($pass)){
        header("Location: index.php?error= Password is required !");
        exit();
    }

    $sql = "SELECT * FROM administrator WHERE email ='$uname' AND password = '$pass'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);
        if($row['email']== $uname && $row['password'] == $pass){
            echo "Logged In !";
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['admin_name'] = $row['admin_name'];
            header("Location: admin.php");
            exit();
        }else{
            header("Location: index.php?error= Username or Password Invalid !");
            exit();
        }
    }else{
        header("Location: index.php?error= Username or Password Invalid !");
        exit();
    }
}

?>

