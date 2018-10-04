<!DOCTYPE html>
<html>
<head>
  <title>Checkout</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<h1>Checkout</h1>
<div class="cartItems">
  <ul>
    <?php display();?>
  </ul>
</div>
<form action="confirmation.php" method="post">
  Name:<br>
  <input type="text" name="name">
  <br>
  Street Address:<br>
  <input type="text" name="address">
  <br>
  City:<br>
  <input type="text" name="city">
  <br>
  State:<br>
  <input type="text" name="state">
  <br>
  Zip Code:<br>
  <input type="text" name="zip">
  <br>
</form>
</body>
</html>



<?php
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
