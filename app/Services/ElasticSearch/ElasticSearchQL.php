<?php
declare(strict_types=1);

namespace App\Services\ElasticSearch;

use App\Interfaces\QueryBuilder as QBInterface;
//use App\Services\ElasticSearch\Traits\HasAggregations;
//use App\Services\ElasticSearch\Traits\HasCollapse;
//use App\Services\ElasticSearch\Traits\HasSorting;

class ElasticSearchQL
{
//    use HasCollapse;
//    use HasSorting;
//    use HasAggregations;

    private ?string $index = null;

    private ?int $from = null;

    private ?int $size = null;

    private ?QBInterface $query = null;

    private ?QBInterface $postFilter = null;

    public function setIndex(string $index): self
    {
        $this->index = $index;

        return $this;
    }

    public function setFrom(int $from): self
    {
        $this->from = $from;

        return $this;
    }

    public function setSize(int $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function setQuery(QBInterface $query): self
    {
        $this->query = $query;

        return $this;
    }

    public function setPostFilter(QBInterface $query): self
    {
        $this->postFilter = $query;

        return $this;
    }

    public function build(): array
    {
        $query = [
            'body' => [],
        ];

        if (null !== $this->index) {
            $query['index'] = $this->index;
        }

        if (null !== $this->from) {
            $query['from'] = $this->from;
        }

        if (null !== $this->size) {
            $query['size'] = $this->size;
        }

        if (null !== $this->query) {
            $query['body']['query'] = $this->query->build();
        }

        if (null !== $this->postFilter) {
            $query['body']['post_filter'] = $this->postFilter->build();
        }

        $this->buildSortTo($query['body'])
            ->buildAggregationsTo($query['body']);

        return $query;
    }

    public function getFrom(): ?int
    {
        return $this->from;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function getQuery(): ?QBInterface
    {
        return $this->query;
    }

    public function getPostFilter(): ?QBInterface
    {
        return $this->postFilter;
    }
}
