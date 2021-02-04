<?php

$listeNombres = array(1,13,15,16);

$listePrenom = array("Toti","Tata", "Toto");

$dico = array(
"echelle"=>"Objet formé de deux montants réunis de distance en distance par des barreaux transversaux (échelon) servant de marches.",
"huitre"=>"La dénomination vernaculaire huître désigne les mollusques marins bivalves de la famille des Ostreidae et plus largement de la super-famille des Ostreoidea.",
"judo"=>"Sport de combat d'origine japonaise (jujitsu) qui se pratique à mains nues, sans porter de coups, le but du combat étant de faire tomber ou d'immobiliser l'adversaire."
);


$king = array(
"empno"=>7839,
"ename"=>"KING",
"job"=>"President",
"mgr"=>null,
"hiredate"=>"2016-05-01",
"sal"=>5000,
"comm"=>null,
"deptno"=>10);


$scott = array(
"empno"=>7788,
"ename"=>"SCOTT",
"job"=>"Clerck",
"mgr"=>null,
"hiredate"=>"2016-05-01",
"sal"=>5000,
"comm"=>null,
"deptno"=>10);

$boite=array("king"=>$king,"scott"=>$scott);




echo "<h1>Liste des prenom For</h1>";
for($i=0;$i<sizeof($listePrenom);$i++)
{
    $value= "$listePrenom[$i]";
    echo $i."-".$value;
}

echo "<hr>";
echo "<h1>Liste des prenom ForEach</h1>";
foreach ($listePrenom as $index=>$value) {
  echo $index."-".$value;
}
echo "<hr>";

echo "<h1>Liste des mots ForEach</h1>";

foreach ($dico as $key => $value) {

  echo "<p><strong>$key</strong> : $value</p>";
}


print_r($listePrenom);


echo "<hr>";

echo "<h1>Liste des employes (KING + SCOTT)</h1>";


foreach ($boite as  $value) {
  echo "<p>";
  print_r($value);
  echo "</p>";
}






 ?>
