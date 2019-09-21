<?php

include ("includes/header.php");

?>

<div class="row">
	<div class="col-md-12 clearfix">
		<h1>Gallery</h1>
		
		<?php 

		

		// get author ID for all those who have submitted photos but only the unique ones
		$result = mysqli_query($con, "SELECT DISTINCT `author_id` FROM `mugallery`") or die(mysqli_error($con));

			while($row = mysqli_fetch_array($result)){
					$author_id = $row['author_id'];
				
					echo "\n<div class=userblocks>";
					// get the username of that uploader and echo ( somehow replaceing * with user_name fixed it?)
					$result3 = mysqli_query($con, "SELECT `user_name` FROM `users` where `user_id`='$author_id'") or die(mysqli_error($con));
					while($row = mysqli_fetch_array($result3)){
					$username = $row['user_name'];
					
					echo $username;
					echo " "; 
					echo "<a href=\"authgallery.php?aud=$author_id\">More by this poster</a>";
					
					
					}
					echo "\n</div>";
					
					// get all other values  FOR that author id and print
					$result2 = mysqli_query($con, "SELECT * FROM `mugallery` where `author_id`='$author_id'") or die(mysqli_error($con));

					while($row = mysqli_fetch_array($result2)){
					$filename =  $row['filename'];
					$title =  $row['title'];
					$id =  $row['id'];

				
					echo "\n<div class=\"thumb\">";
					echo "\n\t<a href=\"display.php?id=$id\"><img src=\"images/thumbs-square/$filename\" class=\"img-thumbnail\"></a>";
					echo "<div class=\"thumb-title\">$title</div>";
					echo "\n</div>";
					
					}
					echo "\n<br>";	
					echo "\n<br>";
					echo "\n<br>";
					echo "\n<br>";
					echo "\n<br>";
					echo "\n<br>";
					echo "\n<br>";
					echo "\n<br>";
					echo "\n<br>";
					echo "\n<br>";
					
		}



		 ?>


		 <br style="clear:both">
	</div>
	
</div>

<?php

include ("includes/footer.php");
?>

