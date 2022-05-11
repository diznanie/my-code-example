<?php

declare(strict_types=1);

namespace App\Services\ElasticSearch;

use \App\Interfaces\QueryBuilder;

abstract class AbstractESBuilder implements QueryBuilder
{
    public $field;
    protected $query;

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
