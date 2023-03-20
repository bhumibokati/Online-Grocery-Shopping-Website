

<?php
include('user_signup_form_action.php');

?>
<!DOCTYPE html>
<html>
<head>
  <title>Sign Up</title>
  <link rel="stylesheet" type="text/css" href="css/regStyle.css">
</head>
<body>
<h1>Sign Up</h1>
<h1><a href="customer_login.php">Customer</a>/ <a href="admin_signup_form.php">Admin </a></h1>
<hr>
<div class="error"> <?php echo $error?></div>

<div class="login-page">
  <div class="form">
    <form class="login-form" action="" method="POST">
      <input type="text" placeholder="Enter Full Name" name="fullname" value="<?php echo $fname?>" />

      <input type="email" placeholder="Enter your valid e-mail" name="email" value="<?php echo $email?>"/><small class="errorText"><?php echo $Eerror;?></small>

      <input type="text" placeholder="Enter valid Mobile Number" name="mobile" value="<?php echo $mobile?>"/><small class="errorText"><?php echo $Merror;?></small>

      <input type="text" placeholder="Enter your Address" name="address" value="<?php echo $address?>"/>

      <input type="password" placeholder="Enter password" name="p1" value="<?php echo $p1?>"/><small class="errorText"><?php echo $Perror;?></small>
      <input type="password" placeholder="Enter Valid Password" name="p2" value="<?php echo $p2?>"/>

      <input type="submit" name="submit" value="Register" class="button">
      <p class="message">Already registered? <a href="customer_login.php">Sign In</a></p>
    </form>
    
  </div>
</div>


</body>
</html>
