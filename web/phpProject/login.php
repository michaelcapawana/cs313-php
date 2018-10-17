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


foreach ($db->query('SELECT username, password, name FROM users') as $row)
{
  echo 'user: ' . $row['username'];
  echo ' password: ' . $row['password'];
  echo ' name: ' . $row['name'];
  echo '<br/>';
}





function login()
{
    echo "Hello ".$_POST["username"];
    $tempPassword = $db->query('SELECT password FROM users WHERE username = $_POST["username"]'); 
    echo 'Password: ' . $tempPassword;

    $tester = 'SELECT password FROM users WHERE username = "mcapawana"';
    echo 'TEST2: ' . $tester;
}

if(isset($_POST['login']))
{
   login();
} 
?> 


<!DOCTYPE html>
<html>
<head>
<title>Log In</title>
</head>
<body>

<h1>Log In</h1>

<form action="login.php" method="post" accept-charset='UTF-8'>
  Username:<br>
  <input type="text" name="username" style="font-size: 15px;">
  <br>
  Password:<br>
  <input type="text" name="password" style="font-size: 15px;">
  <br>
  <input type="submit" value="Log In" name="login" style="color: green; font-size: 26px;">
</form>


</body>
</html> 