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
    $un = $_POST["username"];
    $pw = $_POST["password"];
    $name = $_POST["name"];

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
  <br>
  <input type="radio" name="rating" value="1 Star">1 Star
  <input type="radio" name="rating" value="2 Star">2 Star
  <input type="radio" name="rating" value="3 Star">3 Star
  <input type="radio" name="rating" value="4 Star">4 Star
  <input type="radio" name="rating" value="5 Star">5 Star
  <br>
  <textarea rows="10" cols="70" name="details">comments</textarea>
  <br>
  <input type="submit" value="Leave Review" name="leaveReview" style="color: black; font-size: 2em; margin-top:25px;">
</form>
</div>
</div>
</body>
</html>


