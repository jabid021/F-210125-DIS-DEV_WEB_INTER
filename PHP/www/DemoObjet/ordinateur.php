<?php

class Ordinateur
{
    private $numero;

    public function __construct($n)
    {
      $this->numero=$n;
    }


    public function getNumero()
    {
      return $this->numero;
    }

    public function setNumero($n)
    {
      $this->numero=$n;
    }
}


?>
