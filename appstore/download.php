<?php
include 'config.php';
session_start();
$appid = $_GET['id'];
$query = "SELECT * FROM apps a, developer d, catergory c where a.app_id=$appid and d.developer_id = a.developer_id and c.cat_id = a.cat_id";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Home | AppsyStore</title>
        <link rel="stylesheet" href="styles/download.css">
        <link rel="stylesheet" href="styles/rating_style.css">
        <link rel="stylesheet" href="styles/style.css">
        <script src="https://kit.fontawesome.com/24b485c31a.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="navcontainer">
            <img src="images/logo.png" alt="logo" width="auto" height="50px">
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="app.php">Apps</a></li>
                    <li><a href="game.php">Games</a></li>
                    <li><a href="contactUs.php">Contact us</a></li>
                    <li><a href="aboutUs.php">About us</a></li>
                    <li>
                        <form action="search.php" method="GET"><input type="search" placeholder="Search" class="search" name="search">
                        <input type="submit" value="Search" class="searchbtn"></form>
                    </li>
                    <li><p>Hello,
                        <?php 
                        if(isset($_SESSION['first_name']))
                                echo $_SESSION['first_name'] ?></p></li>
                   <div class="login">
                      <?php
                    if(isset($_SESSION['first_name'])){
                        echo '<a href="logout.php" id="logout">Log out</a>';
                    }else
                        echo '<a href="login.php" id="logout">Log in</a>';
                    ?> 
                   </div>
                   
                    
                </ul>    
            </nav>
            
        </div>
        <?php if(isset($_GET['error'])){?>
                    <p id='error'> <?php echo $_GET['error'];?></p>
            <?php } ?>
        <br/>
        
        <table class="downcontainer">
            <tr>
                <td rowspan="3" class="appimg"><img src="images/<?php echo  $row['app_image'] ?>" alt="app image"></td>
                <td><h2 class="title"><?php echo $row['app_name'] ?></h2></td>
            </tr>
            <tr>
                <td class="h3"><h3>Company Name :<?php echo $row['company_name'] ?></h3></td>
            </tr>
            <tr>
                <td class="h3"><h3>Category :<?php echo $row['cat_name'] ?></h3></td>
            </tr>
            <tr>
                <td colspan="2"><a href="<?php /*Can download app if only logged in*/
                                    if(isset($_SESSION['email'])){ echo "uploads/".$row['file_path'];
                                                        }else{echo "login.php?error= Please login first !";}?>" class="downloadbtn">Download Now &darr;</a></td>
            </tr>
            
            <tr>
                <td colspan="2"><h4 class="desc"><?php echo $row['description']?></h4></td>
            </tr>
        </table>
        <div class="reviewcontainer">
            <form action="review.php" method="post">
                <p id="total_votes"></p>
                <div class="div">
                    <input type="hidden" id="php1_hidden" value="1">
                    <img src="images/star1.png" onmouseover="change(this.id);" id="php1" class="php">
                    <input type="hidden" id="php2_hidden" value="2">
                    <img src="images/star1.png" onmouseover="change(this.id);" id="php2" class="php">
                    <input type="hidden" id="php3_hidden" value="3">
                    <img src="images/star1.png" onmouseover="change(this.id);" id="php3" class="php">
                    <input type="hidden" id="php4_hidden" value="4">
                    <img src="images/star1.png" onmouseover="change(this.id);" id="php4" class="php">
                    <input type="hidden" id="php5_hidden" value="5">
                    <img src="images/star1.png" onmouseover="change(this.id);" id="php5" class="php">
                </div>

                <input type="hidden" name="phprating" id="phprating" value="0">
                <textarea name="comment" id="commentarea" cols="10" rows="3" maxlength="100"></textarea>
                <input type="hidden" value="<?php echo $_GET['id'] ?>" name="app_id">

                <input type="submit" value="Post" class="postbtn">
            </form>
        </div>
        <div class="commentscontainer">
        <?php 
            $sql = "SELECT * FROM review WHERE app_id = $appid";
            $result = mysqli_query($conn,$sql);
            if($result){
                while($row = mysqli_fetch_array($result)){
                    $i = 0;
        ?>
        
             <div class="comments">
                <strong> <?php echo $row['email'] ?> </strong>
                <?php while($i < $row['rating']){
                    echo '<span><img src="images/star2.png" width="15px" alt=""></span>';
                    $i++;
                }
                 
                 ?>
                <hr>
            <p><?php echo $row['comment'] ?></p>
            </div>
        

        <?php }
                } ?>
       </div>
        
        <footer>
            <h3>&copy MLB_07.01.06</h3>
            <h4>All Right Reserved</h4>
        </footer>

        <script type="text/javascript">
  
  function change(id)
  {
     var cname=document.getElementById(id).className;
     var ab=document.getElementById(id+"_hidden").value;
     document.getElementById(cname+"rating").value=ab;

     for(var i=ab;i>=1;i--)
     {
        document.getElementById(cname+i).src="images/star2.png";
     }
     var id=parseInt(ab)+1;
     for(var j=id;j<=5;j++)
     {
        document.getElementById(cname+j).src="images/star1.png";
     }
  }

</script>
       
    </body>
</html>