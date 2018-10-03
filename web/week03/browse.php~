<!DOCTYPE html>
<html>
<head>
  <title>Michael's Brazilian Treats</title>
  <link rel="stylesheet" type="text/css" href="style.css" />

<style>
* {
    box-sizing: border-box;
}
a {
    float: right;
}
body
 {
    background-color:  #009B3A;
}

button {
    display: inline-block;
    float: right;
}

h1 {
    font-size: 60px;
    text-align: center;
    color: #FEDF00;
    margin-top: 2px;
    margin-bottom: 0px;
}

h6 {
    font-size: 20px;
    text-align: center;
    color: #FEDF00;
    margin-top: 1px;
    margin-bottom: 0px;
    display: inline-block;
}

.banner {
    background-color: #009B3A;
}

.column {
    float: left;
    width: 33.33%;
    padding-top: 30px;
    padding-bottom: 0px;
    padding-right: 40px;
    padding-left: 40px;
}

.column img {
    height: 250px;
    width: 150px;
}

.food {
    background-color: #009B3A;
}

.items {
    width: 65%;
    margin-left: 70px;
}

.row::after {
    content: "";
    clear: both;
    display: table;
}
</style>

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

<a href="shoppingCart.php">Shopping Cart</a>
<h1>Michael's Brazilian Treats</h1>
</div>
<div class="food">
<div class="row">
  <div class="column">
    <img src="bolo.jpg" alt="Snow" style="width:100%">
    <div class="items">
      <h6>Bolo - $5</h6>
      <form method="post">
	<button name="addBolo">Add to Cart</button>
      </form>
    </div>
  </div>
  <div class="column">
    <img src="coxinha.jpg" alt="Forest" style="width:100%">
    <div class="items">
      <h6>Coxinha - $3</h6>
      <form method="post">
	<button name="addCoxinha">Add to Cart</button>
      </form>
    </div>
  </div>
  <div class="column">
    <img src="empadinha.jpg" alt="Mountains" style="width:100%">
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
    <img src="salgado.jpg" alt="Snow" style="width:100%">
    <div class="items">
      <h6>Salgado - $4</h6>
      <form method="post">
	<button name="addSalgado">Add to Cart</button>
      </form>
    </div>
  </div>
  <div class="column">
    <img src="sonho.jpg" alt="Forest" style="width:100%">
    <div class="items">
      <h6>Sonho - $2</h6>
      <form method="post">
	<button name="addSonho">Add to Cart</button>
      </form>
    </div>
  </div>
  <div class="column">
    <img src="paoDeMel.jpg" alt="Mountains" style="width:100%">
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


