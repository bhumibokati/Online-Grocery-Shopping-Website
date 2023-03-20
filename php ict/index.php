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
            width: 79%;
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
require ('header.php');
include ('db.php');
include ('functions.php');
//include('cart.php');
?>

<div class="products"> 
	<div class="sidebar">
	<h2>Categories</h2>
	<hr>
<div>
<ul>	   
 <?Php
 $sql = "SELECT * FROM categories";
    $result = mysqli_query($con, $sql);

    while($row = mysqli_fetch_assoc($result)) {
         $cat_id= $row['cat_id'];
         $name= $row['cat_title'];
echo "<li><a href='index.php?cat=$cat_id'> <h2>$name</h2></a> </li>";
     }

?>

</ul>
</div>
<hr>
        <div>
        <!--Space to display most popular items-->
        <ul>       
         <h2>Most Popular Items</h2>
    <?php


cart();
?>     

        </ul>
        </div>


	</div>
</div> 	
<div class='userbar'>
    
<strong> Welcome Guest</strong>

<strong style="color:yellow"> Shopping Cart</strong>
<span> Items: <?php item();?>- Price: <?php  ?><a href="cart.php"> Go to cart</a></span>

</div>
<!--<div>
	    <h3>Search  Contacts Details</h3> 
		<p>You  may search either by first or last name</p> 
	    <form  method="post" action="search.php?go"  id="searchform"> 
	      <input  type="text" name="name"> 
	      <input  type="submit" name="submit" value="Search"> 
	    </form> 
</div>-->

<hr>
<div class="item">
<?php

getProducts();



?>
<div>



</div>

</div>
</body>
</html>
