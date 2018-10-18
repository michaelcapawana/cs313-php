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

function signup($db)
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

if(isset($_POST['signup']))
{
   signup($db);
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Sign Up</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="banner">
<a class="rightLink" href="index.php">Return to Home</a>
<a class="leftLink" href="login.php">Sign Up</a>
<h1>Rate IBC Groups</h1>
</div>

<div class="body">
<div class="standard">
<h3>Please Sign Up</h3>
<form action="signup.php" method="post" accept-charset='UTF-8'>
  <input type="text" name="username" placeholder="Username" style="font-size: 2em; margin-top:50px;">
  <br>
  <input type="text" name="password" placeholder="Password" style="font-size: 2em; margin-top:25px;">
  <br>
  <input type="text" name="verifyPassword" placeholder="Verify Password" style="font-size: 2em; margin-top:25px;">
  <br>
  <input type="text" name="name" placeholder="Name (eg. John Doe)" style="font-size: 2em; margin-top:25px;">
  <br>
  <input type="submit" value="Sign Up" name="signup" style="color: black; font-size: 2em; margin-top:25px;">
</form>
</div>
</div>
</body>
</html>