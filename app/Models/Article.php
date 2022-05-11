<?php

namespace App\Models;

use App\Traits\Search\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory, Searchable;

    protected $table = 'articles';

    protected $casts = [
        'tags' => 'json',
    ];

    protected $fillable = ['title', 'body', 'tags'];

    public $useSearchType = '_doc';
}
