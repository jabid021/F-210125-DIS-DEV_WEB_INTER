<?php
session_start();
 ?>
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</head>

</header>
	<div id="carousel_TopLeft" class="carousel slide" data-ride="carousel">
	  <div class="carousel-inner">
		<div class="carousel-item active">
		  <img class="d-block w-100" src="image/Logo/Renault.jpg" alt="First slide">
		</div>
		<div class="carousel-item">
		  <img class="d-block w-100" src="image/Logo/BMW.png" alt="Second slide">
		</div>
		<div class="carousel-item">
		  <img class="d-block w-100" src="image/Logo/Citroen.png" alt="Third slide">
		</div>
		<div class="carousel-item">
		  <img class="d-block w-100" src="image/Logo/Peugeot.png" alt="Fourth slide">
		</div>
	  </div>
	  
		</div>
	<div id="carousel_TopRight" class="carousel slide" data-ride="carousel">
	  <div class="carousel-inner">
		<div class="carousel-item active">
		  <img class="d-block w-100" src="image/Logo/BMW.png" alt="First slide">
		</div>
		<div class="carousel-item">
		  <img class="d-block w-100" src="image/Logo/Citroen.png" alt="Second slide">
		</div>
		<div class="carousel-item">
		  <img class="d-block w-100" src="image/Logo/Peugeot.png" alt="Third slide">
		</div>
		<div class="carousel-item">
		  <img class="d-block w-100" src="image/Logo/Renault.jpg" alt="Fourth slide">
		</div>
	  </div>
	</div>

	<div id="Slogan"><a href="connect.php"><h3>Avec Cheche Auto..... Tu trouves ce qu'il te faut !!</h3></div></a>
	<div id="account" class="col-3"> </div>
</header>


<?php
if(isset($_SESSION["isConnected"])=="Y")
  {
    echo '<span id="connect">Mon compte ('.$_SESSION["pseudo"].')</span>';
	echo '<a href="disconnect.php"><span id="btn_deconnect">Se déconnecter</span></a>';
	echo '<a href="modification.php"><span id="btn_modif">Modifier...</span></a>';
  }
  else
  {
    echo '<a href="connect.php">
      <span id="connect">Se connecter</span></a>';

  }   
?>

