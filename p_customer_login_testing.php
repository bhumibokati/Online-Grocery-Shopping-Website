

<?php
session_start();
$Eerror = $error = "";
if (isset($_POST['submit'])) {
    $link = mysqli_connect("localhost", "root", "", "ict");
    if (!$link) {
        die("ERROR: could not connect to database:" . mysqli_conect_error());
    }

    $uemailadd = $_POST['email'];
    $upassword = $_POST['password'];
     $d_u_id="";
     $d_u_name="";
     $d_u_mail="";
     $d_u_pass="";

     if ($uemailadd == NULL || $upassword == NULL) {
         $error = "Fields required ";
     }

     if (!preg_match("/^[_a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $uemailadd)) {
         $Eerror = "*Invalid E-mail Format!";
     } else {

         $sql = "select u_id, u_name, u_mail, u_password, u_add, u_num1 from user_info where u_mail='$uemailadd'";
         $result = mysqli_query($link, $sql);
         while ($row = mysqli_fetch_array($result)) {
             $d_u_id = $row['u_id'];
             $d_u_name = $row['u_name'];
             $d_u_mail = $row['u_mail'];
             $d_u_pass = $row['u_password'];
             $d_u_add = $row['u_password'];
             $d_u_ = $row['u_password'];
         }

         if ($d_u_mail == $uemailadd && $d_u_pass == $upassword) {

             $_SESSION["user_name"]="$d_u_name";
             $_SESSION["user_id"]="$d_u_id";
             header("refresh:0, url=index.php");


         } else {
             echo "wrong username or password";
         }


     }

}

?>
