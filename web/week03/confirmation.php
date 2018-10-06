<!DOCTYPE html>
<html>
<head>
  <title>Confirmation</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<?php
$name = htmlspecialchars($_POST["name"]);
$address = htmlspecialchars($_POST["address"]);
$city = htmlspecialchars($_POST["city"]);
$state = htmlspecialchars($_POST["state"]);
$zip = htmlspecialchars($_POST["zip"]);


 session_start();
   function display() {
     if($_SESSION['haveBolo'] === True)
     {
       echo "Bolo<br>";
     }
     if($_SESSION['haveCoxinha'] === True)
     {
       echo "Coxinha<br>";
     }
     if($_SESSION['haveEmpadinha'] === True)
     {
       echo "Empadinha<br>";
     }
     if($_SESSION['haveSalgado'] === True)
     {
       echo "Salgado<br>";
     }
     if($_SESSION['haveSonho'] === True)
     {
       echo "Sonho<br>";
     }
     if($_SESSION['havePaoDeMel'] === True)
     {
       echo "Pao de Mel<br>";
     }
   }


?>

<body>
<div class="total">
<div class="address">
Thank you <?php echo $name; ?> for your purchase<br>
Your order has been sent to: <?php echo $address; ?><br>
<?php echo $city; ?>, <?php echo $state; ?> <?php echo $zip; ?><br>
</div>
<div class="order">
  <ul>
    Order:<br>
    <?php display()?>
  </ul>
</div>


</body>
</html>
