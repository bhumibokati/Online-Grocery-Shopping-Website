<?php
session_start();
$email=$_SESSION ['Email'];
include('db.php');
// functions for get products
function getProducts(){
	global $con;
	
    $sql = "SELECT * from product  order by rand() limit 0,10";
    $result=mysqli_query($con, $sql);
    while($row=mysqli_fetch_assoc($result)){
        $p_id=$row['product_id'];
        $p_title=$row['product_title'];
        $c_id=$row['cat_id'];
        $p_description=$row['product_description'];
        $p_image=$row['product_image'];
        $p_qty=$_row['product_qty'];
        $p_price=$row['product_price'];
    echo
     "<div class='display'>
            <img src='$p_image' width='100'height='150'>

            <h4> $p_title</h4>
            <h5> Rs. $p_price</h5>
            <a href='detail.php?pro=$p_id' style='float:left;'><button>Details</button></a>

                <form action='' method='POST'>
                    <input type='hidden' name='p_id' value='$p_id'>
                    Qty:<input type='text' name='qty' value='1' size='10'>
                    <input type='submit' name='submit' value='add to cart'>
                </form> 

    </div>";
    }

}
/*



// Functions for getting iip address
function getRealIpAddr()

{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

*/
// creating shopping cart functions
function cart(){
global $con;

if(isset($_POST['submit'])){

echo 'p id is: '.$p_id=$_POST['p_id'].'<br>';
echo 'Qty :'.$qty=$_POST['qty'];
$email=$_SESSION['Email'];


$sql = "SELECT * FROM cart WHERE p_id='$p_id' && email='$email'";
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result)>0){
            echo "It is already added in your cart";
        }
else{
  $sql="INSERT INTO cart (p_id, email, qty) VALUES('$p_id', '$email','$qty')";
if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" .  mysqli_connect_error();;
}

        
            }
    }
}
//count and display added item in the cart
function item(){
global $con;
$email=$_SESSION['Email'];
if($_POST['submit']){


    $sql = "SELECT * FROM cart WHERE email='$email'";
    $result = mysqli_query($con, $sql);
    $count=mysqli_num_rows($result);

}
else{
$sql = "SELECT * FROM cart WHERE email='$email'";
    $result = mysqli_query($con, $sql);
  $count=mysqli_num_rows($result);    
}

echo $count;
}
//calculating the total price from the cart
function getPrice(){
   global $con; 

$total=0;
  $sql = "SELECT * FROM cart WHERE email='$email'";
$result=mysqli_query($con, $sql);
    
    WHILE($row=mysqli_fetch_assoc($result)){
     $p_id=$row['p_id'];


$sql1="SELECT * FROM product WHERE product_id='$p_id'";
$result1=mysqli_query($con, $sql1);
WHILE($row1=mysqli_fetch_assoc($result1)){

    $p_price=array($row1['product_price']);
   
    $value=array_sum($p_price);
    $qty=$row['qty'];
    $value*=$qty;
    $total += $value;
}
}
echo $total;

}



?>
