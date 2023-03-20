
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product Input Form</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="css/nav.css"/>
</head>
<body>
<?php
include "header_nologin.php";
?>
<form name="product_input_form" action="product_action.php" method="post">
    <div class="border container form">      
     <!-- Form division started-->

        <div class="center"><h1>Product Input Form</h1></div>
        <div class="form_box border overflow">           <!--form box-->

            <div class="float_left border form_margin">
                <div class="right">
                    <div>Product Categories:</div>
                    <br>

                    <!--                <div>Product ID:</div>-->
                    <!--                <br>-->
                    <div class="form_padding_top">Product Name:</div>
                    <br>
                    <div> Product Price:</div>
                    <br>
                    <div class="form_padding_top"> Product Quantity:</div>
                    <br>
                    <div class="form_padding_top"> Product Image:</div>
                    <br>
                    <div class="form_padding_top"> Product Type:</div>
                    <br>


                    <div > Product Description:</div>
                    <br>

                </div>
            </div>

            <div class="float_right  form_right_box border">
                <div class="form_padding_top">
                    <select name="product_category">
                        <option value="">Select Category</option>
                        <option value="grocery&staples">Grocery & Staples</option>
                        <option value="fruits&vegetables">Fruits & Vegetables</option>
                        <option value="home&hygiene">Home & Hygiene</option>
                        <option value="bakery&diary">Bakery & Diary</option>
                        <option value="beverages">Beverages</option>
                    </select>
                </div>

                <br>
                <div><input class="form_text" type="text" name="product_name" placeholder="Enter Product Name"></div>
                <br>
                <div><input class="form_text" type="text" name="product_price" placeholder="Enter Product Price"></div>
                <br>
                <div><input class="form_text " type="text" name="product_qty" placeholder="Enter Product Quantity"></div>
                <br>
                <div><input class="form_text" type="text" name="product_image" placeholder="Enter Product Image Path"></div>
                <br>
                <select name="product_typepn">
                    <option value="">Select Type</option>
                    <option value="Perishable">Perishable</option>
                    <option value="Non-Perishable">Non-Perishable</option>
                </select>
                <select name="product_typenf">
                    <option value="">Select Type</option>
                    <option value="n">Newly-Launched</option>
                    <option value="f">Featured</option>
                </select>
                <br><br>

                <div><textarea class="form_text_box" name="product_description" rows="10" cols="30"
                               placeholder="Enter Product Description"></textarea>
                    <div>
                        <!--            <div><input class="form_text_box" type="text" name="product_description" placeholder=" Enter Product Description"></div>-->
                        <br>
                        <input class="pointer" type="submit" value="SUBMIT">
                    </div>
                </div>      <!--    form box-->

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
