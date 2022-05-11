<?php

namespace App\Contracts;

interface QueryBuilder
{
    public function build(): array;
}
