
<!DOCTYPE html>
<html>
<head>
    <title>My Account</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="css/nav.css"/>
    <link rel="stylesheet" type="text/css" href="css/slider.css"/>
</head>
<body>
<?php
include "nav.php";
?>
<div class="border container form_min black ">       
    <!-- Form division started-->

    <div><h1> Information</h1></div>
    <a href="customer_my_info.php"><h3>My Information</h3></a>
    <a href="customer_order.php"> <h3>My Orders</h3></a>
        <a href="mycart.php"> <h3>My Cart</h3></a>


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
