<?php 
include("header.php");
include("footer.php");
include("bdd.php");
?>
<html>
<body>
    <div class="content_choix">
        <div class="container_choix">
				<h2>Choisissez votre catégorie : </h2>
				<br>
                <tbody>
						<?php
							if( isset($_SESSION['carrosserie']))
							  {
								echo '	<div>
											<FORM ACTION="carrosserie.php">
												<INPUT id="theme_carrosserie" class="btn_choix" TYPE="SUBMIT" VALUE="" style="display:inline-block">
											</FORM>
										</div>';
							  }
							
							if( isset($_SESSION['pieces']))
							  {
								echo '	<div>
											<FORM ACTION="pieces.php">
												<INPUT id="theme_pieces" class="btn_choix" TYPE="SUBMIT" VALUE="" style="display=inline-block">
											</FORM>
										</div>';
							  }
							
							 if( isset($_SESSION['accessoires']))
							  {
								echo '	<div>
											<FORM ACTION="accesoires.php">
												<INPUT id="theme_accessoires" class="btn_choix" TYPE="SUBMIT" VALUE="" style="display=inline-block">
											</FORM>
										</div>';
							  }					

						?>
                </tbody>
            </table>
          
        </div>
    </div>

<?php
if (isset($_SESSION["type"])=="Admin" and isset($_SESSION["isConnected"])=="Y")
{
	echo '<a href="gestion.php"><a href="gestion.php"><INPUT id="btn_gestion" class="btn btn-secondary" TYPE="button" VALUE="Vue Admin" style="display=inline-block"></a>';
}
else
{echo"je suis client";
	echo '<a href="gestion.php"><a href="gestion.php"><INPUT id="btn_gestion" class="btn btn-secondary" TYPE="button" VALUE="Vue Admin" style="display=none">';
}
?>								
	
</body>
</html>

