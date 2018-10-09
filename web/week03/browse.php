<!DOCTYPE html>
<html>
<head>
  <title>Michael's Brazilian Treats</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<?php
   session_start();
   $bolo = False;
   $coxinha = False;
   $empadinha = False;
   $salgado = False;
   $sonho = False;
   $paoDeMel = False;

   if(isset($_POST['addBolo'])){
       $bolo = True;
       $_SESSION['haveBolo'] = $bolo;
   }
   if(isset($_POST['addCoxinha'])){
       $coxinha = True;
       $_SESSION['haveCoxinha'] = $coxinha;
   }
   if(isset($_POST['addEmpadinha'])){
       $empadinha = True;
       $_SESSION['haveEmpadinha'] = $empadinha;
   }
     if(isset($_POST['addSalgado'])){
       $salgado = True;
       $_SESSION['haveSalgado'] = $salgado;
   }
     if(isset($_POST['addSonho'])){
       $sonho = True;
       $_SESSION['haveSonho'] = $sonho;
   }
     if(isset($_POST['addPaoDeMel'])){
       $paoDeMel = True;
       $_SESSION['havePaoDeMel'] = $paoDeMel;
   }
?>


<div class="banner">

<a class="rightLink" href="shoppingCart.php">Shopping Cart</a>
<h1>Michael's Brazilian Treats</h1>
</div>
<div class="food">
<div class="row">
  <div class="column">
    <div class="wrapper fade">
      <img src="boloDescription.png" alt="Bolo Description" style="width:100%">
      <img src="bolo.jpg" alt="Bolo" style="width:100%">
    </div>
    <div class="items">
      <h6>Bolo - $5</h6>
      <form method="post">
	<button name="addBolo">Add to Cart</button>
      </form>
    </div>
  </div>
  <div class="column">
    <div class="wrapper fade">
      <img src="coxinhaDescription.png" alt="Coxinha Description" style="width:100%">
      <img src="coxinha.jpg" alt="Coxinha" style="width:100%">
    </div>
    <div class="items">
      <h6>Coxinha - $3</h6>
      <form method="post">
	<button name="addCoxinha">Add to Cart</button>
      </form>
    </div>
  </div>
  <div class="column">
    <div class="wrapper fade">
      <img src="empadinhaDescription.png" alt="Empadinha Description" style="width:100%">
      <img src="empadinha.jpg" alt="Empadinha" style="width:100%">
    </div>
    <div class="items">
      <h6>Empadinha - $2</h6>
      <form method="post">
	<button name="addEmpadinha">Add to Cart</button>
      </form>
    </div>
  </div>
</div>
<div class="row">
  <div class="column">
    <div class="wrapper fade">
      <img src="salgadoDescription.png" alt="Salgado Description" style="width:100%">
      <img src="salgado.jpg" alt="Salgado" style="width:100%">
    </div>
    <div class="items">
      <h6>Salgado - $4</h6>
      <form method="post">
	<button name="addSalgado">Add to Cart</button>
      </form>
    </div>
  </div>
  <div class="column">
    <div class="wrapper fade">
      <img src="sonhoDescription.png" alt="Sonho Description" style="width:100%">
      <img src="sonho.jpg" alt="Sonho" style="width:100%">
    </div>
    <div class="items">
      <h6>Sonho - $2</h6>
      <form method="post">
	<button name="addSonho">Add to Cart</button>
      </form>
    </div>
  </div>
  <div class="column">
    <div class="wrapper fade">
      <img src="paoDeMelDescription.png" alt="Pao De Mel Description" style="width:100%">
      <img src="paoDeMel.jpg" alt="Pao De Mel" style="width:100%">
    </div>
    <div class="items">
      <h6>Pao de Mel - $3</h6>
      <form method="post">
	<button name="addPaoDeMel">Add to Cart</button>
      </form>
    </div>
  </div>
</div>
</div>
</body>
</html>


