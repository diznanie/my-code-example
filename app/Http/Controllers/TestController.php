<?php

namespace App\Http\Controllers;

use App\Jobs\Test1Job;
use App\Jobs\Test2Job;
use App\Models\Article;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function testJob(Request $request)
    {
//        $article = Article::create([
//            'title' => 'test',
//            'body' => 'test',
//            'tags' => ["java", "bash"],
//        ]);
//        Article::find(57)->delete();
        return json_encode(['status' => true]);
    }
}
