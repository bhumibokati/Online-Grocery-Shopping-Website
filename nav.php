<?php
session_start();
//$name = $_SESSION['user_name'];

?>
<link rel="stylesheet" type="text/css" href="css/nav.css"/>
<div class="navbar">

    <div class="logo">
        <a href="index.php"><img src="images/drawing.gif">
    </div>

    <a href="grocery&staples.php">Grocery & Staples</a>
    <a href="fruits&vegetables.php">Fruits & Vegetables</a>
    <a href="home&hygiene.php">Home & Hygiene</a>
    <a href="bakery&diary.php">Bakery & Diary</a>
    <a href="beverages.php">Beverages</a>
    <a href="user_signup_form.php" style="color: greenyellow;">Sign Up</a>






    <?php
    if (isset($_SESSION['user_id'])) {
        if (isset($_SESSION['user_name'])) {

            $user_id = $_SESSION['user_id'];
            $user_name = $_SESSION['user_name'];
            echo "
          <div class='nav-login'>
//        <a href='logout.php'>
        <input type='button' value='Logout $user_name'>
        </a>
        <a href='mycart.php'>
        <input type='button'value='MY CART'>
        </a>


 </div>
";
        }
    } else {
        echo "

<div class='nav-login'>
<form action='p_customer_login_testing.php' method='post'>
                    <input type='submit' name='submit' value='Login'>
                    <input type='email' name='email' placeholder='Email' required>
                    <input type='password' name='password' placeholder='Password' required>
                    
                </form>
                
        </div>

";
    }

    ?>

</div>

<!--<form class="search-container" method="post" action="search.php">
    <div class="wrapper">
        <input class="search" type="text" id="search" name="keywords"/>
        <input class="submit" type="submit" value="Search" />
    </div>

</form>-->



