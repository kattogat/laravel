<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;

class TwitterController extends Controller
{
    public function countWordsInTweets() {
        $tweets = Tweet::all();
        echo Tweet::countWords($tweets);
        //return View('twitter/index', ['tweets' => $send]);
    }
}
