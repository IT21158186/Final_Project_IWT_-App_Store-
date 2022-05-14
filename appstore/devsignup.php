<!DOCTYPE html>
<html>
    <head>
        <title>Developer Sign up | AppsyStore</title>
        <link rel="stylesheet" href="styles/form.css">
    </head>

    <body>
        <form action="devsign.php" method="POST" class="form">
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