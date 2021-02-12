<?php 
include("header.php");
include("footer.php");
include("bdd.php");
$liste_type=doSQL("SELECT * from type where id >= 200",array());
$liste_article=doSQL("SELECT * from article JOIN type ON type.id=article.type where article.type >= 200",array());
?>
<html>
<body>
   <div class="content">
        <div class="container">
			<form class="contact-form" action="" method="post">
						<div class="row">
							<div class="col-lg-6">
								<label for="select_access">Sélectionner votre article :</label>
								<select id="select_access" class="form-control" name="select_access">
									<option>-----</option>
									<?php
									foreach($liste_type as $row)
									{
										echo '<option id="'.$row['id'].'">'.$row['type'].'</option>';
									}
									?>
								</select>
							</div>
							<div class="col-lg-6">
								<label id="dispo_carr">Articles Disponibles :</label>
								<table id="table_article" class="table table-bordered">
								<?php
									foreach($liste_article as $row)
									{
									echo '<tr>
											<td class="td"><img src="Image/Accessoires/'.$row['image'].'"><br>'.$row['type'].' '.$row['couleur'].' - '.$row['prix'].'€
											<a><INPUT class="btn_add" id_article="'.$row['id'].'" TYPE="button" VALUE="Ajouter"></a>
											</td>											
										</tr>';
									}
									?>
								</table>
							</div>
						</div>
			</form>	
		</div>
	</div>
<a href="choix.php"><INPUT id="btn_client" class="btn btn-secondary" TYPE="button" VALUE="Retour"></a>
</body>
</html>

<script>
function change_access(){
	
$.ajax("Post/sendPost.php", { 
	type: "POST", 
	data: { 
		tache:'filtrer_article',
		idtype: select_access.value
		}, 
		success: function (resp) { 
			table_article.innerHTML=resp;
		} 
	});
}


select_access.onchange=change_access;

</script>