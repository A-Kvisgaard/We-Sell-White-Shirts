<?php
if (isset($_REQUEST['email']) && isset($_REQUEST['pass'])) {
  $email = $_REQUEST['email'];
  $pass  = $_REQUEST['pass'];

  include_once 'connect.php';
  #Check if user is in database
  $query = "SELECT `brugerId` FROM `kundetabel`
  WHERE `email`='".$email."' AND `kodeord`='".$pass."';";

  $stmt = $pdo->prepare($query);
  $stmt -> execute();
  $brugerId = $stmt->fetch(PDO::FETCH_ASSOC)['brugerId'];
  #
  if ($brugerId){
    session_start();
    sleep(0.3);
    $_SESSION['user'] = $brugerId;
  } else {
    header('Location: ./login.php');
  }
}
?>
