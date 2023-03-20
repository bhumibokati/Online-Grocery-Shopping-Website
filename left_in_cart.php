
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Most Popular Products</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="css/nav.css"/>
</head>
<body>
<?php
include "header_nologin.php";
?>

<?php

$link = mysqli_connect("localhost", "root", "", "ict");
if (!$link) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sqle = "select p_id, sum(p_qty) as total_quantity From cart_info group by p_id order by sum(p_qty) DESC ";

$result = mysqli_query($link, $sqle);
while ($row = mysqli_fetch_assoc($result)) {
    $d_id = $row['p_id'];
    $d_l_qty = $row['total_quantity'];


    $sqle = "SELECT p_id, p_name, p_price,p_image from p_info where p_id='$d_id' LIMIT 4";
    $result5 = mysqli_query($link, $sqle);
    while ($row = mysqli_fetch_assoc($result5)) {
        $d_id = $row['p_id'];
        $d_name = $row['p_name'];
        $d_price = $row['p_price'];
        $d_image = $row['p_image'];
//        $d_qty = $row['p_qty'];


        echo "

            <div class='product_box border'>       <!--        featured product div-->
            <div class='feature_images_container'>
                <div class='feature1'>
                    <img src='$d_image' alt='$d_name' class='display_image'><br>
                    <div class='center'>$d_name <br>Price:RS $d_price<br>
                    Qty Left In CART=$d_l_qty

                    </div>
</div>
                </div>


            </div>

        </div>      <!--        featured product div closed-->
     <!--        featured product div closed-->
";
    }
}
mysqli_close($link);

?>
<div class="container">
    <?php
    include "footer.php";
    ?>
</div>