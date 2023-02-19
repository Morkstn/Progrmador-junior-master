<?php
header("Content-type: application/json; charset=utf-8");

require_once '../../vendor/autoload.php';

use App\External\Data\DataBase;
use App\Main\Factory\ControllerRamalFactory;

DataBase::setConnection();

$ramais = file('../../lib/ramais');
$filas = file('../../lib/filas');

$statusRamais = ControllerRamalFactory::Factory($filas, $ramais);
echo json_encode($statusRamais);