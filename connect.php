<?php
try{# Try esatblishing connection to database
  $pdo = new PDO('mysql:host=localhost;dbname=wsws','root');
}catch (PDOException $e) {# Catch anny error
    print "Fejl!: " . $e->getMessage() . "<br/>";
    die();
}
