<?php
$title = "blank";
include_once 'menu.php';
include_once 'connect.php';
$Wheredidicomefrom = $_SERVER["QUERY_STRING"];
  $sth = $pdo->prepare("SELECT vareBeskrivelse,vareBilled,pris,vareNavn,vareID FROM varetabel WHERE vareID=$Wheredidicomefrom");
$sth->execute();
$result = $sth->fetchAll();

#var_dump($result);
foreach ($result as $value) {
  list($vareBeskrivelse, $billede,$pris,$vareNavn,$vareID) = $value;
  echo "<h1>$vareNavn</h1>";
  echo "<h1>$pris kr</h1>";
  echo "<img src=".$billede.">";
  echo "<h2 class='beskrivelse'>$vareBeskrivelse</h2>";
  echo "<h1>Klik her for at vælge størelse</h1>";
  echo "<div style='padding-left: 50px'>";
  echo "<a href='./additemtocart.php?$vareID'>";
  echo "</a>"; #fix dis
  echo "</div>";

}
echo "<form class='' action='./additemtocart.php' method='post'>";
$sth = $pdo->prepare("SELECT xs,s,m,l,xl FROM varetabel WHERE vareID=$Wheredidicomefrom");
$sth->execute();
$result = $sth->fetchAll();

foreach ($result as $value){
  list($xs, $s, $m, $l, $xl) = $value;
  if ($xs > 0) {
    echo "<input type='radio' name='stoerelse' value='xs'>";
    echo "xs <br>";
  }
  if ($s > 0) {
    echo "<input type='radio' name='stoerelse' value='s'>";
    echo "s <br>";
  }
  if ($m > 0) {
    echo "<input type='radio' name='stoerelse' value='m'>";
    echo "m <br>";
  }
  if ($l > 0) {
    echo "<input type='radio' name='stoerelse' value='l'>";
    echo "l <br>";
  }
  if ($xl > 0) {
    echo "<input type='radio' name='stoerelse' value='xl'>";
    echo "xl <br>";
  }
  echo "<input type='hidden' name='vareID' value='$Wheredidicomefrom' >";
  echo "<input type='submit' name='submit' value='Tilføj til kurv'>";

}
include_once  'footer.php';
?>
