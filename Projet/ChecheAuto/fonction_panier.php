<?php
 
//Mes fonctions
 
function createPanier(){
  try
  {
	$bdd = new PDO('mysql:host=localhost:3308;dbname=cheche_auto;charset=utf8', 'root', '');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Les erreurs lanceront des excetions
  }
 
   catch(Exception $e){
   	die("Une erreur est survenue");
 
   }
 
	if(isset($_SESSION['panier'])){
 
		$_SESSION['panier'] = array();
		$_SESSION['panier']['article'] = array();
		$_SESSION['panier']['qte'] = array();
		$_SESSION['panier']['prix'] = array();
		$_SESSION['panier']['verrou'] = false;
		$select = $bdd->query("SELECT TVA FROM produit");
		$data = $select->fetch(PDO::FETCH_OBJ);
		$_SESSION['panier']['tva'] = $data->tva;
 
	}
	return true;
 
}
 // la fonction d'ajout de produit au panier
function ajouterProduit($article,$qte,$prix){
    // Verification de l'existence du panie
	if(createPanier() && !isVerrouille())
	{
 
		$positionProduit = array_search($article, $_SESSION['panier']['article']);
		if($positionProduit !== false)
		{
 
			$_SESSION['panier']['qte'][$positionProduit] += $qte;
		}
		else
		{
 
			array_push( $_SESSION['panier']['article'],$article);
			array_push( $_SESSION['panier']['qte'],$qte);
			array_push( $_SESSION['panier']['prix'],$prix);
		}
	}
	else{
		// c'estle message qui s'affiche
 
		echo 'Erreur!! Veuillez contacter l\'administrateur ajouterProduit';
	}
}
 
function modifierqte($article, $qte){
 
  if(createPanier() && !isVerrouille()){
 
  	if($qte > 0){
 
  		$positionProduit = array_search($article, $_SESSION['panier']['article']);
 
  		if($positionProduit !== false){
 
  		 	$_SESSION['panier']['article'][$positionProduit]= $qte;
 
  		}
 
  	}
  	else{
 
  		supprimerProduit($article);
 
  	}
 
  }else{
 
  	echo 'Erreur!! Veuillez contacter l\'administrateur modifier produit';
  }
 
} 
 
 
function supprimerProduit($article){
 
	if(createPanier() && !isVerrouille()){
 
		$tmp  = array();
		$tmp['article'] = array();
		$tmp['qte'] = array();
		$tmp['prix'] = array();
		$tmp['verrou'] = $_SESSION['panier']['verrou'];
		$tmp['tva'] = $_SESSION['panier']['tva'];
 
 
		for($i= 0; $i<count($_SESSION['panier']['article']); $i++){
 
			if($_SESSION['panier']['article'][$i] !== $article){
 
			array_push( $tmp['article'],$_SESSION['panier']['article'][$i]  );
			array_push( $tmp['qte'], $_SESSION['panier']['qte'][$i] );
			array_push( $tmp['prix'], $_SESSION['panier']['prix'][$i] );
			}
		}
 
		$_SESSION['panier'] = $tmp;
		unset($tmp);
 
 
	}else{
 
		echo 'Erreur!! Veuillez contacter l\'administrateur sup';
	}
}
 
function montantGlobal(){
 
	$total = 0;
 
	for($i = 0; $i<count($_SESSION['panier']['article']); $i++){
 
		$total = $_SESSION['panier']['qte'][$i] *$_SESSION['panier']['prix'][$i];
 
	}
 
	return $total;
 
}
 
function montantGlobalTva(){
 
	$total = 0;
 
	for($i; $i<count($_SESSION['panier']['article']); $i++){
 
		$total += $_SESSION['panier']['qte'][$i] * $_SESSION['panier']['prix'][$i];
 
	}
 
	return $total + ($total*$_SESSION['panier']['tva']/100);
 
}
 
function supprimerPanier(){
 
 
 
		unset($_SESSION['panier']);
 
}
 
function isVerrouille(){
 
	if(isset($_SESSION['panier']) && isset($_SESSION['panier']['verrou'])){
 
		return true;
	}else{
 
		return false;
	}
}
 
function compterProduit(){
 
	if(isset($_SESSION['panier'])){
 
		return count($_SESSION['panier']['article']);
	}else{
 
		return 0;
	}
}
 
?>