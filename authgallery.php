<?php

include ("includes/header.php");

?>
<div class="row">
	<div class="col-md-12 clearfix">
		
		
		<?php 
           $aud = $_GET['aud'];

           $result2 = mysqli_query($con, "SELECT user_name FROM users where user_id=$aud") or die(mysqli_error($con));
    
           while($row = mysqli_fetch_array($result2)){
                     $username=  $row['user_name'];
                       echo "<h1>$username 's Gallery";
                       echo "<br>";
           }


            $result = mysqli_query($con, "SELECT * FROM mugallery where author_id=$aud") or die(mysqli_error($con));
    
            while($row = mysqli_fetch_array($result)){
                    
                    $filename =  $row['filename'];
                    $title =  $row['title'];
                    $id =  $row['id'];
                    echo "\n<div class=\"thumb\">";
                    echo "\n\t<a href=\"display.php?id=$id\"><img src=\"images/thumbs-square/$filename\" class=\"img-thumbnail\"></a>";
                    echo "<div class=\"thumb-title\">$title</div>";
                    echo "\n</div>";		
            }
    
    
    
             
		



		 ?>


		 <br style="clear:both">
	</div>
	
</div>

<?php

include ("includes/footer.php");
?>

