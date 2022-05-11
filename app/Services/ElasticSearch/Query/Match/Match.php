<?php

namespace App\Services\ElasticSearch\Query\Match;

class Match extends AbstractESMatchBuilder
{
    public function getQueryName(): string
    {
        return 'match';
    }
}
