<?php include_once 'header_back.php';
include 'nyVarerCode.php';
?>
<div class="extend">
  <div class="scroll-overflow-container">
    <form action="./nyVarer.php" method="post" enctype="multipart/form-data">
      <table class="table-border">
          <tr>
            <th>
              Varenavn
            </th>
            <th>
              Beskrivelse
            </th>
            <th>
              Pris
            </th>
            <th>
              Køn
            </th>
            <th>
              Upload billede
            </th>
            <th>
              Antal extra small (xs)
            </th>
            <th>
              Antal small (s)
            </th>
            <th>
              Antal medium (m)
            </th>
            <th>
              Antal large (l)
            </th>
            <th>
              Antal extra large (xl)
            </th>

          </tr>
          <tr>
            <td>
              <input type="text" name="varenavn" required>
            </td>
            <td>
              <input type="text" name="vareBeskrivelse" required>
            </td>
            <td>
              <input type="number" name="pris" required>
            </td>
            <td>
              <center> <input type="radio" name="koen" value="mand"> Mand </center> <br>
              <center> <input type="radio" name="koen" value="kvinde"> Kvinde </center>
            </td>
            <td>
              <input type="file" name="fileToUpload" id="fileToUpload">
            </td>
            <td>
              <input class="input_number" type="number" name="xs" placeholder="0">
            </td>
            <td>
              <input class="input_number" type="number" name="s" placeholder="0">
            </td>
            <td>
              <input class="input_number" type="number" name="m" placeholder="0">
            </td>
            <td>
              <input class="input_number" type="number" name="l" placeholder="0">
            </td>
            <td>
              <input class="input_number" type="number" name="xl" placeholder="0">
            </td>
          </tr>
      </table><br>
      <input type="submit" name="submit" value="Opret varer">
    </form>
  </div>
</div>
