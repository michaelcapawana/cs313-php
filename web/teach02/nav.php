<?php
$file = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
echo "The current value is $file";
?>

<nav class="nav">
  
 <ul id="navbar">
  

<li class="nav-item <?php if ($file === 'about') echo 'active' ?>">
<a href="about.php">About Us</a>
</li>
<li class="nav-item <?php if ($file === 'home') echo 'active' ?>">
<a href="home.php">Home</a>
</li>
<li class="nav-item <?php if ($file === 'login') echo 'active' ?>">
<a href="login.php">Login</a>
</li>
<ul>
</nav>