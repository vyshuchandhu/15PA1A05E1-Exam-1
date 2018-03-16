<?php 
include "connect.php";
session_start();

if(isset($_POST['sub'])) {
        $name=$_POST['name'];
        $pass=$_POST['pass'];
        $qry = "SELECT * FROM `register` where `name`='$name' AND  `password`='$email';";
        $sql=mysqli_query($conn,$qry) or die("Connection failed: " . mysqli_error());
        if(mysqli_num_rows($sql)>0) {
            while($row=mysqli_fetch_assoc($sql)>0){
            $_SESSION['userid']=$row['userid'];
        }
        }
        header('location:upload.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
            <title>USER FEEDBACK</title>
            <link rel="stylesheet" type="text/css" href="start.css">
    </head>   
    <body>
             <h1>Login</h1>
             <ul class="nav">
				<li><a href="home.php">Home</a></li>
				<li><a href="reg.php">Register</a></li>
				<li><a href="login.php">Login</a></li>
			</ul>
		<div class="main-content">
             <form class="form" method="post" action="">
                Name<input type="text" name="name"><br>
                Password<input type="password" name="pass"><br>
                <input type="submit" name="sub" value="Login">
            </form>
        </div>
    </body>  
</html>
