<!DOCTYPE html>
<html>
<head>
  <title>Checkout</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<?php
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
<a href="shoppingCart.php">Return to Cart</a>
<h1>Checkout</h1>
<div class="total">
<div class="address">
<form action="confirmation.php" method="post">
  Name:<br>
  <input type="text" name="name" style="font-size: 15px;">
  <br>
  Street Address:<br>
  <input type="text" name="address" style="font-size: 15px;">
  <br>
  City:<br>
  <input type="text" name="city" style="font-size: 15px;">
  <br>
  State:<br>
  <input type="text" name="state" style="font-size: 15px;">
  <br>
  Zip Code:<br>
  <input type="text" name="zip" style="font-size: 15px;">
  <br>
  <input type="submit" value="Confirm Payment" style="color: green; font-size: 26px;">
</form>
</div>
<div class="order">
  <ul>
    Order:<br>
    <?php display()?>
  </ul>
</div>
</div>
</body>
</html>



