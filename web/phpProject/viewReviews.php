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

echo $name;

    $num = 3;
    $stmt = $db->prepare('SELECT reviews.rating, reviews.user_id, reviews.description, reviews.business, FROM reviews, business WHERE reviews.user_id = $num');
    $stmt->bindValue(':business', $num, PDO::PARAM_STR);
    try {
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $reviewer = $result['description'];
        echo $reviewer;

        //echo '<br/>';
        //$rating = $result['rating'];
        //$description = $result['description'];
        //echo "Rating: " . $rating . "/5 Stars: " . $description;
        //echo '<br/>';
        //echo '<br/>';
        $stmt->closeCursor();
        } catch(PDOException $e) {
          echo "Error: $e";
          echo '<br/>';
        }

foreach ($db->query('SELECT rating, description, user_id, business FROM reviews') as $row)
{
  echo 'rating: ' . $row['rating'];
  echo ' description: ' . $row['description'];
  echo ' rating: ' . $row['user_id'];
  echo ' userID: ' . $row['business'];
  echo '<br/>';
}

?>

</div>
</div>
</body>
</html>