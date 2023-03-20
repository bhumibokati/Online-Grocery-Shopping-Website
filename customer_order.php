
<?php include ('ratingconn.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>Order History Information</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="css/nav.css"/>
    <link rel="stylesheet" type="text/css" href="css/slider.css"/>
</head>
<body>
<?php
include "nav.php";

?>
<div class="border container form_min "> 
    <!--Form division started-->

    <?php
    if (!isset($_SESSION['user_id']) && !isset($_SESSION['user_name'])) {
        header("refresh:3, url=customer.php");
        $user_id=".";



    }
    ?>

    <div><h1>Past Order Information</h1></div>
    <div class="u_info_form">
        <table border="1">
            <?php
            $link = mysqli_connect("localhost", "root", "", "ict");
            if (!$link) {
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            //        $u_id = $_SESSION['user_id'];
            $sn=0;
            $do_id="";
            $sqle = "SELECT o_id,p_id, o_date, o_qty from order_info where u_id='$user_id'";
            //        $sqle = "SELECT p_id, o_date, o_qty from order_info where u_id='$su_id'";
            $result = mysqli_query($link, $sqle);
            while ($row = mysqli_fetch_assoc($result)) {
                $do_id = $row['o_id'];
                $dp_id = $row['p_id'];
                $_SESSION['dp_id']=$dp_id;
                echo $_SESSION['dp_id'];
                $do_date = $row['o_date'];
                $do_qty = $row['o_qty'];
//            $sn=0;
                if ($do_id != "") {
                    $sqleo = "SELECT  p_name, p_price,p_image, p_des from p_info where p_id='$dp_id'";

                    $result1 = mysqli_query($link, $sqleo);
                    while ($row1 = mysqli_fetch_assoc($result1)) {
                        $d_name = $row1['p_name'];
                        $d_price = $row1['p_price'];
                        $d_image = $row1['p_image'];
                        $d_des = $row1['p_des'];


                        $sn=$sn+1;
                        echo "


           <tr><td> $sn</td>
                        <td>

                             <div class='feature1 border'>
                                <div class='left'>

                                Product Name:$d_name <br>
                                Product Price:RS $d_price <br>
                                Poduct Description: $d_des<br>
                                Ordered date : $do_date<br>

                                </div>
                            </div>
                            <br>
                            </td> 
                            <td>
</td>        

";
                    }
                }

            }
            //        if ($do_id == "") {
            //            echo "No Purchase Till Date";
            //        }
            if ($user_id == ".") {
                echo "<h2>Log In first</h2>";
            }

            mysqli_close($link);

            ?>

        </table>
    </div>


</div>      <!--    form box-->

</div>

<!--Form division Ended-->

<div class="container">
    <?php
    include "footer.php";
    ?>
</div>

</body>
</html>
<ul>


