<?php
include_once 'menu.php';
include_once 'connect.php';
#Find data on item
$VareIDKurv = $_REQUEST["vareID"];
$stoerelse = $_REQUEST["stoerelse"];
$sth = $pdo->prepare("SELECT varebilled,pris,vareNavn FROM varetabel WHERE vareID=$VareIDKurv");
$sth->execute();
$result = $sth->fetchAll();

foreach ($result as $value) {
  list($billede,$pris,$vareNavn ) = $value;
}
#Add Data to array
$appendaray = array("$billede", "$pris", "$vareNavn","$stoerelse");
$cookievalue = array ();
#ad to array if already set
if(isset($_COOKIE['kurv'])){
$data = unserialize($_COOKIE["kurv"]);
array_push($data, $appendaray);
setcookie("kurv",serialize($data));
}
#Set new cookie
else {
  setcookie("kurv",serialize($cookievalue),time()+60*60*24);
  array_push($cookievalue, $appendaray);
  setcookie("kurv",serialize($cookievalue));
}

header("location: ./Kurv.php");




?>
