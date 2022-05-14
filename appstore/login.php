<!DOCTYPE html>
<html>
    <head>
        
        <title>Login | AppsyStore</title>
        <link href="styles/form.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="form">
        <form action="loginform.php" method="POST">
            <a href="index.php"><img src="images/logo.png" alt="logo" class="logo" width="150px"></a>
            <h2 class="title">User | Login</h2>
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
        <div class="signUp">You don't have an account? <a href="signup.php">Sign up</a></div>
            </div>
        
    </body>
</html>

