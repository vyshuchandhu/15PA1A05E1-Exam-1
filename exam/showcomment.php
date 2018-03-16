<?php
include "connect.php";
session_start();
$comment = $_GET['comment'];
$pid = $_GET['pid'];
$qry = "INSERT INTO `comments` ( `comment`, `productid`) VALUES ('$comment', '$pid');";
mysqli_query($conn,$qry) or die("error running query: ".$qry);
echo "<div>";
echo $comment;
echo "</div>";
?>

