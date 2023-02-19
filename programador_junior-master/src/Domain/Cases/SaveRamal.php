<?php

namespace App\Domain\Cases;

use App\Domain\Cases\Contracts\RamalDatabase;
use App\Domain\Cases\Contracts\SaveRamalInterface;

class SaveRamal implements SaveRamalInterface
{
  private $db;

  public function __construct(RamalDatabase $db)
  {
    $this->db = $db;
  }

  public function save($ramal)
  {
    $save = array(
      'username' => $ramal->getUserName(),
      'ramal' => $ramal->getRamal(),
      'status' => $ramal->getStatus(),
      'historico' => $ramal->getHistorico(),
    );
    $this->db->save($save);
  }
}