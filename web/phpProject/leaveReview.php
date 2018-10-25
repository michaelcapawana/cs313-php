<?php

session_start();
$username = $_SESSION['name'];
$loggedIn = $SESSION['in'];
echo $loggedIn;
if($loggedIn === true) {
   echo "we are good";
   echo $loggedIn;
} else {
   $_SESSION['errorMessage'] = true;
   //header("Location: login.php");
   //exit;
}



$businessName = $_GET['id'];
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

function leaveReview($db, $businessName, $username)
{
    $rating = $_POST["rating"];
    $details = $_POST["details"];
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
    	$businessId = $results['id'];
    	$statement->closeCursor();
    	} catch(PDOException $e) {
          echo "Error with businessId: $e";
          echo '<br/>';
    	  }
    
    $stmt = $db->prepare('INSERT INTO reviews(rating, description, user_id, business) VALUES(:rating, :description, :userId, :businessId )');
    $stmt->bindValue(':rating', $rating, PDO::PARAM_STR);
    $stmt->bindValue(':description', $details, PDO::PARAM_STR);
    $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
    $stmt->bindValue(':businessId', $businessId, PDO::PARAM_STR);
    try {
        $stmt->execute();
        $stmt->closeCursor();
        } catch(PDOException $e) {
          echo "Error";
        }

//start updating score

    $stm = $db->prepare('SELECT * FROM reviews WHERE business=:businessId');
    $stm->bindValue(':businessId', $businessId, PDO::PARAM_STR);
    try {
    	$stm->execute();
	$results = $stm->fetchAll(PDO::FETCH_ASSOC);
        $tempScore = 0.0;
	$numRatings = 0.0;
	foreach($results as $row) {
	     $tempScore += $row['rating'];	   
             $numRatings++;
	}

	$score = $tempScore / $numRatings;
	
	var_dump($businessId);
	$statement = $db->prepare('UPDATE business SET score = :score WHERE id=:businessId');
	$statement->bindValue(':businessId', $businessId, PDO::PARAM_STR);
	$statement->bindValue(':score', $score, PDO::PARAM_STR);
	try {
        $statement->execute();
        $statement->closeCursor();
        } catch(PDOException $e) {
          echo "Error";
        }

	$stm->closeCursor();
        } catch(PDOException $e) {
          echo "Error with businessId: $e";
          echo '<br/>';
          }



}

if(isset($_POST['leaveReview']))
{
   leaveReview($db, $businessName, $username);
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
  //$businessName = $_GET['id'];
  echo "<html><h3>Leave a Review for ".$businessName."</h3></html>";?>

<form action='leaveReview.php?id=<?php echo $businessName; ?>' method="post" accept-charset='UTF-8'>
  <br>
  <input type="radio" name="rating" value=1>1 Star
  <input type="radio" name="rating" value=2>2 Star
  <input type="radio" name="rating" value=3>3 Star
  <input type="radio" name="rating" value=4>4 Star
  <input type="radio" name="rating" value=5>5 Star
  <br>
  <br>
  <textarea rows="10" cols="70" name="details"></textarea>
  <br>
  <input type="submit" value="Leave Review" name="leaveReview" style="color: black; font-size: 2em; margin-top:25px;">
</form>
</div>
</div>
</body>
</html>


