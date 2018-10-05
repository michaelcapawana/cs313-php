<?php
$name = htmlspecialchars($_POST["name"]);
$address = htmlspecialchars($_POST["address"]);
$city = htmlspecialchars($_POST["city"]);
$state = htmlspecialchars($_POST["state"]);
$zip = htmlspecialchars($_POST["zip"]);
?>



<html>
<body>
Thank you <?php echo $name; ?> for your purchase<br>
Your order has been sent to: <?php echo $address; ?><br>
                             <?php echo $city; ?>, <?php echo $state; ?> <?php echo $zip; ?><br>

</body>
</html>
