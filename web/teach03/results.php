<html>
<body>
<?php
$email = htmlspecialchars($_POST["email"]);
?>
Welcome <?php echo $_POST["name"]; ?><br>
Your email is: <a href="mailto:<?=$email ?>"><?=$email ?></a><br>
Your major is: <?php echo $_POST["major"]; ?><br>
Your comments say: <?php echo $_POST["comments"]; ?><br>
The continents you have visited are: <br>
<?php
$continents = $_POST["continents"];
foreach ($continents as $continent) {
  echo $continent . "<br>";
}
?>
</body>
</html> 
