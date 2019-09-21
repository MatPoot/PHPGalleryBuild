<?php


$con = mysqli_connect("localhost", "aahmad20","Random123","aahmad20_dmit2503");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


  foreach ($_POST as $key => $value) { 
    $_POST[$key] = mysqli_real_escape_string($con, $value); 
  } 


  foreach ($_GET as $key => $value) { 
    $_GET[$key] = mysqli_real_escape_string($con, $value); 
  }


  define("BASE_URL", "http://aahmad20.dmitstudent.ca/dmit2503/mugallery/");
  


?>