<?php
session_start();
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
  <title>Rate IBC Groups</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>


<?php
  if($_SESSION['in'] === true) {
    $username = $_SESSION['name'];?>
    <div class="banner">
    <a class="rightLink" href="logout.php">Log Out</a>
    <a class="leftLink"><?php echo"Hello, " . $username?></a>
    <h1>Rate IBC Groups</h1>
    </div><?php
  } else {?>
    <div class="banner">
    <a class="leftLink" href=signup.php>Sign Up</a>
    <a class="rightLink" href="login.php">Log In</a>
    <h1>Rate IBC Groups</h1>
    </div><?php
  }
?>


<div class="body">
<div class="leftSide">
<h2>Top 5</h2>
<p><?php
foreach ($db->query('SELECT name, score FROM business ORDER BY score DESC LIMIT 5') as $row)
{
  echo $row['name'];
  $score = $row['score'];
  $formatted_number =  number_format((float)$score, 1, '.', '');
  echo ' - ' . $formatted_number;
  echo '<br/>';
}
?></p>
</div>

<div class="rightSide">
<h2>Companies</h2>
<p><?php
foreach ($db->query('SELECT name, score FROM business ORDER BY name') as $row)
{
  $name = $row['name'];
  echo $name;
  $score = $row['score'];
  $formatted_number =  number_format((float)$score, 1, '.', '');
  echo ' - ' . $formatted_number;
  echo '<br/>';
  echo "<a href='leaveReview.php?id=$name'>Leave Review</a>";
  $_SESSION['name'] = $username;
  echo "  ";
  echo "<a href='viewReviews.php?id=$name'>View Reviews</a>";
  $_SESSION['name'] = $username;
  echo '<br/>';
}
?></p>
</div>
</div>

</body>
</html>