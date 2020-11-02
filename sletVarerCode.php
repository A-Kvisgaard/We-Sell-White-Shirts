<?php
include_once './connect.php';

foreach ($_REQUEST as $value) {
  # Only numbers get trough this if-statment
  if ($value > 0) {
    #DELETE "Vare" with corresponing ID
    $stmt = $pdo -> query("DELETE FROM `varetabel` WHERE `varetabel`.`vareID` = $value");
    echo "Vare med vareID $value, blev slettet <br>";
  }
}
if (isset($_REQUEST['submit'])) {
  header("Location: ./");
}


 ?>
