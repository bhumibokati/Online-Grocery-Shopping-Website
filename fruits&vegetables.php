<!DOCTYPE html>
<html>
<head>
    <title>Shop: Fruits and Vegetables</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="css/nav.css"/>
    <link rel="stylesheet" type="text/css" href="css/slider.css"/>
</head>
<body>
<?php
include "nav.php";
$user_id="";
if (isset($_SESSION['user_id'])) {
    $user_id=$_SESSION['user_id'];

}
?>
<div class="container">

    <?php
    $link = mysqli_connect("localhost", "root", "", "ict");
    if (!$link) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    $sqle = "SELECT p_id, p_name, p_price,p_image, p_des from p_info where p_category='fruits&vegetables'";
    $result = mysqli_query($link, $sqle);
    while ($row = mysqli_fetch_assoc($result)) {
        $d_id = $row['p_id'];
        $d_name = $row['p_name'];
        $d_price = $row['p_price'];
        $d_image = $row['p_image'];
        $d_des = $row['p_des'];
//        $d_qty = $row['p_qty'];
        echo"
       <div class='product_box border'>       <!--        featured product div-->
            <div class='feature_images_container'>
                <div class='feature1'>
                    <img src='$d_image' alt='$d_name' class='display_image'><br>
                    <div class='center'>$d_name <br>Price:RS $d_price <br>
                    <form method='post'>
                    <input type='text' hidden name='product_id_cart' value='$d_id' >
                     <input type='text' hidden name='user_id_cart' value='$user_id' >
                    <input class='qty_text_box' type='text' name='pd_qty'  placeholder='Qty' >
                    <input type='submit' value='Add to cart' name='cart'>
                     </form>
                     </div>
</div>
                    </div>
                </div>


            </div>       <!--        featured product div closed-->
";}
    mysqli_close($link);

    ?>
</div>
<!--Form division Ended-->

<div class="container">
    <?php
    include "footer.php";
    ?>
</div>

</body>
</html>

<?php
if (isset($_POST["cart"])) {
    if (isset($_SESSION['user_id'])) {

        $link = mysqli_connect("localhost", "root", "", "ict");
        if (!$link) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        $p_qty = $_POST['pd_qty'];
        $p_id = $_POST['product_id_cart'];
        $u_id = $_POST['user_id_cart'];
        $cartc_id = "";

        $sqle_ch = "SELECT cart_id FROM cart_info where u_id=$u_id AND p_id=$p_id";
        $result = mysqli_query($link, $sqle_ch);
        while ($row = mysqli_fetch_assoc($result)) {
            $cartc_id = $row['cart_id'];
        }
        if ($cartc_id == "") {


            $sqle_in = "INSERT INTO cart_info ( u_id, p_id, p_qty) VALUES ('$u_id','$p_id',$p_qty)"; //    database query for inserting product information
            if (mysqli_query($link, $sqle_in)) {
                echo "ADDED TO CART.";
            } else {
                echo "ERROR: Could not ADD PRODUCT $sqle. " . mysqli_error($link);
            }
        } else {
            echo "Product already added in cart";
        }

    } else {
        echo "Please log in to add product to cart";
    }
}
?>