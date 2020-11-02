<?php
$title = "Login";
# Include header and menu
include_once 'menu.php';
?>
<div class="center-body-container">
  <form class="login-form" action="index.php" method="post">
    <input placeholder="E-mail" type="text" name="email"><br><br>
    <input placeholder="Kodeord" type="password" name="pass"><br><br>
    <center><input type="submit" name="submit" value="Login"></center>
  </form>
  <center><br>Er du ikke Medlem? <br>
  <a href="tilmeld.php">Tilmeld dig her</a></center>

</div>
