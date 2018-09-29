<!DOCTYPE html>
<html>
<head>
  <title>Michael's Padaria</title>
  <link rel="stylesheet" type="text/css" href="style.css" />

<style>
* {
    box-sizing: border-box;
}

h1 {
    font-size: 40px;
    text-align: center;
    color: green;
}

h2 {
    font-size: 40px;
    text-align: center;
    color: green;
}

.column {
    float: left;
    width: 33.33%;
    padding: 40px;
}

.column img {
    height: 250px;
    width: 150px;
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

<h1>Michael's Padaria</h1>
<h2>Home of the Best Brazilian Treats</h2>

<div class="row">
  <div class="column">
    <img src="bolo.jpg" alt="Snow" style="width:100%">
  </div>
  <div class="column">
    <img src="coxinha.jpg" alt="Forest" style="width:100%">
  </div>
  <div class="column">
    <img src="empadinha.jpg" alt="Mountains" style="width:100%">
  </div>
</div>
<div class="row">
  <div class="column">
    <img src="salgado.jpg" alt="Snow" style="width:100%">
  </div>
  <div class="column">
    <img src="sonho.jpg" alt="Forest" style="width:100%">
  </div>
  <div class="column">
    <img src="paoDeMel.jpg" alt="Mountains" style="width:100%">
  </div>
</div>

</body>
</html>


