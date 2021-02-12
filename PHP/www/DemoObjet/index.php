<?php
require("ordinateur.php");
require("client.php");



$c1 = new Client(null,"Abid","Jordan",29);

$asus= new Ordinateur(1343);

$tableau=array($c1,$asus);


foreach($tableau as $var)
{
  if( $var instanceof Personne)
  {
    echo $var->sePresenter();
  }

  if( $var instanceof Client)
  {
    echo $var->sePresenter();
  }
  if($var instanceof Ordinateur)
  echo $var->getNumero();
}






 ?>
