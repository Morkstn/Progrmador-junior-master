<?php

namespace App\Main\Factory;

use App\Application\ControllerRamal;
use App\Domain\Cases\HandleRamal;
use App\Domain\Cases\LoadAllRamal;
use App\Domain\Cases\SaveRamal;

class ControllerRamalFactory
{

  final public static function factory($dirFila, $dirRamal)
  {
    $ramal = new HandleRamal();
    $mySqlRamalDb = MySqlRamalFactory::factory();
    $save = new SaveRamal($mySqlRamalDb);
    $loadAll = new LoadAllRamal($mySqlRamalDb);

    $controller = new ControllerRamal($dirFila, $dirRamal, $ramal, $save, $loadAll);
    return $controller->perform();
  }
}