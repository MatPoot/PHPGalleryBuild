<?php
require_once('login/classes/Login.php');
include ("includes/mysql_connect.php");
$id = $_GET['id'];

if(!is_numeric($id)){// just a catchall if the ID is messed with
	header("Location:index.php");
}
$result = mysqli_query($con, "SELECT * FROM mugallery WHERE id = '$id'") or die(mysqli_error($con));
while($row = mysqli_fetch_array($result)){
	$pageTitle = $row['title'];
}



include ("includes/header.php");




?>
<div class="row">
	<div class="col-md-12">
	
		<?php 
	

		$result = mysqli_query($con, "SELECT * FROM mugallery WHERE id = '$id'") or die(mysqli_error($con));
		?>
		<?php while($row = mysqli_fetch_array($result)): ?>
				
				
				<h2 class="display-heading"><?php echo $row['title']; ?></h2>
				
				
				<div class="display-image-holder">
					<img src="images/display/<?php echo $row['filename'] ?>" class="display-image img-responsive">
					
				</div>
				<div class="display-info">

					<h3><?php echo $row['title']; ?></h3>

					<div class="text-primary display-description"><?php echo nl2br($row['description']) ?></div>
					
					<?php
					$uid = $row['author_id'];
						$result2 = mysqli_query($con, "SELECT user_name FROM users WHERE user_id = '$uid'") or die(mysqli_error($con));
						while($row = mysqli_fetch_array($result2)){
							echo "By : ";
							echo $row['user_name'];							
							}
					?>

				</div>
					
		<?php endwhile; ?>

							<?php 
							
								$login = new login();
							if ($login->isUserLoggedin() == true){
								$LoggedInAs = "Logged in as " . ($_SESSION['user_name']) . " - ID is " . ($_SESSION['user_id']);
								// just for testing
								$rater_id = $_SESSION['user_id'];
								$result_votedbefore = mysqli_query($con, "SELECT COUNT(*) AS mycount FROM ratings WHERE picture_id = '$id' AND rater_id='$rater_id'") or die(mysqli_error($con));
									
								while($row = mysqli_fetch_array($result_votedbefore)):
								   
								  $ratedcheck = $row['mycount'];
								  if ($ratedcheck == 0)  {
									?>
									   <form id="myform" name="myform" method="post" action="http://aahmad20.dmitstudent.ca/dmit2503/mugallery/admin/ratings.php" enctype="multipart/form-data">
										<div class="form-group">
													<label for="Rating">Rating (1-5)</label>
													<input type="number" class="form-control" name="Rating" id="Rating" style="width:10%;" min="1" max="5">
													</div>
													<input type="hidden" name="picture_id" value=<?php echo $id ?> /> 
												
													<input type="hidden" name="rater_id" value=<?php echo $rater_id ?> /> 
													
									<div class="form-group">
										<label for="submit">&nbsp;</label>
										<input type="submit" name="submit" class="btn btn-info" value="Submit">
									</div>
										<?php 
								  } else {
									  echo "you have rated this before, you can only rate once.";

								  }
								endwhile;	
								?>
							
								
									<?php
									
								}
								
								
								$result_count = mysqli_query($con, "SELECT COUNT(*) AS mycount FROM ratings WHERE picture_id = '$id'") or die(mysqli_error($con));
									
								while($row = mysqli_fetch_array($result_count)):
								   echo "<p>Total Ratings </p>";
								   echo $row['mycount'];
								endwhile;	
								$result_average = mysqli_query($con, "SELECT AVG(rating) AS average FROM ratings WHERE picture_id = '$id'") or die(mysqli_error($con));
							   
								while($row = mysqli_fetch_array($result_average)):
								   echo "<p>Average Rating </p>";
								   echo $row['average'];
								endwhile;		
								
								?>
								
								
								
								




	</div>

</div>

<?php

include ("includes/footer.php");
?>