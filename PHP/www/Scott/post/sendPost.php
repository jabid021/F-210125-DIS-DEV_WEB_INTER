<?php


function checkConnect()
{
  if(isset($_POST["number"])==true and isset($_POST["name"])==true)
  {
    $numero = $_POST["number"];
    $nom = $_POST["name"];


    if($numero=="7839" and $nom=="KING")
    {
        header('Location: list.html');
    }
    else if($numero=="7788" and $nom=="SCOTT")
    {
        header('Location: fiche.html');
    }
    else
    {
        header('Location: connect.html');
    }

    else
    {
        header('Location: connect.html');
    }

  }

}




 ?>
