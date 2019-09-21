<?php 

	
	include("../includes/mysql_connect.php");



	$pageid = $_GET['id'];

	if(!is_numeric($pageid)){
		header("Location: edit.php");
	}

	// GRAB FILENAME OF IMAGE
	$result = mysqli_query($con, "SELECT * FROM mugallery WHERE id = '$pageid'") or die(mysqli_error($con));

	while($row = mysqli_fetch_array($result)){
		$filename = $row['filename'];
		
		
	}
	// DELETE ALL COPIES OF THE IMAGE
	$originalsFolder = "../images/originals/"; 
	$thumbsFolder = "../images/thumbs/";
	$thumbsSquareFolder = "../images/thumbs-square/";
	$thumbsSquareSmallFolder = "../images/thumbs-square-small/";
	$displayFolder = "../images/display/";

	unlink($originalsFolder . $filename );
	unlink($thumbsFolder . $filename );
	unlink($thumbsSquareFolder . $filename );
	unlink($thumbsSquareSmallFolder . $filename );
	unlink($displayFolder . $filename );
	//DELETE RECORD FROM DB
	mysqli_query($con, "DELETE FROM mugallery WHERE id = '$pageid'") or die(mysqli_error($con));

	// GO BACK TO EDIT
	header("Location: edit.php");
 ?>