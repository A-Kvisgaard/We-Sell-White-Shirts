<?php
include_once 'menu.php';
include_once 'connect.php';
$koen = $_GET["koen"];
$title = "$koen";
$sth = $pdo->prepare("SELECT vareBilled,pris,vareNavn,vareID FROM varetabel WHERE koen='$koen'" ); #HUsk at tilføje køn her
$sth->execute();
$result = $sth->fetchAll();
echo "<center>";
foreach ($result as $value) {
  list($billede,$pris,$vareNavn,$vareID) = $value;
  echo "<figure>";
    echo "<a href='./generatenewpage.php?$vareID'>";
    echo "<img src=".$billede.">";
    echo "</a>";
    echo "<figcaption>$vareNavn</figcaption>" ;
    echo "<figcaption>$pris kr.</figcaption>" ;
    echo "</figure>";
}
echo "</center>";



include_once  'footer.php';

?>
