<?php
session_start();
include("fonction_panier.php");

$erreur = false;

$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action !== null)
{
   if(!in_array($action,array('ajout', 'suppression', 'refresh')))
   $erreur=true;

   //récupération des variables en POST ou GET
   $t = (isset($_POST['t'])? $_POST['t']:  (isset($_GET['t'])? $_GET['t']:null )) ;
   $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
   $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;

   //Suppression des espaces verticaux
   $t = preg_replace('#\v#', '',$l);
   //On vérifie que $p est un float
   $p = floatval($p);
   //On traite $q qui peut être un entier simple ou un tableau d'entiers
    
   if (is_array($q)){
      $qte = array();
      $i=0;
      foreach ($q as $contenu){
         $qte[$i++] = intval($contenu);
      }
   }
   else
   $q = intval($q);
    
}

if (!$erreur){
   switch($action){
      Case "ajout":
         ajouterArticle($t,$q,$p);
         break;

      Case "suppression":
         supprimerArticle($t);
         break;

      Case "refresh" :
         for ($i = 0 ; $i < count($qte) ; $i++)
         {
            modifierqte($_SESSION['panier']['type'][$i],round($qte[$i]));
         }
         break;

      Default:
         break;
   }
}
?>

<html>
<head>
<title>Votre panier</title>
</head>
<body>

<form method="post" action="panier.php">
<table style="width: 400px">
    <tr>
        <td colspan="4">Votre panier</td>
    </tr>
    <tr>
        <td>Type</td>
        <td>Quantité</td>
        <td>Prix Unitaire</td>
        <td>Action</td>
    </tr>


    <?php
    if (createPanier())
    {
       $nbArticles=count($_SESSION['article']['type']);
       if ($nbArticles <= 0)
       echo "<tr><td>Votre panier est vide </ td></tr>";
       else
       {
          for ($i=0 ;$i < $nbArticles ; $i++)
          {
             echo "<tr>";
             echo "<td>".htmlspecialchars($_SESSION['panier']['type'][$i])."</ td>";
             echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['qte'][$i])."\"/></td>";
             echo "<td>".htmlspecialchars($_SESSION['panier']['prix'][$i])."</td>";
             echo "<td><a href=\"".htmlspecialchars("panier.php?action=suppression&t=".rawurlencode($_SESSION['panier']['type'][$i]))."\">XX</a></td>";
             echo "</tr>";
          }

          echo "<tr><td colspan=\"2\"> </td>";
          echo "<td colspan=\"2\">";
          echo "Total : ".MontantGlobal();
          echo "</td></tr>";

          echo "<tr><td colspan=\"4\">";
          echo "<input type=\"submit\" value=\"Rafraichir\"/>";
          echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";

          echo "</td></tr>";
       }
    }
    ?>
</table>
</form>
</body>
</html>