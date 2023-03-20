

<?php  
include ('ratingconn.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Review</title>
  <link rel="stylesheet" type="text/css" href="review.css">
</head>
<body>

<form action="" method="POST">
    <div class="field">
    <p><label for="rating">Rating</label>
      <input type="radio" name="rating"
      value="5" /> 5 
      <input type="radio" name="rating" value="4" /> 4
      <input type="radio" name="rating" value="3" /> 3 
      <input type="radio"
      name="rating" value="2" /> 2 
      <input type="radio" name="rating" value="1" /> 1</p>

     <p><input type="submit" value="Submit Review" name="submit"></p>
</div>
</form>

</body>
</html>