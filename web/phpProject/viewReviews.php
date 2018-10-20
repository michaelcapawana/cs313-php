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
?>


<!DOCTYPE html>
<html>
<head>
<title>Reviews</title>
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
  echo "<html><h3>Reviews for ".$name."</h3></html>";  


$statement = $db->prepare('SELECT id FROM business WHERE name=:name');
$statement->bindValue(':name', $name, PDO::PARAM_STR);
try {
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    $num = $result['id'];
    $statement->closeCursor();
    } catch(PDOException $e) {
          echo "Error with num: $e";
          echo '<br/>';
    }

    $stmt = $db->prepare('SELECT reviews.rating, reviews.user_id, reviews.description, reviews.business FROM reviews, business WHERE reviews.business=:business');
    $stmt->bindValue(':business', $num, PDO::PARAM_INT);
    try {
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_ASSOC);

	$description = $results['description'];
  	echo $description;
        $reviewer = $results['description'];
	//echo $reviewer;


	$rating = $results['rating'];
	echo $rating;
        //$description = $results['description'];
        	
        echo '<br/>';
        //echo "Rating: " . $rating . "/5 Stars: " . $description;
        //echo '<br/>';
        //echo '<br/>';
        $stmt->closeCursor();
        } catch(PDOException $e) {
          echo "Error with desc.: $e";
          echo '<br/>';
        }
/*
foreach ($db->query('SELECT rating, description, user_id, business FROM reviews') as $row)
{
  echo 'rating: ' . $row['rating'];
  echo ' description: ' . $row['description'];
  echo ' rating: ' . $row['user_id'];
  echo ' userID: ' . $row['business'];
  echo '<br/>';
}*/

?>

</div>
</div>
</body>
</html>