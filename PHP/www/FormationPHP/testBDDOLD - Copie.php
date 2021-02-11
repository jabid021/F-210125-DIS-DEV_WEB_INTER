<?php
function bddNoSecure()
{
	try{
		$bdd = new PDO("mysql:host=localhost;dbname=scott;charset=utf8","root","");
		$requete=$bdd->query("SELECT * from dept");
		while($donnees=$requete->fetch())
		{
			echo $donnees["dname"];
		}
			$requete->closeCursor();
	}
	catch(Exception $e)
	{
		die("Erreur : ".$e->getMessage());
	}
}

function bddPrepare()
{
	try{
		//array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION)
		$bdd = new PDO("mysql:host=localhost;dbname=scott;charset=utf8","root","");
		$requete=$bdd->prepare("SELECT * from dept where deptno=?");
		$requete->execute(array(20));

		while($donnees=$requete->fetch())
		{
			echo $donnees["dname"];
		}
		$requete->closeCursor();
	}
	catch(Exception $e)
	{
		die("Erreur : ".$e->getMessage());
	}
}


function doSQL($sql,$arrayParam){
try{
$connexion = new PDO('mysql:host=localhost;dbname=scott', 'root', '');
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$requete=$connexion->prepare($sql);
$requete->execute($arrayParam);
$arrayData = array();
while ($row=$requete->fetch(PDO::FETCH_ASSOC))
{
  $arrayData[] = $row;
}
$connexion = null;
$requete->closeCursor();
return $arrayData;
}catch(PDOException $e)
  {return 'Error '.$e->getMessage();}
}

$data=doSQL("select * from dept",array());
print_r($data);

 ?>
