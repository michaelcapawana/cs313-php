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
    $un = $_POST["username"];
    $pw = $_POST["password"];
    echo $un;
    echo $pw;
    $tempPassword = $db->prepare('SELECT * FROM users WHERE username=:un AND password=:pw');
    $tempPassword->execute(array(':un' => $un, ':pw' => $pw));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo $rows;
    echo 'Password: ' . $tempPassword;

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