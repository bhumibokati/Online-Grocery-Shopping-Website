

<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <link rel="stylesheet" type="text/css" href="css/adminlogincss.css">
</head>
<body>

<h1>Admin Login</h1>
<?php
session_start();
if(isset($_POST['submit']))
{
    $link=mysqli_connect("localhost","root","","ict");
    if(!$link){
        die("ERROR: could not connect to database:". mysqli_conect_error());
    }

    $username=$_POST['name'];
    $password=$_POST['password'];
    $user="";
    $pass="";

    if($username==NULL || $password==NULL)
    {
        echo "empty ";
    }
    else {

        $sql="select a_id, a_name, a_password from admin_info where a_uname='$username'";
        $result=mysqli_query($link,$sql);
        while($row=mysqli_fetch_array($result)) {

            $id = $row['a_id'];
            $user = $row['a_name'];
            $pass = $row['a_password'];
        }
        if($user==$username && $pass==$password)
        {
            echo "welcome $user";
            header("refresh:0, url=admin_page.php");
            $_SESSION["admin_name"]="$user";
            $_SESSION["admin_id"]="$user";
        }
        else{
            echo "wrong username or password";
        }

    }

}

?>
<hr>
<form method="POST" action="admin_page.php">
<div class="login-page">
  <div class="form">
      <form class="login-form">
      <input type="text" placeholder="username" name="name" />
      <input type="password" placeholder="password" name="password" />
      <input type="submit" name="submit" value="Login as admin"/>
      <p><a href="admin_signup_form.php">create an admin account</a></p>
    </form>
  </div>
</div>



</body>
</html>
