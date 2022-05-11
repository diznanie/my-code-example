<?php

declare(strict_types=1);

namespace App\Services\ElasticSearch\Query\Match;

class MatchAll extends AbstractESMatchBuilder
{
    public function getQueryName(): string
    {
        return 'match_all';
    }
}
