<?php
class Personne
{
  private $nom;
  private $prenom;
  private $age;

  public function __construct($n,$p,$a)
  {
    $this->nom=$n;
    $this->prenom=$p;
    $this->age=$a;
  }

  public function getAge()
  {
    return $this->age;
  }


  public function setAge($a)
  {
    $this->age=$age;
  }

  public function getNom()
  {
    return $this->nom;
  }


  public function setNom($n)
  {
    $this->nom=$n;
  }

  public function getPrenom()
  {
    return $this->prenom;
  }


  public function setPrenom($p)
  {
    $this->age=$pr;
  }


  public function sePresenter()
  {
    echo $this->nom.", ".$this->prenom." (".$this->age." ans)<br>";
  }

}


?>
