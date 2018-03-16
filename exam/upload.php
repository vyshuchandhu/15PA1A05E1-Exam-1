<?php 
include "connect.php";
session_start();

if(isset($_POST['sub'])) {
        $name=$_POST['name'];
        $des=$_POST['des'];
        $userid=$_SESSION['userid'];
        $uploadOk = 0;
        if(isset($_FILES['image'])){
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $tmp = explode('.', $file_name);
        $file_ext=strtolower(end($tmp));
        $expensions= array("jpeg","jpg","png");
        if(in_array($file_ext,$expensions)=== false){
           array_push($errors, "please choose a JPEG or PNG file.");
        }
        if(empty($errors)==true) {
           move_uploaded_file($file_tmp,"images/".$file_name) or die("error moving file");
           $uploadOk = 1;
        }else{
           print_r($errors);
        }
     
    if ($uploadOk == 1) {
        $qry = "INSERT INTO `upload` (`name`, `userid`, `descripition`, `image`) VALUES ('$name', '$userid', '$des', '$file_name')";
        mysqli_query($conn,$qry)  or die("error: ".$qry);
        header('location:home.php');
    }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
            <title>USER FEEDBACK</title>
            <link rel="stylesheet" type="text/css" href="start.css">
    </head>   
    <body>
                <h1>Upload</h1>
               <ul class="nav">
				<li><a href="home1.php">Home</a></li>
				<li><a href="upload.php">upload</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
			<div class="main-content">
             <form class="form" method="post" action="" enctype="multipart/form-data">
                Name<input type="text" name="name"><br>
                Description<input type="textarea" name="des"><br>
                image<input type="file" name="image"><br><br>
                <input type="submit" name="sub" value="Click to Submit">
            </form>
           </div>
    </body>  
</html>

