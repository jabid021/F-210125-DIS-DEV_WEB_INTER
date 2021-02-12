<?php
session_start();
include("../bdd.php");

//Vérification identifiant pour chaînage vues
function choix($user)
{
	foreach ($user as $u)
		{
			if($u["carrosserie"]==1)
			{
				$_SESSION["carrosserie"]=1;
			};
			if($u["pieces"]==1)
			{
				$_SESSION["pieces"]=1;
			};
			if($u["accessoires"]==1)
			{
				$_SESSION["accessoires"]=1;
			};
		}
		
		
}
if($_POST["tache"]=="checkConnect")
{
  if(isset($_POST["pseudo"])==true and isset($_POST["MdP"])==true)
  {
    $pseudo = $_POST["pseudo"];
    $MdP= $_POST["MdP"];
	
    $user=doSQL("SELECT * from compte where pseudo=?",array($pseudo));

    if(password_verify($MdP,$user[0]['MdP']))
		if($pseudo=="Admin")
		{
			$_SESSION["isConnected"]="Y";
			$_SESSION["pseudo"]="Admin";
			$_SESSION["type"]="Admin";
			choix($user);
			header('Location: ../gestion.php');
		}
		else if (!empty($user))
		  {
			$_SESSION["isConnected"]="Y";
			$_SESSION["pseudo"]=$pseudo;
			$_SESSION["type"]="client";
			choix($user);
			header('Location: ../choix.php');
		  }
	else
	 {
		  header('Location: ../connect.php?error=y');
	 }
  }
  }

//FORMULAIRES Utilsateur
else if($_POST["tache"]=="addUser")
{
  //Ajout en base d'un utilisateur
  $pseudo=$_POST['pseudo'];
  $mdp=password_hash($_POST['MdP'],PASSWORD_BCRYPT);
  $carrosserie=(isset($_POST['carrosserie']))?1:0;
  $pieces=(isset($_POST['pieces']))?1:0;
  $accessoires=(isset($_POST['accessoires']))?1:0;
  $type=$_POST['type'];

  $params=array(
  "pseudo"=>$pseudo,
  "MdP"=>$mdp,
  "carrosserie"=>$carrosserie,
  "pieces"=>$pieces,
  "accessoires"=>$accessoires,
  "type"=>$type);

  doSQL("INSERT into compte(pseudo,MdP,carrosserie,pieces,accessoires,type) VALUES (:pseudo,:MdP,:carrosserie,:pieces,:accessoires,:type)",$params);

  header('Location: ../connect.php');
}
 
else if($_POST["tache"]=="modifUser")
{
  //Modification en base d'un utilisateur
  $pseudo=$_SESSION['pseudo'];
  $mdp=$_POST['MdP'];
  $carrosserie=(isset($_POST['carrosserie']))?1:0;
  $pieces=(isset($_POST['pieces']))?1:0;
  $accessoires=(isset($_POST['accessoires']))?1:0;
  $MdPcrypt=password_hash($mdp,PASSWORD_BCRYPT);
  
  $params=array(
  "pseudo"=>$pseudo,
  "mdp"=>$MdPcrypt,
  "carrosserie"=>$carrosserie,
  "pieces"=>$pieces,
  "accessoires"=>$accessoires);
  
  doSQL("UPDATE compte SET MdP=:mdp, carrosserie=:carrosserie, pieces=:pieces, accessoires=:accessoires where pseudo=:pseudo",$params);
  
  session_unset();
  $_SESSION["isConnected"]="Y";
  $_SESSION['pseudo']=$pseudo;
  $_SESSION['MdP']=$mdp;
  $user=array(array("carrosserie"=>$carrosserie,"pieces"=>$pieces,"accessoires"=>$accessoires));
  choix($user);
header('Location: ../choix.php');
}
else if($_POST["tache"]=="deleteUser")
{
  $pseudoUser=$_POST['pseudo'];
  //delete en base d'un utilisateur
    $params=array("pseudo"=>$pseudoUser);
    doSQL("DELETE from compte where pseudo=:pseudo",$params);
 	header('Location: ../gestion.php');
}
else if($_POST["tache"]=="addArticle")
{
   
  //Ajout en base d'un article
  $type=$_POST['type'];
  $couleur=$_POST['couleur'];
  $prix=$_POST['prix'];
  

  $params=array(
  "type"=>$type,
  "couleur"=>$couleur,
  "prix"=>$prix);

  doSQL("INSERT into article(type,couleur,prix) VALUES (:type,:couleur,:prix)",$params);
 
  //print_r($params);
  header('Location: ../gestion.php');
}
else if($_POST["tache"]=="deleteArticle")
{
  $idArticle=$_POST['id'];
  //delete en base d'un utilisateur
    $params=array("id"=>$idArticle);
    doSQL("DELETE from article where id=:id",$params);
 	header('Location: ../gestion.php');
}
else if($_POST["tache"]=="filtrer_article")
{
  $idtype=$_POST['idtype'];
    $params=array("id"=>$idtype);
    $liste_article=doSQL("SELECT * from article JOIN type ON type.id=article.type where type.type=:id",$params);
 	
	foreach($liste_article as $row)
		{
			echo '<tr>
					<td class="td"><img src="Image/Carrosserie/'.$row['image'].'"><br>
					'.$row['type'].'					
					<a><INPUT class="btn_add" id_article="'.$row['id'].'" TYPE="button" VALUE="Ajouter"></a>
					</td>
																
				</tr>';
		}
}
  
 ?>