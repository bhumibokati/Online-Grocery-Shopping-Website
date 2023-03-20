
<!DOCTYPE html>
<html>
<head>
    <title>Personal Information</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="css/nav.css"/>
    <link rel="stylesheet" type="text/css" href="css/slider.css"/>
</head>
<body>
<?php
include "nav.php";
?>
<div class="border container form_min ">
    <?php
    if (!isset($_SESSION['user_id']) && !isset($_SESSION['user_name'])) {
        header("refresh:3, url=customer.php");
        $user_id=".";


    }
    ?><!--        Form division started-->

    <div><h1>My Information</h1></div>
    <div class="u_info_form">
        <?php
        $link = mysqli_connect("localhost", "root", "", "ict");
        if (!$link) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        $sqle = "SELECT  u_name, u_num1,u_mail, u_add from user_info where u_id='$user_id'";
        //        $sqle = "SELECT  u_name, u_num1,u_mail, u_add from user_info where u_id='$s_id'";
        $result = mysqli_query($link, $sqle);
        while ($row = mysqli_fetch_assoc($result)) {
            $d_name = $row['u_name'];
            $d_num = $row['u_num1'];
            $d_mail = $row['u_mail'];
            $d_add = $row['u_add'];
            echo "
       
                   <!--        featured product div-->
            <div class='feature_images_container'>
                <div class='feature1'>                   
                    <div class='left'>
                    <h4>Name: $d_name </h4>
                    <h4>Mobile Number: $d_num</h4>
                    <h4>E-mail address: $d_mail</h4>
                    <h4>Delivery Address: $d_add</h4>
                    
                    </div>
                </div>
                
                
            </div>

     <!--        featured product div closed-->
";
        }
        if ($user_id == ".") {
            echo "<h2>Log In first</h2>";
        }
        mysqli_close($link);

        ?>


    </div>


</div>      <!--    form box-->

</div>
<!--Form division Ended-->

<div class="container">
    <?php
    include "footer.php";
    ?>
</div>

</body>
</html>