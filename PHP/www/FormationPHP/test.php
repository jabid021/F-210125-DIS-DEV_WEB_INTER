<?php
//Saisir par user

function testAgeWhile()
{
  echo "Saisir votre age";
  $age=-10;

  while($age<0)
  {
    echo "Votre age doit etre positif !";
    $age=10;
  }
}

  function testAgeDoWhile()
{

  do{
    echo "Saisir votre age (Attention, age doit etre positif)";
    $age=-10;

  }while($age<0);
}


function testHelloWhile()
{
  $cpt=1;
  while($cpt<=20)
  {
    $cpt++;
    echo "Hello world<br>";
  }


}


function testHelloFor()
{

  for($i=1;$i<=20;$i++)
  {
    echo "Hello world<br>";
  }


}


echo $_GET["nb"];

//testHelloWhile();

?>
