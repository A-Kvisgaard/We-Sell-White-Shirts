<?php
$title = "Tilmeld";
# Include header and menu
include_once 'menu.php';?>

<div id="maxWidth415" class="center-body-container">
  <center>
  <h3>Opret ny bruger</h3>

  <form class="signup-form" action="index.php" method="post">
    <h4>Navn</h4>
    <input placeholder="*Fornavn" type="text" name="fornavn" required>
    <br><br>
    <input placeholder="Mellemnavn" type="text" name="mellemnavn">
    <br><br>
    <input placeholder="*Efternavn" type="text" name="efternavn" required>
    <br>
    <h4>Adresse</h4>
    <input placeholder="*Vejnavn" type="text" name="vejnavn" required>
    <br><br>
    <input placeholder="*Husnummer" type="text" name="husnummer" required>
    <br><br>
    <input placeholder="*Postnummer" type="int" name="postnummer" required>
    <br><br>
    <input placeholder="*E-mail" type="email" name="email" required>
    <br><br>
    <input placeholder="*Kodeord" type="password" name="password" required>
    <br><br>
    <?php include 'error_handler_tilmeld.php';?>
    </center>
    <center>
      <input type="submit" name="submit" value="Opret bruger">
    </center>
  </form>

</div>

<?php include_once 'footer.php'; ?>
