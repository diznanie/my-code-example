<?php

namespace App\Jobs;

use App\Models\Article;
use Elasticsearch\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ReindexElasticsearchJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Article $article;

    /**
     * Create a new job instance.
     *
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * Execute the job.
     *
     * @param Client $client
     * @return void
     */
    public function handle(Client $client)
    {
        try {
            $client->index([
                'index' => $this->article->getSearchIndex(),
                'type' => $this->article->getSearchType(),
                'id' => $this->article->getKey(),
                'body' => $this->article->toSearchArray(),
            ]);
            Log::info('Create/update index was success');
        } catch (\Exception $e) {
            Log::info('Create/update index was failed', ['message' => $e->getMessage()]);
        }
    }
}
