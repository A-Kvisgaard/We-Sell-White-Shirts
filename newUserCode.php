<?php
# Check if all inputs were filled
if(isset($_REQUEST['fornavn']) && isset($_REQUEST['efternavn'])
&& isset($_REQUEST['vejnavn']) && isset($_REQUEST['husnummer'])
&& isset($_REQUEST['postnummer']) && isset($_REQUEST['email'])
&& isset($_REQUEST['password'])){

  $for     = $_REQUEST['fornavn'];
  $efter   = $_REQUEST['efternavn'];
  $vej     = $_REQUEST['vejnavn'];
  $husnr   = $_REQUEST['husnummer'];
  $postnr  = $_REQUEST['postnummer'];
  $pass    = $_REQUEST['password'];
  $email   = $_REQUEST['email'];

  include 'connect.php';
  # Get post number ID from database
  # Prepare query that returns CityID
  $query = "SELECT `byId` FROM byreg WHERE `postnummer` = ".$postnr.";";
  #Execute query
  $stmt = $pdo->prepare($query);
  $stmt -> execute(); # Returns false if no results
  if (!$stmt) {# If there's no results
    header('Location:./tilmeld.php?error=e1');
  }else {
    $byId = $stmt->fetch(PDO::FETCH_ASSOC)['byId'];
  }
# Chek if E-mail is avilabe
  $query = "SELECT `fornavn` FROM kundetabel WHERE `email` = ".$email.";";
  $stmt = $pdo->prepare($query);
  $stmt -> execute(); # Returns false if no results
  if (!$stmt) {# If there's no
  # Prepare query that inserst new user in to database
  if (isset($_REQUEST['mellemnavn'])) {
  $mellem = $_REQUEST['mellemnavn'];

# Query if "mellemnavn" is set
  $query = "INSERT INTO `kundetabel`
  (`brugerId`, `fornavn`, `mellemnavn`, `efternavn`, `vejnavn`, `husnummer`, `email`, `kodeord`, `bynummer`)
  VALUES
  (NULL, '".$for."', '".$mellem."', '".$efter."', '".$vej."', '".$husnr."', '".$email."', '".$pass."', '".$byId."');";
  } else {# Query if "mellemnavn" isn't set
    $query = "INSERT INTO `kundetabel`
    (`brugerId`, `fornavn`, `mellemnavn`, `efternavn`, `vejnavn`, `husnummer`, `email`, `kodeord`, `bynummer`)
    VALUES
    (NULL, '".$for."', NULL, '".$efter."', '".$vej."', '".$husnr."', '".$email."', '".$pass."', '".$byId."');";
  }
# Execute Query
$stmt = $pdo->prepare($query);
$stmt -> execute();
# Disconnect form database
include_once 'disconnect.php';
header("Location:./index.php");
}else {
  header('Location:./tilmeld.php?error=e2');
      }
}
?>
