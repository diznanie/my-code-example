<?php

declare(strict_types=1);

namespace App\Services\ElasticSearch\Query\Match;

use \App\Contracts\QueryBuilder;

abstract class AbstractESMatchBuilder implements QueryBuilder
{
    public $field;
    protected $query;

    public function __construct(
        string $field,
        string $query
    ) {
        $this->field = $field;
    }


    public function build(): array
    {
        $queryName = $this->getQueryName();
        $query = [
            $queryName => [
                $this->field => [
                    'query' => $this->query,
                ],
            ],
        ];

        return $query;
    }

    public function setQuery(string $query): self
    {
        $this->query = $query;

        return $this;
    }

    abstract public function getQueryName(): string;
}
