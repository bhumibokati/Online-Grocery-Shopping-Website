
<?php
session_start();
$link = mysqli_connect("localhost", "root", "", "ict");
if (!$link) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product Update Form</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="css/nav.css"/>
</head>
<body>


<?php

$p_id = $_POST['product_id'];


if ($p_id != NULL) {
    $sqle = "SELECT p_category, p_name, p_price, p_des, p_qty, p_image from p_info where p_id=$p_id";
    $result = mysqli_query($link, $sqle);
    while ($row = mysqli_fetch_assoc($result)) {
        $d_category = $row['p_category'];
        $d_name = $row['p_name'];
        $d_price = $row['p_price'];
        $d_image = $row['p_image'];
        $d_des = $row['p_des'];
        $d_qty = $row['p_qty'];


        echo "
 <form name='product_input_form' action='product_update_action.php' method='post'>
    <div class='border container form'>       <!--        Form division started-->

        <div class='center'><h1>Product Update Form</h1></div>
        <div class='form_box border overflow'>           <!--        form box-->

            <div class='float_left border form_margin'>
                <div class='right'>
                    <!--                    <div>Product Categories:</div>-->
                    <!--                    <br>-->


                    <div >Product ID:</div> <br>
                    <div class='form_padding_top'>Product Category:</div><br>
                    <div class='form_padding_top'>Product Name:</div>
                    <br> <br>
                    <div class='form_padding_top'> Product Price:</div>
                    <br><br>
                    <div class='form_padding_top' > Product Quantity:</div>
                    <br><br>
                    <div class='form_padding_top' > Product Image:</div>
                    <br><br>
                    <div> Product Description:</div>
                    <br><br>

                </div>
            </div>

            <div class='float_right  form_right_box border'>
                <div><input class='form_text' type='text' name='p_id' value='$p_id' readonly='readonly'></div> <br>
                <div><input class='form_text' type='text'  value='$d_category' readonly='readonly'></div><br>
                <div><input class='form_text' type='text'  value='$d_name' readonly='readonly'></div>
                <div><input class='form_text' type='text' name='updated_product_name' placeholder='Enter New Product Name'></div>
                <br>
                <div><input class='form_text' type='text' value='$d_price ' readonly='readonly'></div>
                <div><input class='form_text' type='text' name='updated_product_price' placeholder='Enter New Product Price'></div>                <br>
                
                <div><input class='form_text' type='text' value='$d_qty ' readonly='readonly'></div>

                <input class='form_text' type='text' name='updated_product_quantity' placeholder='Enter New  Quantity' > 
                <br>
                <br>
                <div><input class='form_text' type='text' value='$d_image ' readonly='readonly'></div>

                <input class='form_text' type='text' name='updated_product_image' placeholder='Enter New  Quantity' > 
                <br>
                <br>
                <div><input class='form_text' type='text'  value='$d_des' readonly='readonly'></div>
                <div><textarea class='form_text_box' name='updated_product_description' rows='10' cols='30'
                               placeholder='Enter Product Description'></textarea>
                    <div>
                        <br>
                        <input class='pointer' type='submit' value='Update'>
                    </div>
                </div>      <!--    form box-->

            </div>
        </div>
    </div>

</form>
";
    }
} else {
    echo "PLEASE Enter Product ID";


}

mysqli_close($link);

?>
<!--Form division Ended-->



<div class="container">
    <?php
    include "footer.php";
    ?>
</div>
</body>
</html>


<!--<form name="product_input_form" action="product_action.php" method="post">-->
<!--    <div class="border container form">-->

        <!--        Form division started-->

<!--        <div class="center"><h1>Product Update Form</h1></div>-->
<!--        <div class="form_box border overflow">         -->
            <!--        form box-->

<!--            <div class="float_left border form_margin">-->
<!--                <div class="right">-->
                    <!--                    <div>Product Categories:</div>-->
                    <!--                    <br>-->


<!--                    <div class="form_padding_top">Product Name:</div>-->
<!--                    <br> <br>-->
<!--                    <div> Product Price:</div>-->
<!--                    <br>-->
<!--                    <div> Product Description:</div>-->
<!--                    <br>-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="float_right  form_right_box border">-->
<!--                <div><input class='form_text' type='text'  value='$d_name' readonly='readonly'></div>-->
<!--                <div><input class="form_text" type="text" name="product_name" placeholder="Enter Product Name"></div>-->
<!--                <br>-->
<!--                <div><input class="form_text" type="text" name="product_price" placeholder="Enter Product Price"></div>-->
<!--                <br>-->
<!---->
<!--                <div><textarea class="form_text_box" name="product_description" rows="10" cols="30"-->
<!--                               placeholder="Enter Product Description"></textarea>-->
<!--                    <div>-->
                        <!--            <div><input class="form_text_box" type="text" name="product_description" placeholder=" Enter Product Description"></div>-->
<!--                        <br>-->
<!--                        <input class="pointer" type="submit" value="Update">-->
<!--                    </div>-->
<!--                </div>-->
                    <!--    form box-->

<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--</form>-->