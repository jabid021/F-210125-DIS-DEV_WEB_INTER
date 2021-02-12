<?php 
include("header.php");
include("footer.php");
include("bdd.php");
$liste_type=doSQL("SELECT * from type where id<100",array());
$liste_article=doSQL("SELECT * from article JOIN type ON type.id=article.type where article.type < 100",array());
?>
<html>
<body>
   <div class="content">
        <div class="container">
			<form class="contact-form" action="" method="post">
						<div class="row">
							<div class="col-lg-6">
								<label for="select_carr">Sélectionner votre article :</label>
								<select id="select_carr" class="form-control" name="select_carr">
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
											<td class="td"><img src="Image/Carrosserie/'.$row['image'].'"><br>'.$row['type'].' '.$row['couleur'].' - '.$row['prix'].'€
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

	
	<?php
if (isset($_SESSION["pseudo"])=="Admin" and isset($_SESSION["isConnected"])=="Y")
{
	echo '<a href="gestion.php"><input id="retour_gestion" class="btn_nav" TYPE="button" VALUE="<- Retour Gestion" style="display=inline-block">';
}
else
{
	echo '<a href="gestion.php"><input id="retour_gestion" class="btn_nav" TYPE="button" VALUE="<- Retour Gestion" style="display=none">';
}
?>
	
</body>
</html>

<script>
function change_carr(){
	
$.ajax("Post/sendPost.php", { 
	type: "POST", 
	data: { 
		tache:'filtrer_article',
		idtype: select_carr.value
		}, 
		success: function (resp) { 
			table_article.innerHTML=resp;
		} 
	});
}


select_carr.onchange=change_carr;

</script>