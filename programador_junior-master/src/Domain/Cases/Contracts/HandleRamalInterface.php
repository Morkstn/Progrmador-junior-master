<?php

namespace App\Domain\Cases\Contracts;

interface HandleRamalInterface{
    public function handle($dirFila, $dirRamal);
}