<!-- update data into database -->
<!--associated with product_update_form.php -->
<?php
$link = mysqli_connect("localhost", "root", "", "ict");
if (!$link) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
//$p_category = $_POST['product_category'];
$p_id = $_POST['p_id'];
$u_name = $_POST['updated_product_name'];
$u_price = $_POST['updated_product_price'];
$u_image = $_POST['updated_product_image'];
$u_qty = $_POST['updated_product_quantity'];
$u_description = $_POST['updated_product_description'];
//echo $p_id, $u_name, $u_price, $u_qty, $u_description;

$sqle="UPDATE p_info SET p_name='$u_name', p_price='$u_price', p_qty='$u_qty', p_image='$u_image', p_des='$u_description' WHERE p_id=$p_id ";//    database query for updating product information


if(mysqli_query($link, $sqle)){
    echo "PRODUCT INFO UPDATED TO DATABSE SUCCESSFULLY.";
} else{
    echo "ERROR: Could not ADD PRODUCT $sqle. " . mysqli_error($link);
}
echo"database Updated";

mysqli_close($link);
?>
