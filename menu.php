<?php include_once 'header.php'; ?>
<div class="navbar">
  <a href="index.php">Home</a>
  <div class="dropdown">
    <button class="dropbtn">Shop</button>
    <div class="dropdown-content">
      <a href="./koen.php?koen=mand">Mænd</a>
      <a href="./koen.php?koen=kvinde">Kvinder</a>
    </div>
  </div>
  <a id="menu_float_right" href="kurv.php">Kurv</a>
  <?php
  if (!isset($_SESSION['user'])) {
    echo '<a id="menu_float_right" href="tilmeld.php">Opret ny bruger</a>
    <a id="menu_float_right" href="login.php">Log ind</a>';
  } else {
   echo "<a id='menu_float_right' href='logout.php'>Log ud</a>";

  }

  ?>
</div>
