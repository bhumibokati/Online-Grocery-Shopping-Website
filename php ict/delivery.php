<?php

session_start();
include('header.php');
include('db.php');
include('functions.php');

if(!$_SESSION ['Email']){
	 header('Location: index.php');
}


$email=$_SESSION['Email'];
$sql="select * from cart where email='$email'";

$result=mysqli_query($con, $sql);
while ($row=mysqli_fetch_assoc($result)){
	$p_id=$row['p_id'];
	$qty=$row['qty'];
	$sql= "insert into ordertable (email,p_id, p_qty)value('$email','$p_id','$qty')";
	$result=mysqli_query($con, $sql);

	if($result){
	$sql="DELETE FROM cart WHERE email = '$email'";	
	$result=mysqli_query($con, $sql);
	if($result){
		$sql="select * from product where product_id='$p_id'";
		$result=mysqli_query($con, $sql);
		while($row=mysqli_fetch_assoc($result)){
			$oldqty=$row['product_qty'];
			$newqty=$oldqty-$qty;

			$sql="UPDATE product SET product_qty= '$newqty'WHERE product_id = '$p_id'";
			$result=mysqli_query($con, $sql);
		}
	echo "ordered successfully";
	}

	}
	else{
		echo "error";
	}
}





?>