<?php
session_start();

if($_POST["tache"]=="checkConnect")
{
  if(isset($_POST["number"])==true and isset($_POST["name"])==true)
  {
    $numero = $_POST["number"];
    $nom = $_POST["name"];


    if($numero=="7839" and $nom=="KING")
    {
        $_SESSION["isConnected"]="Y";
        $_SESSION["login"]="KING";

        header('Location: ../list.php');
    }
    else if($numero=="7788" and $nom=="SCOTT")
    {
        $_SESSION["isConnected"]="Y";
        $_SESSION["login"]="SCOTT";
        header('Location: ../fiche.php');
    }
    else
    {
        header('Location: ../connect.php?error=y');
    }


  }

  else
  {
      header('Location: ../connect.php');
  }

}
//FORMULAIRES Employés (ADD / DELETE / UPDATE)
else if($_POST["tache"]=="addEmp")
{
  //Ajout en base d'un employé
  $empno=$_POST['empno'];
  $ename=$_POST['ename'];
  $job=$_POST['job'];
  $mgr=$_POST['mgr'];
  $hiredate=$_POST['hiredate'];
  $sal=$_POST['sal'];
  $comm=$_POST['comm'];
  $deptno=$_POST['deptno'];


  //Insert into emp VALUES ()
    header('Location: ../list.php');
}

else if($_POST["tache"]=="deleteEmp")
{
  $idEmp=$_POST['empno'];
  //delete en base d'un employé
    header('Location: ../list.php');
}


 ?>
