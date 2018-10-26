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
    $vpw = $_POST["verifyPassword"];
    $name = $_POST["name"];

 if($un == NULL || $pw == NULL || $vpw == NULL || $name == NULL) {
    alert("All fields must be filled out");
 } elseif($pw != $vpw) {
    alert("Passwords did not match up");
 } else {
    $hashedPW = password_hash($pw, PASSWORD_DEFAULT);
    var_dump($hashedPW);

    $stmt = $db->prepare('INSERT INTO users(username, password, name) VALUES(:username, :password, :name)');
    $stmt->bindValue(':username', $un, PDO::PARAM_STR);
    $stmt->bindValue(':password', $hashedPW, PDO::PARAM_STR);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    try {
        $stmt->execute();
        $stmt->closeCursor();
	session_start();
	$_SESSION['loggedIn'] = true;
        $_SESSION['name'] = $name;
        header("Location: index.php");
        exit;
        } catch(PDOException $e) {
          echo "Error";
        }
 }
}

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
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
<a class="leftLink" href="login.php">Log In</a>
<h1>Rate IBC Groups</h1>
</div>

<div class="body">
<div class="standard">
<h3>Please Sign Up</h3>
<form action="signup.php" method="post" accept-charset='UTF-8'>
  <input type="text" name="username" placeholder="Username" style="font-size: 2em; margin-top:50px;">
  <br>
  <input type="password" name="password" placeholder="Password" style="font-size: 2em; margin-top:25px;">
  <br>
  <input type="password" name="verifyPassword" placeholder="Verify Password" style="font-size: 2em; margin-top:25px;">
  <br>
  <input type="text" name="name" placeholder="Name (eg. John Doe)" style="font-size: 2em; margin-top:25px;">
  <br>
  <input type="submit" value="Sign Up" name="signup" style="color: black; font-size: 2em; margin-top:25px;">
</form>
</div>
</div>
</body>
</html>