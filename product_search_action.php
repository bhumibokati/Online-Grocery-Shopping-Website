

<!--associated with product_update_search_form.php -->

<?php
$link = mysqli_connect("localhost", "root", "", "ict");
if (!$link) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if (isset($_POST['search_id'])) {
    $p_id = $_POST['id'];



    if ($p_id!= NULL ) {

        $sqle = "SELECT p_category, p_name, p_price, p_des from p_info where p_id=$p_id";
        $result = mysqli_query($link, $sqle);
        while ($row = mysqli_fetch_assoc($result)) {
            $d_category=$row['p_category'];
            $d_=$row['p_name'];
            $d_=$row['p_price'];
            $d_=$row['p_des'];

        }

        $sqle = "INSERT INTO p_info (p_category, p_name, p_price, p_des) VALUES ('$p_category','$p_name',$p_price,'$p_description')"; //    database query for inserting product information
        if (mysqli_query($link, $sqle)) {
            echo "PRODUCT INFO ADDED TO DATABASE SUCCESSFULLY.";
        } else {
            echo "ERROR: Could not ADD PRODUCT $sqle. " . mysqli_error($link);
        }

        header("refresh:20000, url=product_form.php");
        echo "database Updated";
    } else {
        echo "PLEASE Enter Product ID";


    }
}
//ISSET
else{
    echo"Your form is not submitted";
}
mysqli_close($link);
?>