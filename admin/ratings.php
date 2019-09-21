<?php

include("../includes/mysql_connect.php");



$Rating= $_POST["Rating"];
$Picture_id= $_POST["picture_id"];
$Rater_id= $_POST["rater_id"];

mysqli_query($con,"INSERT INTO ratings (picture_id, rater_id, rating) VALUES ('$Picture_id','$Rater_id', '$Rating')") or die(mysqli_error($con));
		
$previous = $_SERVER['HTTP_REFERER'];
header("Location:$previous");

?>
