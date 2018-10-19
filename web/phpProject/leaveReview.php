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

}

if(isset($_POST['login']))
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
  <input type="text" name="password" placeholder="Still in Progress" style="font-size: 2em; margin-top:25px;">
  <br>
  <input type="submit" value="Leave Review" name="leaveReview" style="color: black; font-size: 2em; margin-top:25px;">
</form>
</div>
</div>
</body>
</html>


