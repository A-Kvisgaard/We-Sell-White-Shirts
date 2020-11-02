<?php
$error_array = array(
  "Det indtastede postnummer <br> eksistere ikke!",
  "Den indtastede e-mail <br> eksistere allerede",
  "Test");
if(isset($_GET['error'])){
  $error = (int)$_GET['error'];
  if ($error>0) {
    echo "<p id='error'>".$error_array[$error-1]."</p><br><br>";
  }
}?>
