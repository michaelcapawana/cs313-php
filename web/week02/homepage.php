<!DOCTYPE html>
<html>
<head>
  <title>Michael Capawana Homepage</title>
  <link rel="stylesheet" type="text/css" href="homepage.css" />
</head>
<body>
 <ul id="navbar">
  <li><a class="active" href="homepage.php">Home</a></li>
  <li><a href="assignments.php">Coming Soon</a></li>
</ul>
  <h1>Michael Capawana</h1>
<div class="wrap">
  <img src="sandpoint.png" alt="Sandpoint">
  <ul id="list">
    <li>Studies Computer Science at BYU-Idaho</li>
    <li>Accepted offer from USAA as a Software Engineer</li>
    <li>Married for 2 years to Andreza Capawana</li>
    <li>Served a mission in Vitoria, Brazil</li>
  </ul>
</div>

<div class="echo">
<?php
     echo "Today is " . date("l") . ", " . date("m-d-Y");
      ?>
</div>

</body>
</html>
