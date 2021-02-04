<?php

/*else{echo "test1 n'est pas def";}

echo "<br>";

if(isset($test2)==true){echo "test2 est def";}
else{echo "test2 n'est pas def";}

echo "<br>";

if(isset($test3)==true){echo "test3 est def";}
else{echo "test3 n'est pas def";}

echo "<br>";
*/


if(isset($_POST["number"])==true and isset($_POST["name"])==true)
{
  $numero = $_POST["number"];
  $nom = $_POST["name"];


  if($numero=="7839" and $nom=="KING")
  {
      header('Location: list.php');
  }
  else if($numero=="7788" and $nom=="SCOTT")
  {
      header('Location: fiche.php');
  }
  else
  {
      header('Location: connect.php?error=y');
  }


}

else
{
    header('Location: connect.php');
}


 ?>
