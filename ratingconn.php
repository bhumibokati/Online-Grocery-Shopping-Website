

<?php
error_reporting(0);
$rate="";
$conn= mysqli_connect("localhost","root", "", "ict");
if (!$conn) {
  die("Error in connection" .mysqli_connect_error());
}

if (isset($_POST['submit'])) {

  $rate=$_POST['rating'];
  $dp_id=$_SESSION['dp_id'];

  if ($rate==NULL) {
  	echo "Please give a rating!!";
  }
  else
  {
  	$query = "INSERT INTO p_info(rating) values('$rate') where p_id='$dp_id'";
  	// var_dump($query); die();
  	if(mysqli_query($conn,$query)){
  	echo "You have given " .$rate. " ratings to this product";
  	// header("refresh:1, url=class.php");
    }
  }
}
?>