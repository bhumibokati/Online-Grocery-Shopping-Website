<?php
session_start();
    if(isset($_SESSION['Email'])){
	$email = $_SESSION['Email'];
   }
   else{
   	echo "you needs to login to conform order";
   }

?>  
<html>
<head>
	<style>
        

        *{
            font-family: 'Titillium Web', sans-serif;
        }
        .sidebar{
            border: 1px solid #aabbec;
            height: ;
            width: 20%;
            margin: 0 1;
            padding: 0;
            float: left; 
             background-color: #efefef;
        }
        ul{
        	list-style: none;
        }
        .userbar{
            background-color: black;
            color: white;
            float: right;
            height: 35px;
            width: 90%;
            padding: 4px;

        }
        .item{
            width: 79%;
            padding: 4px;
            margin-left: 20px;
            margin-top: 10px;
            margin-bottom: 10px;
            text-align: center;
            float: clear;

        }
        .display{
height: 150px;
width: 150px;
background-color: gray;
border: 1px solid red;
float: left;

        }
</style>
</head>
<body>
<div>
<?php 
session_start();
$email=$_SESSION['email'];
require ('header.php');
include ('db.php');
include ('functions.php');
?>

<div class='userbar'>
    
<strong> Welcome Guest</strong>

<strong style="color:yellow"> Shopping Cart</strong>
<span> Items: <?php item();?>- Price: <?php getPrice();?><a href="cart.php"> Go to cart</a></span>

</div>

<hr>
<div class="item">


<div>
<form action='' method='POST' ">

<table width='700px' align='center' bgcolor="gray">
	<tr>
		<td>Remove</td>
		<td>Products</td>
		<td>Quantity</td>
		<td>Total Price</td>
	</tr>
<?php


$total=0;
$sql = "SELECT * FROM cart WHERE email='$email'";
$result=mysqli_query($con, $sql);
    
    WHILE($row=mysqli_fetch_assoc($result)){
     $p_id=$row['p_id'];
     $qty=$row['qty'];


$sql1="SELECT * FROM product WHERE product_id='$p_id'";
$result1=mysqli_query($con, $sql1);
WHILE($row1=mysqli_fetch_assoc($result1)){
    $p_id=$row1['product_id'];
    $p_price=array($row1['product_price']);
    $product_title= $row1['product_title'];
    $product_image=$row1['product_image'];
    $each_price=$row1['product_price']*$qty;
    $value=array_sum($p_price);
    $value=$value*$qty;
    $total += $value;
   
    

?>
	<tr>

		<td> <input type='checkbox' name='remove[]' value='<?php echo $p_id?>'></td>
		<td> <?php echo $product_title .'<br>';?> <img src=" <?php echo $product_image ?>"  height="42" width="42">  </td>
		<td> <input type ='text' name='qty' value="<?php echo $qty; ?>" size='2'></td>
		<?php
if (isset($_POST['update'])){
    $qty=$_POST['qty'];
    $sql="UPDATE cart set qty ='$qty' ";
    $result=mysqli_query($con, $sql);
}
    if($result){

    }


        ?>
        <td><?Php  echo $each_price ;?> </td>
	</tr>
<?php 
}
}

?>
<tr>
	<td></td>
		<td></td>
	<td>Sub Total</td>
	<td><?php   echo $newtotal; ?></td>
</tr>
<tr>
    <td></td>
</tr>

<tr>
    <td> <input type ="submit" name='removeitem' value="Remove Item"></td>
    <td> <input type="submit" name='continue' value="Continue Shopping"></td>
    <td> <input type="submit" name='update' value="Update Cart"></td>
    </form>
    <td>
    <form action="checkout.php" method="post">
        <input type="submit" name="checkout" value="Check Out">
    </form>
    </td> 
</tr>
</table>



<?php
if(isset($_POST['removeitem'])){

    foreach($_POST['remove'] as $remove_id){
   
   $delete = "DELETE FROM `cart` WHERE p_id = '$remove_id'";
     
    $result=mysqli_query($con, $delete);
   }
    if($result){
       header("Refresh:0; url=cart.php");
    }
    
    }
if(isset($_POST['continue'])){
    header('Location: index.php'); 
}

?>

</div>
<a href="index.php"> <button>index.php</button></a>
</div>
</body>
</html>
