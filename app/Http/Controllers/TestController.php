<?php

namespace App\Http\Controllers;

use App\Jobs\Test1Job;
use App\Jobs\Test2Job;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function testJob(Request $request)
    {
        Test1Job::dispatch();
        Test2Job::dispatch();
        return json_encode(['status' => true]);
    }
}
