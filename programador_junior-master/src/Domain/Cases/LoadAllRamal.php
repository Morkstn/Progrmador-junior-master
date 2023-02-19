<?php

namespace App\Domain\Cases;

use App\Domain\Cases\Contracts\LoadAllRamalInterface;
use App\Domain\Cases\Contracts\RamalDatabase;

class LoadAllRamal implements LoadAllRamalInterface
{
  private $db;
  public function __construct(RamalDatabase $db)
  {
    $this->db = $db;
  }

  public function loadAll()
  {
    $ramais = $this->db->loadAll();
    if ($ramais) {
      return $ramais;
    }
  }
}