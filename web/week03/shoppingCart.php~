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
       ?> <div align='center'><?php echo "Bolo<br>"; ?></div> 
       //echo "Bolo<br>";?>
       <form method="post">
         <button id="checkoutButton" name="removeBolo">Remove from Cart</button>
       </form><?php;
     }   
     if(isset($_POST['removeBolo'])){
       $bolo = False;
       $_SESSION['haveBolo'] = $bolo;
       header("Refresh:0; url=shoppingCart.php");
     }


     if($_SESSION['haveCoxinha'] === True)
     {
       echo "Coxinha<br>";?>
       <form method="post">
         <button id="checkoutButton" name="removeCoxinha">Remove from Cart</button>
       </form><?php;

     }
     if(isset($_POST['removeCoxinha'])){
       $coxinha = False;
       $_SESSION['haveCoxinha'] = $coxinha;
       header("Refresh:0; url=shoppingCart.php");
     }


     if($_SESSION['haveEmpadinha'] === True)
     {
       echo "Empadinha<br>";?>
       <form method="post">
         <button id="checkoutButton" name="removeEmpadinha">Remove from Cart</button>
       </form><?php;
     }
     if(isset($_POST['removeEmpadinha'])){
       $empadinha = False;
       $_SESSION['haveEmpadinha'] = $empadinha;
       header("Refresh:0; url=shoppingCart.php");
     }


     if($_SESSION['haveSalgado'] === True)
     {
       echo "Salgado<br>";?>
       <form method="post">
         <button id="checkoutButton" name="removeSalgado">Remove from Cart</button>
       </form><?php;
     }
     if(isset($_POST['removeSalgado'])){
       $salgado = False;
       $_SESSION['haveSalgado'] = $salgado;
       header("Refresh:0; url=shoppingCart.php");
     }


     if($_SESSION['haveSonho'] === True)
     {
       echo "Sonho<br>";?>
       <form method="post">
         <button id="checkoutButton" name="removeSonho">Remove from Cart</button>
       </form><?php;
     }
     if(isset($_POST['removeSonho'])){
       $sonho = False;
       $_SESSION['haveSonho'] = $sonho;
       header("Refresh:0; url=shoppingCart.php");
     }


     if($_SESSION['havePaoDeMel'] === True)
     {
       echo "Pao de Mel<br>";?>
       <form method="post">
         <button id="checkoutButton" name="removePaoDeMel">Remove from Cart</button>
       </form><?php;
     }
     if(isset($_POST['removePaoDeMel'])){
       $paoDeMel = False;
       $_SESSION['havePaoDeMel'] = $paoDeMel;
       header("Refresh:0; url=shoppingCart.php");
     }
   }
?>
<a class="leftLink" href="browse.php">Continue Shopping</a>
<a class="rightLink" href="checkout.php">Checkout</a>
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


