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

function login($db)
{
    $un = $_POST["username"];
    $pw = $_POST["password"];
    echo $un;
    echo $pw;

    $stmt = $db->prepare('SELECT password FROM users WHERE username=:username LIMIT 1');
    $stmt->bindValue(':username', $un, PDO::PARAM_STR);
    try {
    	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	$tempPassword = $result['password'];
	echo "Pass: " . $tempPassword;
	$stmt->closeCursor();
	} catch(PDOException $e) {
	  echo "Error";
	}
}

if(isset($_POST['login']))
{
   login($db);
} 
?> 


<!DOCTYPE html>
<html>
<head>
<title>Log In</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="banner">
<a class="rightLink" href="index.php">Return to Home</a>
<a class="leftLink" href="signup.php">Sign Up</a>
<h1>Rate IBC Groups</h1>
</div>

<h2>Log In</h2>

<div class="standard">
<form action="login.php" method="post" accept-charset='UTF-8'>
  Username:<br>
  <input type="text" name="username" style="font-size: 15px;">
  <br>
  Password:<br>
  <input type="text" name="password" style="font-size: 15px;">
  <br>
  <input type="submit" value="Log In" name="login" style="color: green; font-size: 26px;">
</form>

</div>
</body>
</html> 