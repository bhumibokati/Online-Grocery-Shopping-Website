

<?php
$db=mysqli_connect('localhost','root','','ict');
if (!$db) {
  die("Error in Connection" .mysqli_connect_error());
}

$Eerror=$Merror=$Perror=$error="";
$fname=$mobile=$address=$p1=$p2=$email="";
if (isset($_POST['submit'])) {
  
  $email = $_POST['email'];
  $fname = $_POST['fullname'];
  $mobile = $_POST['mobile'];
  $p1 = $_POST['p1'];
  $p2 = $_POST['p2'];

  if ($fname==NULL or $email==NULL or $mobile==NULL or $p1==NULL or $p2==NULL) {
    $error = "**All fields required";
    }

  if (!preg_match("/^[_a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email)) {
          $Eerror = "*Invalid E-mail Format!";
  }
     if (!preg_match("/^[6-9][0-9]{9}$/", $mobile)) {
          $Merror="*Invalid Mobile Number";
  }

  if ($p1!=$p2) {
        $Perror="*Passwords do not match! Try Again";
  }
  else
  {
//  $salt="%$*";
//    $password=crypt($p1,$salt);
  $query = "INSERT INTO admin_info(a_id,a_name,a_num1,a_uname,a_password) values('$fname','$mobile','$email','$address','$p1')";
 if(mysqli_query($db,$query)){
     echo "SignUp  SUCCESSFULLY.";
  } else{
        echo "ERROR: Could not SIGN UP $query. " . mysqli_error($db);
    }
 }
}

   // if ($a) {
   //   echo "You Are Registered Successfully";
   // }
   // else{
   //  echo "Sorry an error occured.. Try again!";
   // }

?>
