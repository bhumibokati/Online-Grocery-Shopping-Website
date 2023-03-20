<!DOCTYPE html>
<html>
<head>
    <title>My Cart</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="css/nav.css"/>
    <link rel="stylesheet" type="text/css" href="css/slider.css"/>
</head>
<body>
<?php
require "nav.php";

?>

<div class='border container form_min black'>
    <!--Form division started-->


    <?php
    if (!isset($_SESSION['user_id']) && !isset($_SESSION['user_name'])) {
        header("refresh:3, url=customer.php");
        echo " <h2>PLEASE LOG IN TO CONTINUE<h2>";
        $u_id = ".";
    } else {
        $nam = $_SESSION['user_name'];
        echo "
    <div class='center'><h1>CART of  $nam </h1></div>


    <div class='form_box  table_padding '>
        <!--        form box-->

        <table border='1' width='900' >

        <tr>
                <td>S.N</td>
                <td>Product Name</td>
                <td>Product quantity</td>
                <td>Product Rate</td>
                <td>Product Image</td>
                <td>Poduct Description</td>
                <td>  Price (in RS)</td>
                <td>  Delivery Status</td>

            </tr>";
    }
    ?>
    <?php
    if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {

        $link = mysqli_connect("localhost", "root", "", "ict");
        if (!$link) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        $u_id = $_SESSION['user_id'];
        $dp_id = 0;
        $sn = 0;
        $sum = 0;


        $sqle = "SELECT p_id, p_qty from cart_info where u_id=$u_id";

        $result = mysqli_query($link, $sqle);
        while ($row = mysqli_fetch_assoc($result)) {
            $dp_id = $row['p_id'];
            $dp_qty = $row['p_qty'];


            if ($dp_id != "") {
                $sqleo = "SELECT  p_name, p_price,p_image, p_des,p_type from p_info where p_id='$dp_id'";

                $result1 = mysqli_query($link, $sqleo);
                while ($row1 = mysqli_fetch_assoc($result1)) {
                    $d_name = $row1['p_name'];
                    $d_price = $row1['p_price'];
                    $d_image = $row1['p_image'];
                    $d_des = $row1['p_des'];
                    $d_type = $row1['p_type'];
                    $s_price = $dp_qty * $d_price;
                    $sn = $sn + 1;
                    $sum = $sum + $s_price;


                    echo "


            <div class='feature1'>
                    <div class='left'>
                <tr>
                <td> $sn</td>
                <td>$d_name<br>
                 <form method='post'>
                 <input hidden type='text' value='$dp_id' name='product_id_del_from_cart'>
                 <input hidden type='text' value='$u_id' name='user_id_del_from_cart'>
                 <input type='submit' value='Remove' name='remove'>
                 </form>

                 </td>
                <td>
                 <form method='post'>
                 <input class='qty_text_box' type='text' placeholder='$dp_qty' name='update_quantity'><br>
                 <input hidden type='text' placeholder='$dp_qty' value='$dp_id' name='update_quantity_id'><br>
                <a href='mycart.php'> <input type='submit' value='Update' name='update_qty'></a>
                 </form>
                 </td>
                    <td>$d_price </td>
                <td><img src='$d_image' alt='$d_name' height='100' width='auto' /></td>
                    <td>$d_des </td>
                    <td>  $s_price </td>
                    <td>";
                     if($d_type=="Non-Perishable"){
                     echo 'Item can be delivered';}
                      if($d_type=='Perishable'){
                     echo 'Item cannot be delivered';}
                    echo "
                      </td>

                    </div>
                </div>


                ";
                    if (isset($_POST['update_qty'])) {
                        $up_qty = $_POST['update_quantity'];
                        $up_dp_id = $_POST['update_quantity_id'];


                        $sqleup = "UPDATE cart_info SET p_qty='$up_qty' where u_id='$u_id' AND p_id='$up_dp_id' ";
                        if (mysqli_query($link, $sqleup)) {
                            header("refresh:0, url=mycart.php");

//                                header(" url=mycart.php");

//                                echo "Quantity updated ";
                        } else {
//                                echo "ERROR: Could not SIGN UP $query. " . mysqli_error($db);
                        }
                    }
// isset code for removing product from cart
                    if (isset($_POST['remove'])) {

                        $re_p_id = $_POST['product_id_del_from_cart'];

                        $sqle_rem = "DELETE  FROM cart_info where u_id='$u_id' and p_id='$re_p_id' ";

                        if (mysqli_query($link, $sqle_rem)) {
                            header("refresh:0, url=mycart.php");
//                                echo "Product  removed ";
                        } else {
//                                echo "ERROR: Could not SIGN UP $query. " . mysqli_error($db);
                        }
                    }


                }


            }

        }


        if ($dp_id == "") {

            echo "<br><h3>USER HAVE NO ITEM LEFT IN CART</h3> ";

        }
    } else {
        header("refresh:3, url=customer.php");
    }
    ?>

</div>
<!--    form box-->
</td>
</tr>
<tr>
    <?php
    if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {
        echo "

        <td class=right' colspan='7'>
        Total</td>
        <td> $sum</td>
        </tr>
        <tr>
        <td class='right' colspan='8'> <form method='post'> <input type='submit' name='order' value='Order'></form></td>

        ";
    }
    ?>
</tr>

<?php
if (isset($_POST['order'])) {
//    echo"hello";
    $o_user = $user_id;
    $sqle = "SELECT p_id, p_qty from cart_info where u_id=$u_id";
    $result2 = mysqli_query($link, $sqle);
    while ($row = mysqli_fetch_assoc($result2)) {
        $dp_id = $row['p_id'];
        $dp_qty = $row['p_qty'];

        $sqle = "INSERT INTO order_info (u_id, p_id, o_qty) VALUES ('$o_user','$dp_id','$dp_qty' )";
        if (mysqli_query($link, $sqle)) {
            echo "Ordered successfully";
//            header("refresh:0, url=mycart.php");

        }

        $sqleqty = "SELECT p_qty from p_info where p_id=$dp_id";
        $result3 = mysqli_query($link, $sqleqty);
        while ($row = mysqli_fetch_assoc($result3)) {
            $old_qty = $row['p_qty'];
        }
        $new_qty = $old_qty - $dp_qty;
//        $new_qty=100;


        $sqle_qty_updte = "UPDATE p_info  SET p_qty='$new_qty' WHERE p_id='$dp_id'  ";
        if (mysqli_query($link, $sqle_qty_updte)) {
            echo "Ordered successfully";
//            header("refresh:0, url=customer_order.php");

        }


    }
    $sqle_del = "DELETE  FROM cart_info where u_id='$o_user'";
    if (mysqli_query($link, $sqle_del)) {
    } else {
        echo "error::$sqle_del. " . mysqli_error($link);

    }


}
?>
</table>

</div>
<div class="container" style="color: white;">
    <?php
    include "footer.php";
    ?>
</div>
</body>
</html>
