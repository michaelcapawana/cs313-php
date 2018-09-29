<!DOCTYPE html>
<html>
<head>
  <title>Michael's Brazilian Treats</title>
  <link rel="stylesheet" type="text/css" href="style.css" />

<style>
* {
    box-sizing: border-box;
}

body {
    background-color:  #009B3A;
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

.row::after {
    content: "";
    clear: both;
    display: table;
}
</style>

</head>



<body>
<?php
//require("nav.php");
?>

<div class="banner">
<h1>Michael's Brazilian Treats</h1>
</div>

<div class="food">
<div class="row">
  <div class="column">
    <img src="bolo.jpg" alt="Snow" style="width:100%">
    <h6>Bolo - $5</h6>
  </div>
  <div class="column">
    <img src="coxinha.jpg" alt="Forest" style="width:100%">
    <h6>Coxinha - $3</h6>
  </div>
  <div class="column">
    <img src="empadinha.jpg" alt="Mountains" style="width:100%">
    <h6>Empadinha de Frango - $2</h6>
  </div>
</div>
<div class="row">
  <div class="column">
    <img src="salgado.jpg" alt="Snow" style="width:100%">
    <h6>Salgado - $4</h6>
  </div>
  <div class="column">
    <img src="sonho.jpg" alt="Forest" style="width:100%">
    <h6>Sonho - $2</h6>
  </div>
  <div class="column">
    <img src="paoDeMel.jpg" alt="Mountains" style="width:100%">
    <h6>Pao de Mel - $3</h6>
  </div>
</div>
</div>
</body>
</html>


