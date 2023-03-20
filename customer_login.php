
<?php include ('p_customer_login_testing.php'); ?>

<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="css/adminlogincss.css">
</head>
<body>

<h1>Customer Login</h1>
<hr>
<div class="error"><?php echo $Eerror?><br><?php echo $error?></div>
<div class="login-page">
  <div class="form">
      <form class="login-form" method="POST">
      <input type="text" placeholder="email" name="email"/>
      <input type="password" placeholder="password" name="password"/>
      <input type="submit" name="submit" value="Login" class="button">
      <p class="message">Not registered? <a href="user_signup_form.php">Create an account</a></p>
    </form>
  </div>
</div>


</body>
</html>



