<?php include_once 'header_back.php'; ?>

    <form action="./index.php" method="post">
      <table>
        <tr>
          <th>
            <h3>Vare billede</h3>
          </th>
          <th>
            <h3>Vare navn</h3>
          </th>
          <th>
            <h3>Køn</h3>
          </th>
          <th>
            <h3>Slet varer</h3>
          </th>
        </tr>

        <?php
        include_once './connect.php';
        $stmt = $pdo ->prepare("SELECT `koen`, `vareID`, `vareNavn`, `vareBilled` FROM `varetabel`");
        $stmt -> execute();
        $result = $stmt -> fetchAll();

        foreach ( $result as $value) {
          list($koen, $ID, $navn, $path) = $value;
          echo "<tr> <td>
                  <img src='$path' alt='$navn s billede'>
                </td>";
          echo "<td>
                  $navn
                </td>";
          echo "<td>
                  $koen
                </td>";
          echo "<td><center>
                  <input type='checkbox' name='$ID' value='$ID'>
                </center></td></tr>";

        }?>

      </table>
      <input type="submit" name="submit" value="Slet valgte varer">
    </form>
