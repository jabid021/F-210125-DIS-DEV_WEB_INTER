<?php


function doSQL($sql,$listParam)
{
	try{
	$bdd = new PDO("mysql:host=localhost:3308;dbname=cheche_auto","root","");
	$bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$requete = $bdd->prepare($sql);
	$requete->execute($listParam);

	//PDO::FETCH_ASSOC evite d'avoir deux index (nom col + chiffre  =>  nom col)
	$tableauComplet=array();
	while($row=$requete->fetch(PDO::FETCH_ASSOC))
	{
		$tableauComplet[]=$row;
	}

	$requete->closeCursor();
	$bdd=null;
	return $tableauComplet;
	}
	catch(Exception $e)
	{
		return "error : ".$e->getMessage();
	}
}


?>
