

<!DOCTYPE html>
<html>
<head>
    <title>Groce Me</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="css/nav.css"/>
    <link rel="stylesheet" type="text/css" href="css/slider.css"/>

</head>
<body>

<?php include ('nav.php');?>
<div class="form_min">

<?php
$link = mysqli_connect("localhost", "root", "", "ict");
if (!$link) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if (isset($_POST['keywords']))
{
$keywords = $_POST['keywords'];

$sqle = "SELECT p_id, p_name, p_price,p_image from p_info where keywords like '%$keywords%' ";
$result = mysqli_query($link, $sqle);
while ($row = mysqli_fetch_assoc($result)) {
    $d_id = $row['p_id'];
    $d_name = $row['p_name'];
    $d_price = $row['p_price'];
    $d_image = $row['p_image'];
//        $d_qty = $row['p_qty'];
    if ($result){
    echo "
       
            <div class='product_box border'>       <!--        featured product div-->
            <div class='feature_images_container'>
                <div class='feature1'>
                    <img src='$d_image' alt='$d_name' class='display_image'><br>
                    <div class='center'>$d_name <br>Price:RS $d_price <br>
                    <form method='post'>
                    <input type='text' hidden name='product_id_cart' value='$d_id' >
                    <input class='qty_text_box' type='text' name='pd_qty' value='1' placeholder='Qty' >
                    <input type='submit' value='Add to cart' name='cart'>
                    
                     </form>
                      <div style=\"background: url('line.png') repeat-y; float: left; background-size: 75% auto; margin-left: 30px;\" class='rate'>
    <img src=\"images\star.png\"><img src=\"images\star.png\"><img src=\"images\star.png\"><img src=\"images\star.png\"><img src=\"images\star.png\">
</div>
    
                    </div>
                </div>
                
                
            </div>

        </div>      <!--        featured product div closed-->
     <!--        featured product div closed-->
";

}
}
    $sqle_search ="INSERT INTO searched_product (p_id) VALUES('$d_id')";
    mysqli_query($link, $sqle_search);


}
else{
    echo "No Matches Found!";
}

?>
</div>
<?php include ('footer.php');?>


</body>
</html>