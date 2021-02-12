<?php
require("personne.php");
class Client extends Personne
{

    private $panier;


    public function __construct($pan,$n,$p,$a)
    {
      parent::__construct($n,$p,$a);
      $this->panier=$pan;
    }


}


?>
