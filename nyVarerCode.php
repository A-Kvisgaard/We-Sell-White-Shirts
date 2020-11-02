<?php
if (isset($_REQUEST['submit'])) {
  #Connect to db
  include './connect.php';
  $billed_navn = $_FILES["fileToUpload"]['name'];

    if(isset($billed_navn)){
      #File handeling fetchede from https://www.w3schools.com/php/php_file_upload.asp
      $target_dir = "./pic/"; #Path to picture folder form current file
      #Adds pictures path to picture folder path
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      $uploadOk = 1;
      #Image file type gets determined
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      // Check if image file is a actual image
      if(isset($_POST["submit"])) {
        echo "submit";
          #getimagesize() returns dimensions of picture. Returns False on faliure i.e. not a pictures.
          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
              echo "Filen er et billede - " . $check["mime"] . ". <br>";
          } else {
              echo "Filen er ikke et billede <br>";
              $uploadOk = 0;
          }
      }

      // Check if file already exists
      if (file_exists($target_file)) {
          echo "Billedet eksistere allerede, eller et billede med samme navn<br>";
          $uploadOk = 0;
      }

      // Check file size
      if ($_FILES["fileToUpload"]["size"] > 500000) {
          echo "Dit billede er for stort<br>";
          $uploadOk = 0;
      }

      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
          echo "Kun JPG, JPEG, PNG & GIF tiladt.<br>";
          $uploadOk = 0;
      }
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
          echo "Din fil blev ikke uploaded<br>";
      // if everything is ok, try to upload file
      } else {
          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            #Move file
              echo "Filen ". basename( $_FILES["fileToUpload"]["name"]). " blev oploaded.<br>";
              $billed_fil = $_FILES["fileToUpload"]["name"];
          } else {
              echo "Der skete en fejl, prøv venligst igen<br>";
          }}}

      # Prep variables for SQL-string
      $navn         = $_REQUEST['varenavn'];
      $beskrivelse  = $_REQUEST['vareBeskrivelse'];
      $pris         = $_REQUEST['pris'];
      $koen         = $_REQUEST['koen'];
      $xs           = $_REQUEST['xs'];
      $s            = $_REQUEST['s'];
      $m            = $_REQUEST['m'];
      $l            = $_REQUEST['l'];
      $xl           = $_REQUEST['xl'];
      # Make SQl String
      $query = "INSERT INTO `varetabel`(`vareID`, `vareNavn`, `vareBeskrivelse`, `vareBilled`, `xs`, `s`, `m`, `l`, `xl`, `pris`, `koen`)
      VALUES (NULL, '$navn','$beskrivelse', './pic/$billed_navn', $xs , $s, $m, $l, $xl, '$pris', '$koen');";
      #execute SQL
      $stmt = $pdo -> query($query);
      #disconnect from database

      #execute was sucssesful
      var_dump($stmt);
      if ($stmt) {
        include_once './disconnect.php';
        header("Location: .");
      } else {
        include_once './disconnect.php';
      }

}
 ?>
