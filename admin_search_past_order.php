
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Customer Past Order Search</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="css/nav.css"/>
</head>
<body>
<?php
include "header_nologin.php";
?>
<form action="" method="post">
    <!--<form name="product_input_form" action="product_search_action.php" method="post">-->
    <div class="border container form_min">
        <!--Form division started-->

        <div class="center"><h1>Customer Past Order Search</h1></div>
        <div class="form_box  overflow">           <!--        form box-->
            Enter Customer ID:

            <input class="form_text" type="text" name="customer_id" placeholder="Enter Customer ID">
            <input class="pointer" type="submit" name="search_order" value="Search">
            <table border="0" class="table_padding">
                <?php
                $do_name = "";
                if (isset($_POST['search_order'])) {
                    $link = mysqli_connect("localhost", "root", "", "ict");
                    if (!$link) {
                        die("ERROR: Could not connect. " . mysqli_connect_error());
                    }
//                $s_id='1';
                    $s_id = $_POST['customer_id'];
                    $sn=0;
                    $sqlename = "SELECT u_name FROM user_info WHERE u_id= $s_id";
                    $result1 = mysqli_query($link, $sqlename);
                    while ($row2 = mysqli_fetch_assoc($result1)) {
                        $do_name = $row2['u_name'];
                    }
                    if ($do_name != NULL) {
                        echo "<br> <h3>Customer Name=  $do_name</h3>";

                        $sqle = "SELECT o_id,p_id, o_date, o_qty from order_info where u_id=$s_id";
//        $sqle = "SELECT p_id, o_date, o_qty from order_info where u_id='$su_id'";
                        $result = mysqli_query($link, $sqle);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $do_id = $row['o_id'];
                            $dp_id = $row['p_id'];
                            $do_date = $row['o_date'];
                            $do_qty = $row['o_qty'];

                            if ($do_id != NULL) {
                                $sqleo = "SELECT  p_name, p_price,p_image, p_des from p_info where p_id='$dp_id'";

                                $result1 = mysqli_query($link, $sqleo);
                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                    $d_name = $row1['p_name'];
                                    $d_price = $row1['p_price'];
                                    $d_image = $row1['p_image'];
                                    $d_des = $row1['p_des'];
                                    $sn=$sn+1;
                                    echo "
                               <tr>
                                    <td>$sn </td>
                                        <td>

                                                    <strong>Product Name:</strong> $d_name <br>
                                                   <strong> Product Price:</strong>RS $d_price <br>
                                                    <strong>Poduct Description:</strong> $d_des<br>
                                                    <strong>Ordered date :</strong> $do_date<br>
                                                    <hr>
                                        <td>

                                </tr>

                ";


                                }
                            }

                        }


                    } else {
                        echo "<br><h3>USER HAVEN'T PURCHASED ANY PRODUCT</h3> ";
                    }
                }
                ?>
            </table>
        </div>
        <!--    form box-->

    </div>
</form>

<!--Form division Ended-->

<div class="container">
    <?php
    include "footer.php";
    ?>
</div>

</body>
</html>


