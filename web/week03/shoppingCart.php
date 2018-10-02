<!DOCTYPE html>
<html>
<head>
  <title>Shopping Cart</title>
  <link rel="stylesheet" type="text/css" href="style.css" />

<style>
* {
    box-sizing: border-box;
}

body {
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

.cartItems {
    padding: 20px;
    background-color: white;
    font-size: 35px;
    text-align: left;
    margin-left: 350px;
    margin-right: 350px;
    margin-top: 15px;
    margin-bottom: 15px;
    height: 300px;
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


