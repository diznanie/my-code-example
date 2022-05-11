<?php

namespace App\Services\ElasticSearch\Query\Match;

class MultiMatch extends AbstractESMatchBuilder
{
    public function getQueryName(): string
    {
        return 'multi_match';
    }
}
