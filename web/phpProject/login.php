<?php
session_start();
$loggedIn = $SESSION['in'];
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
    $stmt = $db->prepare('SELECT password, name FROM users WHERE username=:username LIMIT 1');
    $stmt->bindValue(':username', $un, PDO::PARAM_STR);
    try {
    	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	$tempPassword = $result['password'];
	$name = $result['name'];
	$stmt->closeCursor();
	} catch(PDOException $e) {
	  echo "Error";
	}

/*
    $statement = $db->prepare('SELECT name FROM users WHERE username=:username LIMIT 1');
    $statement->bindValue(':username', $un, PDO::PARAM_STR);
    try {
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $name = $result['name'];
        $statement->closeCursor();
        } catch(PDOException $e) {
          echo "Error";
        }
*/

     if(password_verify($pw, $tempPassword)) {
	  $_SESSION['in'] = true;
	  $_SESSION['name'] = $name;

	  header("Location: index.php");
    	  exit;
     } else {
       alert("Invalid Username or Password");       
     }
}

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
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

<div class="body">
<div class="standard">

<?php
  $error = $_SESSION[errorMessage];
  if ($error === true)
  {
	echo "<html><h3>Must Log In Before Leaving a Review</h3></html>";
        $_SESSION[errorMessage] = false;
  } else {
    	echo "<html><h3>Please Log In</h3></html>";
  }?>

<form action="login.php" method="post" accept-charset='UTF-8'>
  <input type="text" name="username" placeholder="Username" style="font-size: 2em; margin-top:50px;">
  <br>
  <input type="password" name="password" placeholder="Password" style="font-size: 2em; margin-top:25px;">
  <br>
  <input type="submit" value="Log In" name="login" style="color: black; font-size: 2em; margin-top:25px;">
</form>
</div>
</div>
</body>
</html> 