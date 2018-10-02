<html>
<body>

Welcome <?php echo $_POST["name"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?><br>
Your major is: <?php echo $_POST["major"]; ?><br>
Your comments say: <?php echo $_POST["comments"]; ?><br>
The continents you have visited are: 
<?php
$continent = $_POST["continents"];
foreach ($continents as $continent) {
  echo $_POST["continent"]; <br>
}
?>
</body>
</html> 
