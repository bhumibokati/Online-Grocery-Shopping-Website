<!-- insert data into database -->
<!--associated with product_input_form.php -->
<?php
$link = mysqli_connect("localhost", "root", "", "ict");
if (!$link) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
    $p_category = $_POST['product_category'];
    $p_name = $_POST['product_name'];
    $p_price = $_POST['product_price'];
    $p_qty = $_POST['product_qty'];
    $p_image = $_POST['product_image'];
    $p_typepn = $_POST['product_typepn'];
    $p_typenf = $_POST['product_typenf'];
    $p_description = $_POST['product_description'];



    if ($p_category != NULL &&  $p_name != NULL && $p_price != NULL && $p_qty != NULL && $p_image!=NULL && $p_typepn != NULL && $p_description != NULL ) {
        $sqle = "INSERT INTO p_info (p_category, p_name, p_price,p_qty, p_image,p_type,p_extra, p_des) VALUES ('$p_category','$p_name',$p_price,'$p_qty', '$p_image','$p_typepn','$p_typenf','$p_description')"; //    database query for inserting product information
        if(mysqli_query($link, $sqle)){
            echo "PRODUCT INFO ADDED TO DATABASE SUCCESSFULLY.";
        } else{
            echo "ERROR: Could not ADD PRODUCT $sqle. " . mysqli_error($link);
        }

        header("refresh:0, url=acknowledge.php");
    } else {
        echo "PLEASE FILL ALL FIELDS";


    }

mysqli_close($link);
?>
