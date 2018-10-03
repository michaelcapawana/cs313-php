<!DOCTYPE html>
<html>
<head>
  <title>Shopping Cart</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<?php
   session_start();
   function display() {
     if($_SESSION['haveBolo'] === True)
     {
       echo "Bolo<br>";
       <form method="post">
        <button name="addBolo">Add to Cart</button>
      </form>
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
<a href="browse.php">Continue Shopping</a>
<a href="checkout.php">Checkout</a>
<div class="banner">
  <h1>Shopping Cart</h1>
</div>
<div class="cartItems">
  <ul>
    <?php display()?>
  </ul>
</div>


</body>
</html>


