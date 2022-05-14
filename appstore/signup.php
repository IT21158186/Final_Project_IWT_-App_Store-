<!DOCTYPE html>
<html>
    <head>
        <title>Sign up | AppsyStore</title>
        <link rel="stylesheet" href="styles/form.css">
    </head>

    <body>
        <form action="sign.php" method="POST" class="form">
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