<?php
/*
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

foreach ($db->query('SELECT username, password FROM users') as $row)
{
  echo 'user: ' . $row['username'];
  echo ' password: ' . $row['password'];
  echo '<br/>';
}


foreach ($db->query('SELECT rating, description, user_id, business FROM reviews') as $row)
{
  echo 'rating: ' . $row['rating'];
  echo ' description: ' . $row['description'];
  echo 'rating: ' . $row['user_id'];	
  echo ' description: ' . $row['business'];
  echo '<br/>';
}

foreach ($db->query('SELECT business FROM business') as $row)
{
  echo 'business: ' . $row['business'];
  echo '<br/>';
}
*/
?>



<!DOCTYPE html>
<html>
<head>
  <title>Rate IBC Groups</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>

<div class="banner">

<a class="rightLink" href="signin.php">Log In</a>
<h1>Rate IBC Groups</h1>
</div>
<div class="leftSide">


</div>


<div class="rightSide">

</div>






</body>
</html>