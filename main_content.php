<!DOCTYPE html>
<html>
<head>
    <title> Main_Body </title>


</head>
<body>
<div class=" container border overflow">
    <?php

    require "slider-container.php";
    $user_id = "";
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

    }?>
    <div>       <!--categories and product division starts-->

        <div class='featured_new' id='bold'>       
            <!--featured product div-->
            <?php
            $link = mysqli_connect("localhost", "root", "", "ict");
            if (!$link) {
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            $sqle = "SELECT p_id, p_name, p_price,p_image from p_info where p_extra='f' ORDER BY RAND() LIMIT 4";
            $result = mysqli_query($link, $sqle);
            while ($row = mysqli_fetch_assoc($result)) {
                $d_id = $row['p_id'];
                $d_name = $row['p_name'];
                $d_price = $row['p_price'];
                $d_image = $row['p_image'];
//        $d_qty = $row['p_qty'];
                echo "
       
            <div class='product_box border'> 
            <!--featured product div-->
            <div class='feature_images_container'>
                <div class='feature1'>
                    <img src='$d_image' alt='$d_name' class='display_image'><br>
                    <div class='center'>$d_name <br>Price:RS $d_price <br>
                    <form method='post'>
                    <input type='text' hidden name='product_id_cart' value='$d_id' >
                    <input type='text' hidden name='user_id_cart' value='$user_id' >
                    <input class='qty_text_box' type='text' name='pd_qty' value='1' placeholder='Qty' >
                    <input type='submit' value='Add to cart' name='cart'>
                     </form>


                    </div>
                     </form>
</div>
                </div>
                
                
            </div>

        </div> 
        <!--featured product div closed-->
     <!--featured product div closed-->
";
            }?>

            <h1>Newly Launched</h1>
            <hr>            <?php
            $sqle = "SELECT p_id, p_name, p_price,p_image from p_info where p_extra='n' ORDER BY RAND() LIMIT 4";
            $result = mysqli_query($link, $sqle);
            while ($row = mysqli_fetch_assoc($result)) {
                $d_id = $row['p_id'];
                $d_name = $row['p_name'];
                $d_price = $row['p_price'];
                $d_image = $row['p_image'];
//        $d_qty = $row['p_qty'];

                echo "

            <div class='product_box border'>       
            <!--featured product div-->
            <div class='feature_images_container'>
                <div class='feature1'>
                    <img src='$d_image' alt='$d_name' class='display_image'><br>
                    <div class='center'>$d_name <br>Price:RS $d_price
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
        <!--featured product div closed-->
     <!--featured product div closed-->
";
            }

            ?>
           <h1>Most Popular</h1>
            <hr>            <?php


            $sqle = "select p_id, sum(o_qty) as total_quantity From order_info group by p_id order by sum(o_qty) DESC limit 4";

            $result = mysqli_query($link, $sqle);
            while ($row = mysqli_fetch_assoc($result)) {
                $d_id = $row['p_id'];


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
                    <div class='center'>$d_name <br>Price:RS $d_price
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

        </div>      
        <!--featured product div closed-->
        <!--featured product div closed-->
";
                }
            }
            mysqli_close($link);

            ?>


        </div>


    </div>
    <!-- id container ends-->
    <!--Individual SANTOSH-->

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

<!--if(isset(['cart'])){-->
<!--echo 'product added to cart';-->
<!--}-->