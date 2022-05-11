<?php

namespace App\Http\Controllers;

use App\Interfaces\SearchRepository;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show(Request $request) {
        return view('articles.articles', ['articles' => Article::query()->get()]);
    }

    public function search(Request $request, SearchRepository $articlesRepository) {
        return view('articles.articles', ['articles' => $articlesRepository->search($request->q ?? '')]);
    }
}
