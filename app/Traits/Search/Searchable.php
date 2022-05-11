<?php

namespace App\Traits\Search;
use App\Observers\ArticleObserver;

trait Searchable
{

    public static function bootSearchable()
    {
        // переключение флага поиска
        if (config('services.search.enabled', false)) {
            static::observe(ArticleObserver::class);
        }
    }

    public function getSearchIndex()
    {
        return $this->getTable();
    }

    public function getSearchType()
    {
        if (property_exists($this, 'useSearchType')) {
            return $this->useSearchType;
        }
        return $this->getTable();
    }

    public function toSearchArray()
    {
        return $this->toArray();
    }
}
