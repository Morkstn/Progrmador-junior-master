<?php

namespace App\External\Data;

use PDO;

class DataBase {
    public static $connection;

    const HOST = 'localhost';
    const NAME = 'data';
    const USER = 'root';
    const PASS = '123456';

    final public static function setConnection()
    {
        self::$connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME, self::USER, self::PASS);
        self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
    
}
