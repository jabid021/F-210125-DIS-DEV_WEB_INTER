<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</head>

<header>
<div class="container-fluid">
  <div class="row">
      <div id="logo" class="col-3"><a href="connect.php"><img src="img/logoAJC.jpg" width=100></a></div>
      <div id="slogan" class="col-6">King and co. <i class="fas fa-xs fa-crown"></i></div>
      <div id="account" class="col-3">
<?php

  if(isset($_SESSION["isConnected"])=="Y")
  {
    echo '<span id="connect">Mon compte ('.$_SESSION["login"].')</span>';
  }
  else
  {
    echo '<a href="connect.php">
      <span id="connect">Se connecter</span></a>';
  }
?>



      </div>
  </div>
</div>
</header>
