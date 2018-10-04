<!DOCTYPE html>
<html>
<head>
<title>Session</title>
</head>
<body>

<?php
session_start();

if(isset($_SESSION["numVisits"]))
{
  $_SESSION["numVisits"]++;
}
else
{
$_SESSION["numVisits"] = 1;
}

$visits = $_SESSION["numVisits"];

echo "You have visited $visits times.";


?>
</body>
</html> 
