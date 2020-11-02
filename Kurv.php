<?php
$title = "blank";
include_once 'menu.php';
include_once 'connect.php';

if(isset($_COOKIE['kurv'])){
  $data = unserialize($_COOKIE["kurv"]);
  $total = 0;
  echo "<center><table>
          <tr>
            <th>
              <h3>Vare navn    </h3>
            </th>
            <th>
              <h3>Størelse   </h3>
            </th>
            <th>
              <h3>Pris   </h3>
            </th>
          </tr>";
  for($i=0; $i<= count($data)-1; $i++){
    $prisdata = $data[$i][1];
    $navndata = $data[$i][2];
    $storelsedata = $data[$i][3];
    $total += $prisdata;
    echo "<tr>
    <td>$navndata   </td>
    <td>$storelsedata   </td>
    <td>$prisdata   </td></tr>";
  }
  echo "<tr><td></td><td></td><td>Total: $total</td></tr>";
  echo "</center>";
  echo "<h2>Tøm kurv</h2>";
  echo "<a href='./wipe.php'>";
  echo "<img src='pic/kurv.png'>";
}
else {
  echo "Din kurv er tom";
}



?>
