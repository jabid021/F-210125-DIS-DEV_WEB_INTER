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



  echo "<h1>min vaut ".$min.", med vaut ".$med." et max vaut : ".$max."</h1>";

  echo "<br>";
  // min vaut 10, med vaut 20 et max vaut 25;
}


tp1_3();
?>
