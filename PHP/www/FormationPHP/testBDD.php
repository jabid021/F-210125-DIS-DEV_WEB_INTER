<?php
/*
function doSQLNonSecure($sql)
{
	$bdd = new PDO("mysql:host=localhost;dbname=scott","root","");

	$requete = $bdd->query($sql);

	//PDO::FETCH_ASSOC evite d'avoir deux index (nom col + chiffre  =>  nom col)
	$tableauComplet=array();
	while($row=$requete->fetch(PDO::FETCH_ASSOC))
	{
		$tableauComplet[]=$row;
	}

	$requete->closeCursor();
	$bdd=null;
	return $tableauComplet;

} */

function doSQL($sql,$listParam)
{
	try{
	$bdd = new PDO("mysql:host=localhost;dbname=scott","root","");
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


$ename="King";
$job="President";
$test=doSQL("SELECT * from emp where ename=? and job=?",array($ename,$job));
print_r($test);



?>
