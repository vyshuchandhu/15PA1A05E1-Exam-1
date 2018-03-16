<?php 
include "connect.php";
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
            <title>USER FEEDBACK</title>
            <link rel="stylesheet" type="text/css" href="start.css">
    </head>   
    <body>
            <h1>MY Products</h1>
			<ul class="nav">
				<li><a href="home1.php">Home</a></li>
				<li><a href="upload.php">upload</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
			<div class="main-content">
			<h2>Products</h2>
             <?php
                $qry = "select * from upload";
                    $sql = mysqli_query($conn,$qry) or die("error: ".$qry);
                    if(mysqli_num_rows($sql)>0) { 
                        while($row=mysqli_fetch_assoc($sql)) {
                           $imagepath = "images/".$row['image'];
                           $name = $row['name'];
                           $description =  $row['descripition'];
                           echo "<li>";
                           echo "<img src='$imagepath'>";
                           echo "<h3>$name</h3>";
                           echo "Description:<p>$description</p>";
                           echo "</li>";
                        } 
                    } else { 
                        echo "<li>No uploads</li>";
                    }
             ?>
             <input type="textarea" name="comments">
             <input type="submit" name="sub" value="Add comments">
            </div>
    </body>  
</html>
