<?php

try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

function leaveReview($db)
{
    session_start();
    $username = $_SESSION['name'];        
    $rating = $_POST["rating"];
    $details = $_POST["details"];
    $businessName = $_GET['id'];

    $stamt = $db->prepare('SELECT id FROM users WHERE name=:name');
    $stamt->bindValue(':name', $username, PDO::PARAM_STR);
    try {
        $stamt->execute();
        $result = $stamt->fetch(PDO::FETCH_ASSOC);
        $userId = $result['id'];
        $stamt->closeCursor();
        } catch(PDOException $e) {
          echo "Error with userId: $e";
          echo '<br/>';
          }

    $statement = $db->prepare('SELECT id FROM business WHERE name=:name');
    $statement->bindValue(':name', $businessName, PDO::PARAM_STR);
    try {
    	$statement->execute();
    	$results = $statement->fetch(PDO::FETCH_ASSOC);
    	$businessId = $result['id'];
    	$statement->closeCursor();
    	} catch(PDOException $e) {
          echo "Error with businessId: $e";
          echo '<br/>';
    	  }

    echo "Do we get it all?";
    echo $rating;
    echo $details;
    var_dump($userId);
    var_dump($businessId);
    echo $userId;
    echo $businessId;

    $stmt = $db->prepare('INSERT INTO reviews(rating, description, user_id, business) VALUES(:rating, :description, :userId, :businessId )');
    $stmt->bindValue(':rating', $rating, PDO::PARAM_STR);
    $stmt->bindValue(':description', $details, PDO::PARAM_STR);
    $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
    $stmt->bindValue(':businessId', $businessId, PDO::PARAM_STR);
    try {
        $stmt->execute();
        $stmt->closeCursor();
        session_start();
	echo "Thank you for your review";
        } catch(PDOException $e) {
          echo "Error";
        }

}

if(isset($_POST['leaveReview']))
{
   leaveReview($db);
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Leave a Review</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="banner">
<a class="rightLink" href="index.php">Return to Home</a>
<h1>Rate IBC Groups</h1>
</div>

<div class="body">
<div class="standard">

<?php
  $name = $_GET['id'];
  echo "<html><h3>Leave a Review for ".$name."</h3></html>";?>

<form action="leaveReview.php" method="post" accept-charset='UTF-8'>
  <br>
  <input type="radio" name="rating" value=1>1 Star
  <input type="radio" name="rating" value=2>2 Star
  <input type="radio" name="rating" value=3>3 Star
  <input type="radio" name="rating" value=4>4 Star
  <input type="radio" name="rating" value=5>5 Star
  <br>
  <br>
  <textarea rows="10" cols="70" name="details">comments</textarea>
  <br>
  <input type="submit" value="Leave Review" name="leaveReview" style="color: black; font-size: 2em; margin-top:25px;">
</form>
</div>
</div>
</body>
</html>


