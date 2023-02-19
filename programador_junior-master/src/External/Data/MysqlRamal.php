<?php

namespace App\External\Data;

use App\Domain\Cases\Contracts\RamalDatabase;
use App\Domain\Enties\Ramal;

class MysqlRamal implements RamalDatabase
{
    public function execute($query, $params = []){
        $statement = DataBase::setConnection->prepare($query);
        $statement->execute($params);
        return $statement;
    }
    public function save($ramal){

    $fields = array_keys($ramal);
    $binds = array_pad([], count($ramal), '?');

    $query = 'REPLACE INTO ramais (' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')';
    $this->execute($query, array_values($ramal));
    }
    
    public function loadAll()
    {
      $query = 'SELECT * FROM ramificacoes';
      $statement = $this->execute($query);
      return  $statement->fetchAll();
    }
}
