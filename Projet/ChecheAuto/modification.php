<?php 
include("header.php");
include("footer.php");
include("bdd.php");
$user=doSQL("SELECT * from compte order by pseudo",array());
$article=doSQL("SELECT * from article join type on type.id=article.type order by article.id",array());

?>
<html>
<body>
<div class="content">
        <div class="container">
		<div class="tab-content" id="v-pills-tabContent">
  <h2>Modification de vos Intérêts...</h2><br><hr/><br>
            <form class="contact-form" action="post/sendPost.php" method="post">
                <div class="row">
                  <input type="hidden" name="tache" value="modifUser">
                    <div class="col-lg-4">
                        <label for="pseudo" id="pseudo">Pseudo</label>
                        <input id="pseudo" type="text" disabled="disabled" name="pseudo" class="form-control" value="<?php echo($_SESSION["pseudo"]);?>">
                    </div>
                    <div class="col-lg-4">
                        <label for="MdP" id="MdP">Nouveau Mot de Passe</label>
                        <input id="MdP" type="text" name="MdP" class="form-control" placeholder="Nouveau Mot de Passe...">
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
                        <input type="submit" class="btn btn-primary btn-md btn-block" value="Modifier">
                    </div>
                </div>
            </form>  
</div>




        </div>
    </div>
</body>
</html>

