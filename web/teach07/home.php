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
  <title>Teach 07</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>


<?php
  if($_SESSION['in'] === true) {
    $username = $_SESSION['name'];?>
    <div class="banner">
    <a class="rightLink" href="logout.php">Log Out</a>
    <a class="leftLink"><?php echo"Welcome " . $username?></a>
    <h1>Teach 07</h1>
    </div><?php
  } else {?>
    <div class="banner">
    <a class="leftLink" href=register.php>Sign Up</a>
    <a class="rightLink" href="signin.php">Log In</a>
    <h1>Teach 07</h1>
    </div><?php
  }
?>




/*
Add this code below to whatever page requires the user to login before accessing


<?php

session_start();
$username = $_SESSION['name'];
$loggedIn = $_SESSION['in'];
if($loggedIn === true) {
} else {
   $_SESSION['errorMessage'] = true;
   header("Location: login.php");
   exit;
}
*/