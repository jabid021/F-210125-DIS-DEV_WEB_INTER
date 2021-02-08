<?php
session_start();
include("../bdd.php");

if($_POST["tache"]=="checkConnect")
{
  if(isset($_POST["number"])==true and isset($_POST["name"])==true)
  {
    $numero = $_POST["number"];
    $nom = $_POST["name"];

    $employe=doSQL("SELECT empno from emp where empno=? and ename=?",array($numero,$nom));

    if(empty($employe))
    {
        header('Location: ../connect.php?error=y');
    }

    else
    {
      if($nom=="KING")
      {
        $_SESSION["isConnected"]="Y";
        $_SESSION["login"]="KING";

        header('Location: ../list.php');
      }
      else
      {
        $_SESSION["isConnected"]="Y";
        $_SESSION["login"]=$nom;
        header('Location: ../fiche.php');
      }
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
  $empno=$_POST['number'];
  $ename=$_POST['name'];
  $job=$_POST['job'];
  $mgr=$_POST['manager'];
  $hiredate=$_POST['date'];
  $sal=$_POST['salaire'];
  $comm=($_POST['comm']=="") ? null : $_POST['comm'];
  $deptno=$_POST['numberDep'];

  $params=array($empno,$ename,$job,$mgr,$hiredate,$sal,$comm,$deptno);

  doSQL("INSERT into emp VALUES (?,?,?,?,?,?,?,?)",$params);
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
