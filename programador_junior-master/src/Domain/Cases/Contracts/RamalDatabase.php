<?php

namespace App\Domain\Cases\Contracts;

interface RamalDatabase{

    public function save($ramal);

    public function loadAll();
}