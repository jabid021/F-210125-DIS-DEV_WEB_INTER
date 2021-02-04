<?php

function tp1_2()
{
  $min=20;
  $max=10;

  $tmp = $min;
  $min = $max;
  $max=$tmp;

  echo "min vaut ".$min." et max vaut : ".$max;
  // min vaut 10 et max vaut 20;
}

function tp1_3()
{
  $min=20;
  $max=10;
  $med=25;

  $tmp=$min;
  $min=$max;
  $max=$med;
  $med=$tmp;

  echo "<h1>min vaut ".$min.", med vaut ".$med." et max vaut : ".$max."</h1>";

  echo "<br>";
  // min vaut 10, med vaut 20 et max vaut 25;
}

function carre($x)
{
    return $x*$x;
}

function tp2_1()
{
  $nb=15;
  $carre=carre($nb);
  echo "le carré de ".$nb." est ".$carre;
}

$age=27;
$age++; // age=28;
$age--; // 27




function tp2_2()
{
  $HT=10;
  $qte=2;
  $tva=0.2;
  $TTC=$HT*$qte*(1+$tva);

  echo "Detail de votre commande : <br>";
  echo "<table border><tr><td>Quantite</td><td>Prix</td></tr>";
  echo "<tr><td>".$qte."</td><td>".$HT."(".$qte*$HT."€)</td></tr>";
  echo "<tr><td>Taux de TVA (20%)</td><td>".($tva*$HT*$qte)."€</td></tr>";
  echo "<tr><td>Prix TTC</td><td>".$TTC."</td></tr></table>";


}
function tp3_3()
{
  $nb=0;

  if($nb>0){echo "Positif";}
  else if($nb<0){echo "Negatif";}
  else{echo "NUL";}
}

function tp3_4()
{
  $nb1;
  $nb2;


  if(($nb1>0 and $nb2>0) or ($nb1<0 and $nb2<0)){echo "Produit Positif";}
  else if($nb1==0 or $nb2==0) {echo "Produit nul";}
  else {echo "Negatif";}
}


function tp4_1()
{
    $heure=15;
    $min=59;
    $minAffiche;
    $heureAffiche;

    $min++;

    if($min==60)
    {
      $heure++;
      $min=0;
      if($heure==24)
      {
        $heure=0;
      }
    }

    if($min<10){$minAffiche="0$min";}else{$minAffiche=$min;}
    if($heure<10){$heureAffiche="0$heure";}else{$heureAffiche=$heure;}

    echo "Il est $heureAffiche : $minAffiche";


}


function tp4_2()
{
    $heure=15;
    $min=59;
    $sec=59;
    $minAffiche;
    $heureAffiche;
    $secAffiche;


    $sec++;
    if($sec==60)
    {
      $sec=0;
      $min++;
      if($min==60)
      {
        $heure++;
        $min=0;
        if($heure==24)
        {
          $heure=0;
        }
      }
    }

    if($min<10){$minAffiche="0$min";}else{$minAffiche=$min;}
    if($heure<10){$heureAffiche="0$heure";}else{$heureAffiche=$heure;}
    if($sec<10){$secAffiche="0$sec";}else{$secAffiche=$sec;}

    echo "Il est $heureAffiche h $minAffiche : $secAffiche";


}

function tp4_3()
{
  $age=20;
  $sexe="homme";

  if(($sexe=="homme" and $age>=20) or ($sexe=="femme" and $age>=18 and $age<=35))
  {
    echo "Vous êtes imposable";
  }
  else {echo "Vous n'êtes pas imposable";}
}


function tp4_3Ternaire()
{
  $age=20;
  $sexe="homme";
  $isImposable = (($sexe=="homme" and $age>=20) or ($sexe=="femme" and $age>=18 and $age<=35)) ? "Vous êtes imposable" : "Vous n'êtes pas imposable" ;
  echo $isImposable;

}



function exercice4_4() {

$cand1=28;
$cand2=51;
$cand3=10;
$cand4=21;

if($cand1>50 or $cand2>50 or $cand3>50 or $cand4>50 )
{
  if($cand1>50){echo "Je suis elu au 1er tour !";}
  else{echo "J'ai perdu au 1er tour";}
}

else if($cand1>=12.5)
{
  if($cand1>$cand2 && $cand1>$cand3 && $cand1>$cand4)
  {echo "ballotage favorable";}
  else{echo "ballotage défavorable";}

}
else{echo "J'ai loose";}
}


function tp4_6()
{
  $jour=29;
  $mois=2;
  $annee=2100;

  $dateValid=false;

  if($jour>=1 and $jour<=31 and $mois>=1 and $mois<=12)
  {
    if($mois==2)
    {
      if($annee%400==0 or ($annee%4==0 and $annee%100!=0))
      {
        if($jour<=29){$dateValid=true;}
      }
      else{
        if($jour<=28){$dateValid=true;}
      }
    }
    else if(($mois==4 or $mois==6 or $mois==9 or $mois==11) and $jour<=30)
    {
      $dateValid=true;
    }
    else{$dateValid=true;}
  }

echo ($dateValid==true) ? "Date Valide" : "Date invalide";

}

function tp5_1()
{

  $nb=$_GET["nb"];

  while($nb<1 or $nb>3){
  echo "Votre nombre n'est pas dans [1;3]";
  //Saisir le nombre a nouveau
  break;
}
  echo "Votre nombre est bien dans [1;3]";
}

function tp5_4()
{
  $nb=$_GET["nb"];

  echo "Table de $nb <br>";

  for($i=1;$i<=10;$i++)
  {
    print "$nb * $i ={($nb*$i)}<br>";
  }

}

function fact($nb)
{
  $resultat=1;
  for($i=1;$i<=$nb;$i++)
  {
    $resultat= $resultat*$i;
  }
  return $resultat;
}


function tp5_6()
{



    $n=$_GET["n"];
    $p=$_GET["p"];

    $X=fact($n) / fact($n-$p);
    $Y=fact($n) / (fact($p) * fact($n-$p));

    echo "Dans l’ordre : une chance sur $X de gagner";

    echo "Dans le désordre : une chance sur $Y de gagner";

}

tp5_4();

?>
