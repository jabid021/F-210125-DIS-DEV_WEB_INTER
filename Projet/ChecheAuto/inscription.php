<?php 
include("header.php");
include("footer.php");
include("bdd.php");

$user=doSQL("SELECT * from compte order by pseudo",array());
$article=doSQL("SELECT * from article join type on type.id=article.type order by article.id",array());
?>
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
<body>
	
		
<div class="content">
        <div class="container">
		<div class="tab-content" id="v-pills-tabContent">
  <h2>Ajout Utilisateur</h2><br><hr/><br>
            <form class="contact-form" action="post/sendPost.php" method="post">
                <div class="row">

                  <input type="hidden" name="tache" value="addUser">
                   
					<div class="col-lg-4">
                        <label for="type" id="type">Type</label>
                        <select id="type" class="form-control" name="type">
                         <option value=client>Client</option>;			
                         <option value=admin>Admin</option>;					
						</select>
                    </div>	

                    <div class="col-lg-4">
                        <label for="pseudo" id="pseudo">Pseudo</label>
                        <input id="pseudo" type="text" name="pseudo" class="form-control" placeholder="Votre nom">
                    </div>
                    <div class="col-lg-4">
                        <label for="MdP" id="MdP">Mot de Passe</label>
                        <input id="MdP" type="password" name="MdP" class="form-control" placeholder="Votre mot de passe">
                    </div>
																				<br><br><br><br><br>
					<div class="col-lg-12">
						<label for="Interet" id="Interet">Intéressé par : </label>
					</div>
					<div class="col-lg-4">
						<input name="carrosserie" type="checkbox"> Carrosserie
					</div>
					<div class="col-lg-4">
						<input name="pieces" type="checkbox"> Pièces
					</div>
					<div class="col-lg-4">
					<input name="accessoires" type="checkbox">Accessoires
					</div>
																				<br><br><br><br><br>
                    <div class="col-lg-12" style="text-align: center;">
                        <input type="submit" class="btn btn-primary btn-md btn-block" value="Ajouter">
                    </div>
                </div>
            </form>  
</div>




        </div>
    </div>
</body>
</html>

