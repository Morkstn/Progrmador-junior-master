<?php

namespace App\Domain\Enties;

class Ramal
{
 
  public $ramal;

  public $nome;
  
  public $status;
  public $historico;

  public function __construct($ramal, $userName, $status, $historico)
  {
    $this->ramal = $ramal;
    $this-> nome = $userName;
    $this->status = $status;
    $this->historico = $historico;
  }



  public function getRamal()
  {
    return $this->ramal;
  }

  public function getuserName()
  {
    return $this-> nome;
  }

  public function getStatus()
  {
    return $this->status;
  }


  public function getHistorico()
  {
    return $this->historico;
  }

}