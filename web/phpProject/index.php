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

/*
foreach ($db->query('SELECT username, password, name FROM users') as $row)
{
  echo 'user: ' . $row['username'];
  echo ' password: ' . $row['password'];
  echo ' name: ' . $row['name'];
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

foreach ($db->query('SELECT name, score FROM business') as $row)
{
  echo 'business: ' . $row['name'];
  echo ' score: ' . $row['score'];
  echo '<br/>';
}
*/


?>



<!DOCTYPE html>
<html>
<head>
  <title>Rate IBC Groups</title>
<?php 
$loggedIn = FALSE;
$name = "Put sql stuff here to get name";
if($loggedIn) {
  echo "Welcome " .$name;?>
  <button class="logout"> <?php
}
else {
  ?><link rel="stylesheet" type="text/css" href="style.css" /><?php
}
?>
</head>

<body>

<?php
session_start();
function display() {
  if($_SESSION['loggedIn'] === True) {
    $name = $_SESSION['name'];
    <div class="banner">
    <a class="leftLink" href=signup.php>Signup</a>
    <a class="rightLink" href="login.php">Login</a>
    <h1>Rate IBC Groups</h1>
    </div>
  } else {
    <div class="banner">
    <a class="leftLink" href=signup.php>Sign Up</a>
    <a class="rightLink" href="login.php">Log In</a>
    <h1>Rate IBC Groups</h1>
    </div>
  }
}
?>

<div class="body">

<div class="leftSide">
<h2>Top 5</h2>
<p><?php
foreach ($db->query('SELECT name, score FROM business ORDER BY score DESC LIMIT 5') as $row)
{
  echo $row['name'];
  echo ' - ' . $row['score'];
  echo '<br/>';
}
?></p>
</div>

<div class="rightSide">
<p><?php
foreach ($db->query('SELECT name, score FROM business ORDER BY name') as $row)
{
  echo $row['name'];
  echo ' - ' . $row['score'];
  echo '<br/>';
  echo "<a href='leaveReview.php?id=$id'>Leave Review</a>";
  echo " ";
  echo "<a href='viewReviews.php?id=$id'>View Reviews</a>";
  echo '<br/>';
}
?></p>
</div>
</div>

</body>
</html>