<?php 
include("header.php");
include("footer.php");
include("bdd.php");

$user=doSQL("SELECT * from compte order by pseudo",array());
$article=doSQL("SELECT * from article join type on type.id=article.type order by article.id",array());
?>
<html>

<body>
<div class="nav">
	<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
		<a class="nav-link active" id="btn_user" data-toggle="pill" href="#liste_user" role="tab" aria-controls="liste_user" aria-selected="true">Liste Utilisateurs</a>
		<a class="nav-link" id="btn_add_user" data-toggle="pill" href="#add_user" role="tab" aria-controls="add_user" aria-selected="false">Ajout Utilisateur</a>
		<a class="nav-link" id="btn_article" data-toggle="pill" href="#liste_article" role="tab" aria-controls="liste_article" aria-selected="false">Liste Articles</a>
		<a class="nav-link" id="btn_add_article" data-toggle="pill" href="#add_article" role="tab" aria-controls="add_article" aria-selected="false">Ajout Articles</a>
	</div>
	
</div>
<div class="content">
    <div class="container">
		<div class="tab-content" id="v-pills-tabContent">
			<div class="tab-pane fade show active" id="liste_user" role="tabpanel" aria-labelledby="liste_user">
				<h3 style.color="white"> Liste Utilisateurs</h3>
						<table id=" table_utilisateur" class="table table-bordered">
							<thead>
								<tr>
									<th>Id</th>
									<th>Type</th>
									<th>Pseudo</th>
									<th>Carrosserie</th>
									<th>Pièces</th>
									<th>Accessoires</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach($user as $row){
										
									echo"									
									<tr>
										<td>".$row["id"]."</td>
										<td>".$row["type"]."</td>
										<td>".$row["pseudo"]."</td>											
										<td>".$row["carrosserie"]."</td>
										<td>".$row["pieces"]."</td>
										<td>".$row["accessoires"]."</td>
										
						  <td>
							<form action='post/sendPost.php' method='post'>
							  <input type='hidden' name='tache' value='deleteUser'>
							  <input type='hidden' name='pseudo' value=".$row["pseudo"].">
							  <input type='submit' class='btn btn-danger' value='Supprimer'>
							</form>
								
						  </td>
						   
								</tr>"
								;
								
								}
								if($_SESSION["pseudo"]=='Admin')
										{
											echo"<td id=td_modif>
											<form action='post/sendPost.php' method='post'>
											  <input type='hidden' name='tache' value='modifUser'>
											  <input type='hidden' name='pseudo' value=".$row["pseudo"].">
											  <a href='modification.php'><input type='button'  class='btn btn-warning' value='Modifier'></a>
											</form>
											</td>"
										;} 
									else {
											echo"<td>
												<form action='post/sendPost.php' method='post'>
												  <input type='hidden' name='tache' value='modifUser'>
												  <input type='hidden' name='pseudo' value=".$row["pseudo"].">
												  <a href='modification.php'><input type='button'  disabled='disabled'class='btn btn-warning' value='Modifier'></a>
												</form>
												</td>"
										;}
									
								?>
							</tbody>
						</table>  
			  </div>
			<div class="tab-pane fade" id="add_user" role="tabpanel" aria-labelledby="add_user">
				
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
			<div class="tab-pane fade" id="liste_article" role="tabpanel" aria-labelledby="liste_article">
			  
					
						<table id=" table_article" class="table table-bordered">
							<thead>
								<tr>
									<th>Id_article</th>
									<th>Type</th>
									<th>Couleur</th>
									<th>Prix</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach($article as $row){
									echo"
									<tr>
										<td>".$row["id"]."</td>
										<td>".$row["type"]."</td>
										<td>".$row["couleur"]."</td>
										<td>".$row["prix"]."€</td>
										<td>
											<form action='post/sendPost.php' method='post'>
											  <input type='hidden' name='tache' value='deleteArticle'>
											  <input type='hidden' name='id' value=".$row["id"].">
											  <input type='submit' class='btn btn-danger' value='Supprimer'>
											</form>

										</td>
									</tr>";}
								?>
							</tbody>
						</table>    
			  </div>
			<div class="tab-pane fade" id="add_article" role="tabpanel" aria-labelledby="add_article">
				
						<form class="contact-form" action="post/sendPost.php" method="post">
							<div class="row">

							  <input type="hidden" name="tache" value="addArticle">
							   
								<div class="col-lg-4">
									<label for="type" id="type">Type</label>
									<select id="type" class="form-control" name="type" required>
									 <option value="">Choisir un type...</option>
									 <?php
										  foreach ($article as $type) {
											echo "<option value='".$type['id']."'> ".$type['id']."-".$type['type']."</option>";
										  }
										?>					
									</select>
								</div>	

								<div class="col-lg-4">
									<label for="couleur" id="couleur">Couleur</label>
									<input id="couleur" type="text" name="couleur" class="form-control" placeholder="Couleur" required>
								</div>
								<div class="col-lg-4">
									<label for="prix" id="prix">Prix</label>
									<input id="prix" type="text" name="prix" class="form-control" placeholder="Prix" required>
								</div>
															
								<div class="col-lg-12" style="text-align: center;">
									<input type="submit" class="btn btn-primary btn-md btn-block" value="Ajouter">
								</div>
							</div>
						</form>

			  </div>
		</div>
			<a href="choix.php"><INPUT id="btn_client" class="btn btn-secondary" TYPE="button" VALUE="Vue Client"></a>
    </div>
</div>
</body>
</html>

