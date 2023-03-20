
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

    $sql="select a_id, a_name, a_password from admin_info where a_name='$username'";
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
