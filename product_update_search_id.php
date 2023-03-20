
<?php
session_start();
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
include "header_nologin.php";
?>
<form name="product_input_form" action="product_update_form.php" method="post">
<!--<form name="product_input_form" action="product_search_action.php" method="post">-->
    <div class="border container form_min">       <!--        Form division started-->

        <div class="center"><h1>Product Update Form</h1></div>
        <div class="form_box  overflow">           <!--        form box-->

            <div class="float_left border form_margin">
                <div class="right">


                    <div class="form_padding_top_10 search_margin">Product ID:</div>


                </div>
            </div>

            <div class="float_right  form_right_box border">

                <br>
                <div><input class="form_text" type="text" name="product_id" placeholder="Enter Product ID"></div>
                <br>
                <br>


                <input class="pointer" type="submit"  value="UPDATE">
<!--                <a href="product_update_form.php"> <input class="pointer" type="button" name="search_id" value="UPDATE"></a>-->
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
