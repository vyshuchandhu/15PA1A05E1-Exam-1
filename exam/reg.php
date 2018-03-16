<?php 
include "connect.php";
session_start();

if(isset($_POST['sub'])) {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        $qry = "INSERT INTO `register` ( `name`, `email`, `password`) VALUES ('$name', '$email', '$pass')";
        mysqli_query($conn,$qry) or die("Connection failed: " . mysqli_error());
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
            <title>USER FEEDBACK</title>
            <link rel="stylesheet" type="text/css" href="start.css">
    </head>   
    <body>
               <h1>Register</h1>
                <ul class="nav">
				<li><a href="home.php">Home</a></li>
				<li><a href="reg.php">Register</a></li>
				<li><a href="login.php">Login</a></li>
			</ul>
		<div class="main-content">
             <form class="form" method="post" action="">
                Name<input type="text" name="name"><br>
                Email<input type="text" name="email"><br>
                Password<input type="password" name="pass"><br>
                <input type="submit" name="sub" value="Register">
            </form>
            </div>
    </body>  
</html>
