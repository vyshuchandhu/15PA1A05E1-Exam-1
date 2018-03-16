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
				<li><a href="home.php">Home</a></li>
				<li><a href="reg.php">Register</a></li>
				<li><a href="login.php">Login</a></li>
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
                           $pid=$row['productid'];
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
             <h3>Add Comments</h3>
            <form method="post" id="frm">
				<textarea name="comment" id="comment"></textarea>
				<input type="button" value="Submit" onclick="showComments();">
			</form>
			<div id="comments" class="comments">
					<?php $qry1 = "SELECT * FROM `comments` where `productid` = '$pid';";
						$sql1 = mysqli_query($conn,$qry1) or die("connection failed");
						if(mysqli_num_rows($sql1)>0) {
							while($row1=mysqli_fetch_assoc($sql1)) {
								echo "<div class='comment'>";
								echo $row1['comment'];
								echo "</div>";
							}
						}
		    ?>
			</div>
			<script>
			function showComments() {
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("comments").innerHTML += this.responseText;
					}
				};
				var comment = document.getElementById("comment").value;
				document.getElementById("frm").reset();
				xhttp.open("GET","showcomment.php?pid=<?php echo $pid;?>&comment="+comment, true);
				xhttp.send();
			}
			</script>
            </div>
    </body>  
</html>
