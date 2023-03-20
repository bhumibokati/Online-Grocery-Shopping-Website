<?php 
session_start();
require ('header.php');
include ('db.php');
include ('functions.php');

if(!isset($_SESSION['Email']))
{
echo "You needs to login to process your order";
echo "<form action = 'login.php' method = 'POST'>
   <input type = 'text' name = 'Email'  placeholder='Enter your Email' >
  <br />
 <input type = 'password' name = 'Password'   placeholder='Enter your Password' >   
<input type = 'submit' name = 'Submit' value = 'Signin'/>

</form>";
echo "Do not have a account? Create your account here"."<br>";
echo "Place the link to register user";

}
else{
header('Location: delivery.php');

}


?>