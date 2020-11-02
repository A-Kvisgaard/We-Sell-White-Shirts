<!DOCTYPE html>

<?php
if ($_SESSION['user'] != 1) {
  header("Location: ./");
  die();
}
 ?>

<html style="height:100%; width:1080px;">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <title>We Sell White Shirts</title>
  </head>
  <body>
  <a href="./">Hjem</a>
