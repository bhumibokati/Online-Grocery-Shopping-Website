<?php
session_start();
session_destroy();
header("refresh:0, url=index.php");
echo 'You have been logged out. <a href="class.php">Go back</a>';
?>