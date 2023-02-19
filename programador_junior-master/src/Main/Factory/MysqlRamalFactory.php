<?php

namespace App\Main\Factory;

use App\Main\Factory\MysqlRamal;

class MySqlRamalFactory
{
    final public static function factory()
    {
        return new Mysql();
    }
    
}

