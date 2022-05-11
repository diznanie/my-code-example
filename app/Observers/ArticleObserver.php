<?php

namespace App\Observers;

use App\Models\Article;
use Elastic\Elasticsearch\Client;

class ArticleObserver
{
    private $elasticsearch;

    public function __construct(Client $elasticsearch)
    {
        $this->elasticsearch = $elasticsearch;
    }

    /**
     * Handle the Article "created" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function created(Article $article)
    {
        $this->elasticsearch->index([
            'index' => $article->getSearchIndex(),
            'type' => $article->getSearchType(),
            'id' => $article->getKey(),
            'body' => $article->toSearchArray(),
        ]);
    }

    /**
     * Handle the Article "updated" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function updated(Article $article)
    {
        $this->elasticsearch->index([
            'index' => $article->getSearchIndex(),
            'type' => $article->getSearchType(),
            'body' => $article->toSearchArray(),
        ]);
    }

    /**
     * Handle the Article "deleted" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function deleted(Article $article)
    {
        $this->elasticsearch->delete([
            'index' => $article->getSearchIndex(),
            'type' => $article->getSearchType(),
            'id' => $article->getKey(),
        ]);
    }

    /**
     * Handle the Article "restored" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function restored(Article $article)
    {
        //
    }

    /**
     * Handle the Article "force deleted" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function forceDeleted(Article $article)
    {
        $this->elasticsearch->delete([
            'index' => $article->getSearchIndex(),
            'type' => $article->getSearchType(),
            'id' => $article->getKey(),
        ]);
    }
}
